<?php

declare(strict_types=1);

namespace App\Controllers\adm;

use Framework\Database;
use App\Models\Dao\LivroDao;
use App\Models\Dao\CategoriaDao;
use App\Services\LivroService;

class Listings
{
    private LivroDao $livroDao;
    private CategoriaDao $categoriaDao;
    private LivroService $livroService;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $db = new Database($config);

        $this->livroDao = new LivroDao($db);
        $this->categoriaDao = new CategoriaDao($db);

        $this->livroService = new LivroService(
            $this->livroDao,
            $this->categoriaDao,
        );
    }

    public function index(): void
    {
        try {
            $livros = $this->livroDao->listAll();

            $data = [
                'title' => 'Início',
                'styles' => ['inicio.css'],
                'livros' => $livros,
            ];

            loadView('index\home', $data);
        } catch (\Exception $e) {
            error_log('Erro ao listar livros: ' . $e->getMessage());
            redirect('/erro');
        }
    }

    public function create(): void
    {
        try {
            $categorias = $this->categoriaDao->listAll();

            loadView('adm\gerenciamento', [
                'livro' => [],
                'categorias' => $categorias,
                'styles' => ['headeradm.css', 'gerenciamento.css'],
            ]);
        } catch (\Exception $e) {
            error_log('Erro ao carregar formulário: ' . $e->getMessage());
            redirect('/erro');
        }
    }

    public function show($params): void
    {
        try {
            $id = (int) ($_GET['id'] ?? 0);
            $livro = $this->livroDao->getById($id);

            if (!$livro) {
                redirect('/404');
                return;
            }

            $livrosRelacionados = $this->livroDao->getRelatedByCategory(
                $livro['categoria_id'],
                $id,
                4,
            );

            $data = [
                'title' => $livro['titulo'],
                'styles' => ['detalhes.css'],
                'livro' => $livro,
                'livrosRelacionados' => $livrosRelacionados,
            ];

            loadView('index\detalhes', $data);
        } catch (\Exception $e) {
            error_log('Erro ao exibir livro: ' . $e->getMessage());
            redirect('/erro');
        }
    }

    public function store(): void
    {
        try {
            $urlCapa = null;
            if (!empty($_FILES['capa_livro']['name'])) {
                $categoriaNome = 'default';
                if (!empty($_POST['categoria_id'])) {
                    $categoriaObj = $this->categoriaDao->getById(
                        (int) $_POST['categoria_id'],
                    );

                    if ($categoriaObj) {
                        $categoriaNome = $categoriaObj->descricao;
                    }
                }

                $upload = $this->uploadCover(
                    $_FILES['capa_livro'],
                    $categoriaNome,
                );
                if ($upload['success']) {
                    $urlCapa = $upload['filename'];
                } else {
                    throw new \Exception($upload['error']);
                }
            } else {
                throw new \Exception('A capa do livro é obrigatória');
            }

            $this->livroService->adicionarLivro($_POST, $urlCapa);
            redirect('/publicados?success=criado');
        } catch (\Exception $e) {
            $categorias = $this->categoriaDao->listAll();

            loadView('adm\gerenciamento', [
                'errors' => [$e->getMessage()],
                'livro' => $_POST,
                'categorias' => $categorias,
                'styles' => ['headeradm.css', 'gerenciamento.css'],
            ]);
        }
    }

    public function edit($params): void
    {
        try {
            $id = (int) ($params['id'] ?? 0);
            $livro = $this->livroDao->getById($id);

            if (!$livro) {
                redirect('/404');
                return;
            }

            $categorias = $this->categoriaDao->listAll();

            loadView('adm\gerenciamento', [
                'livro' => $livro,
                'categorias' => $categorias,
                'styles' => ['headeradm.css', 'gerenciamento.css'],
            ]);
        } catch (\Exception $e) {
            error_log('Erro ao carregar edição: ' . $e->getMessage());
            redirect('/erro');
        }
    }

    public function update($params): void
    {
        try {
            $id = (int) ($params['id'] ?? 0);
            $_POST['livros_id'] = $id;

            $urlCapa = null;
            if (!empty($_FILES['capa_livro']['name'])) {
                $categoriaNome = 'default';
                if (!empty($_POST['categoria_id'])) {
                    $categoriaObj = $this->categoriaDao->getById(
                        (int) $_POST['categoria_id'],
                    );
                    if ($categoriaObj) {
                        $categoriaNome = $categoriaObj->descricao;
                    }
                }

                $upload = $this->uploadCover(
                    $_FILES['capa_livro'],
                    $categoriaNome,
                );
                if ($upload['success']) {
                    $urlCapa = $upload['filename'];

                    $livroAntigo = $this->livroDao->getById($id);
                    if ($livroAntigo && !empty($livroAntigo['url_capa'])) {
                        $caminhoAntigo = basePath(
                            'public/assets/capas-pi/' .
                                $livroAntigo['url_capa'],
                        );
                        if (file_exists($caminhoAntigo)) {
                            unlink($caminhoAntigo);
                        }
                    }
                }
            }

            $this->livroService->alterarLivro($_POST, $urlCapa);
            redirect('/publicados?success=atualizado');
        } catch (\Exception $e) {
            $categorias = $this->categoriaDao->listAll();
            $livro = $this->livroDao->getById($id);

            loadView('adm\gerenciamento', [
                'errors' => [$e->getMessage()],
                'livro' => array_merge($livro, $_POST),
                'categorias' => $categorias,
                'styles' => ['headeradm.css', 'gerenciamento.css'],
            ]);
        }
    }

    public function destroy($params): void
    {
        try {
            $id = (int) ($params['id'] ?? 0);
            $livro = $this->livroDao->getById($id);

            if (!$livro) {
                redirect('/404');
                return;
            }

            if (!empty($livro['url_capa'])) {
                $caminhoArquivo = basePath(
                    'public/assets/capas-pi/' . $livro['url_capa'],
                );
                if (file_exists($caminhoArquivo)) {
                    unlink($caminhoArquivo);
                }
            }

            $this->livroDao->delete($id);
            redirect('/publicados?success=excluido');
        } catch (\Exception $e) {
            error_log('Erro ao deletar livro: ' . $e->getMessage());
            redirect('/publicados?error=nao-pode-excluir');
        }
    }

   
    private function uploadCover(array $file, string $categoria = ''): array
    {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $maxSize = 5 * 1024 * 1024;

        $uploadDirBase = basePath('public/assets/capas-pi/');

        if (!isset($categoria) || empty($categoria)) {
            $categoria = 'default';
        }

        switch ($categoria) {
            case 'autoajuda':
                $uploadDir = $uploadDirBase . 'autoajuda/';
                break;
            case 'romance':
                $uploadDir = $uploadDirBase . 'romance/';
                break;
            case 'fic-cientifica':
                $uploadDir = $uploadDirBase . 'fic-cientifica/';
                break;
            case 'classicos':
                $uploadDir = $uploadDirBase . 'classicos/';
                break;
            default:
                $uploadDir = $uploadDirBase . 'literatura_infantil/';
                break;
        }

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (!isset($file['type']) || !in_array($file['type'], $allowedTypes)) {
            return [
                'success' => false,
                'error' => 'Tipo de arquivo inválido. Use JPG, PNG ou WebP.',
            ];
        }

        if (!isset($file['size']) || $file['size'] > $maxSize) {
            return [
                'success' => false,
                'error' => 'Arquivo muito grande. Máximo 5MB.',
            ];
        }

        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return [
                'success' => false,
                'error' => 'Erro ao fazer upload do arquivo.',
            ];
        }

        if (!isset($file['name'])) {
            return [
                'success' => false,
                'error' => 'Nome do arquivo inválido.',
            ];
        }
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid('capa_', true) . '.' . $extension;
        $destination = $uploadDir . $filename;

        if (
            !isset($file['tmp_name']) ||
            !move_uploaded_file($file['tmp_name'], $destination)
        ) {
            return [
                'success' => false,
                'error' => 'Falha ao salvar o arquivo.',
            ];
        }

        return [
            'success' => true,
            'filename' => $filename,
        ];
    }
}

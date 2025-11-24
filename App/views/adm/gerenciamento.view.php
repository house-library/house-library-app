<?php
loadPartial('head', $viewData);
loadPartial('headeradm');


$livro = $livro ?? [];
$categorias = $categorias ?? []; // Garante que $categorias exista

// Define o padrão do caminho do upload e capa
const COVER_DEFAULT = '/assets/imgs/capadefault.svg';

$categoria = $livro['categoria_nome'] ?? '';

if ($categoria === 'autoajuda') {
    $dirCover = '/assets/capas-pi/autoajuda';
} elseif ($categoria === 'romance') {
    $dirCover = '/assets/capas-pi/romance';
} elseif ($categoria === 'fic-cientifica') {
    $dirCover = '/assets/capas-pi/fic-cientifica';
} elseif ($categoria === 'classicos') {
    $dirCover = '/assets/capas-pi/classicos';
} else {
    $dirCover = '/assets/capas-pi/literatura_infantil';
}

// Verifica se o livro existe e define a capa
if (!empty($livro) && !empty($livro['url_capa'])) {
    $coverPath = $dirCover . '/' . $livro['url_capa'];
    $altText = 'Capa do livro: ' . htmlspecialchars($livro['titulo'] ?? '');
} else {
    $coverPath = COVER_DEFAULT;
    $altText = !empty($livro) ? 'Livro sem capa' : 'Adicionar Capa';
}
?>

<?php include (__DIR__ . "/../vlibras.html");?>


<main>
    <section id="gerenciamento">
        <form action="/listings" method="POST" enctype="multipart/form-data">

            <div class="upload-container">
                <label for="input-capa" class="upload-label">
                    <div class="upload-placeholder">
                        <span class="upload-text">Adicionar capa</span>
                        <span class="upload-hint">Recomendado 600 x 900px</span>
                    </div>
                    <img id="preview-imagem" 
                         src="<?= htmlspecialchars($coverPath) ?>"
                         alt="<?= htmlspecialchars($altText) ?>"
                         />
                </label>
                <input type="file" id="input-capa" name="capa_livro" onchange="show(this)" 
                       accept="image/png, image/jpeg, image/webp" required />
            </div>

            <div class="form-gerenciamento">
                <div class="form-input">
                    <label for="titulo">
                        <input type="text" id="titulo" name="titulo"
                               placeholder="Título:" required 
                               value="<?= htmlspecialchars(
                                   $livro['titulo'] ?? '',
                               ) ?>"/>
                    </label>
                </div>

                <div class="form-input">
                    <label for="categoria_id">
                        <select id="categoria_id" name="categoria_id" required>
                            <option value="" selected disabled>Selecionar categoria:</option>
                            
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= (int) $cat->categoria_id ?>"
                                    <?= isset($livro['categoria_id']) &&
                                    $livro['categoria_id'] == $cat->categoria_id
                                        ? 'selected'
                                        : '' ?>
                                >
                                    <?= htmlspecialchars($cat->descricao) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="faixa">
                        <select name="faixa_etaria" id="faixa" aria-label="Faixa etária">
                            <option value="" selected disabled>Faixa Etária</option>
                            <option value="livre">Livre (0+)</option>
                            <option value="infantil">Infantil (3-7)</option>
                            <option value="pre_adolescente">Pré-adolescente (8-12)</option>
                            <option value="adolescente">Adolescente (12-18)</option>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="ano_lancamento">
                        <input type="number" id="ano_lancamento" name="ano_lancamento"
                               placeholder="Ano de Lançamento:" required />
                    </label>
                </div>

                <div class="form-input">
                    <label for="nome_autor">
                        <input type="text" id="nome_autor" name="nome_autor"
                               placeholder="Autor:" required />
                    </label>
                </div>

                <div class="form-input">
                    <label for="preco">
                        <input type="number" step="0.01" id="preco" name="preco"
                               placeholder="Preço (ex: 19.99):" required />
                    </label>
                </div>

                <div class="form-input">
                    <label for="idioma">
                        <select name="idioma" id="idioma" aria-label="Idioma" required>
                            <option value="" selected disabled>Idioma</option>
                            <option value="portugues">Português</option>
                            <option value="ingles">Inglês</option>
                            <option value="espanhol">Espanhol</option>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="sinopse">
                        <textarea id="sinopse" name="sinopse" placeholder="Sinopse:" required></textarea>
                    </label>
                </div>

                <div class="form-input">
                    <label for="descricao">
                        <textarea id="descricao" name="descricao" placeholder="Descrição:" required></textarea>
                    </label>
                </div>

                <button type="submit">Publicar</button>
            </div>
        </form>
    </section>
</main>

<?php loadPartial('footer'); ?>

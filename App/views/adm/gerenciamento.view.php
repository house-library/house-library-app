<?php
$is_admin_page = true;

loadPartial('head', $data);

include __DIR__ . '/../vlibras.html';

loadPartial('headeradm'); 
?>

<?php
$livro = $livro ?? [];
$categorias = $categorias ?? []; 

const COVER_DEFAULT = '/assets/imgs/capadefault.svg';

$categoriaNome = $livro['categoria_nome'] ?? '';
$catLower = mb_strtolower($categoriaNome, 'UTF-8');

if (strpos($catLower, 'autoajuda') !== false) {
    $dirCover = '/assets/capas-pi/autoajuda';
} elseif (strpos($catLower, 'romance') !== false) {
    $dirCover = '/assets/capas-pi/romance';
} elseif (strpos($catLower, 'fic') !== false) {
    $dirCover = '/assets/capas-pi/fic-cientifica';
} elseif (strpos($catLower, 'cláss') !== false || strpos($catLower, 'class') !== false) {
    $dirCover = '/assets/capas-pi/classicos';
} elseif (strpos($catLower, 'mist') !== false) {
    $dirCover = '/assets/capas-pi/misterio';
} else {
    $dirCover = '/assets/capas-pi/literatura_infantil';
}

if (!empty($livro) && !empty($livro['url_capa'])) {
    $coverPath = $dirCover . '/' . $livro['url_capa'];
    $altText = 'Capa do livro: ' . htmlspecialchars($livro['titulo'] ?? '');
} else {
    $coverPath = COVER_DEFAULT;
    $altText = !empty($livro) ? 'Livro sem capa' : 'Adicionar Capa';
}

$isEdit = isset($livro['livros_id']) && !empty($livro['livros_id']);

if ($isEdit) {
    $actionUrl = '/listings/' . $livro['livros_id'];
    $botaoTexto = 'Salvar Alterações';
} else {
    $actionUrl = '/listings';
    $botaoTexto = 'Publicar';
}
?>

<main>
    <section id="gerenciamento">
        
        <form action="<?= $actionUrl ?>" method="POST" enctype="multipart/form-data">
            
            <?php if ($isEdit): ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="<?= $livro['livros_id'] ?>">
            <?php endif; ?>

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
                       accept="image/png, image/jpeg, image/webp" <?= $isEdit ? '' : 'required' ?> />
            </div>

            <div class="form-gerenciamento">
                
                <div class="form-input">
                    <label for="titulo">
                        <input type="text" id="titulo" name="titulo"
                               placeholder="Título:" required 
                               value="<?= htmlspecialchars($livro['titulo'] ?? '') ?>"/>
                    </label>
                </div>

                <div class="form-input">
                    <label for="categoria_id">
                        <select id="categoria_id" name="categoria_id" required>
                            <option value="" selected disabled>Selecionar categoria:</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= (int) $cat['categoria_id'] ?>"
                                    <?= (isset($livro['categoria_id']) && $livro['categoria_id'] == $cat['categoria_id']) ? 'selected' : '' ?>
                                >
                                    <?= htmlspecialchars($cat['descricao']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="faixa">
                        <select name="faixa_etaria" id="faixa" aria-label="Faixa etária" required>
                            <option value="" disabled <?= empty($livro['faixa_etaria']) ? 'selected' : '' ?>>Faixa Etária</option>
                            
                            <option value="livre" <?= ($livro['faixa_etaria'] ?? '') === 'livre' ? 'selected' : '' ?>>Livre (0+)</option>
                            <option value="infantil" <?= ($livro['faixa_etaria'] ?? '') === 'infantil' ? 'selected' : '' ?>>Infantil (3-7)</option>
                            <option value="pre_adolescente" <?= ($livro['faixa_etaria'] ?? '') === 'pre_adolescente' ? 'selected' : '' ?>>Pré-adolescente (8-12)</option>
                            <option value="adolescente" <?= ($livro['faixa_etaria'] ?? '') === 'adolescente' ? 'selected' : '' ?>>Adolescente (12-18)</option>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="ano_lancamento">
                        <input type="number" id="ano_lancamento" name="ano_lancamento"
                               placeholder="Ano de Lançamento:" required 
                               value="<?= htmlspecialchars($livro['ano_lancamento'] ?? '') ?>" />
                    </label>
                </div>

                <div class="form-input">
                    <label for="nome_autor">
                        <input type="text" id="nome_autor" name="nome_autor"
                               placeholder="Autor:" required 
                               value="<?= htmlspecialchars($livro['nome_autor'] ?? '') ?>" />
                    </label>
                </div>

                <div class="form-input">
                    <label for="preco">
                        <input type="number" step="0.01" id="preco" name="preco"
                               placeholder="Preço (ex: 19.99):" required 
                               value="<?= htmlspecialchars($livro['preco'] ?? '') ?>" />
                    </label>
                </div>

                <div class="form-input">
                    <label for="idioma">
                        <select name="idioma" id="idioma" aria-label="Idioma" required>
                            <option value="" disabled <?= empty($livro['idioma']) ? 'selected' : '' ?>>Idioma</option>
                            
                            <option value="portugues" <?= ($livro['idioma'] ?? '') === 'portugues' ? 'selected' : '' ?>>Português</option>
                            <option value="ingles" <?= ($livro['idioma'] ?? '') === 'ingles' ? 'selected' : '' ?>>Inglês</option>
                            <option value="espanhol" <?= ($livro['idioma'] ?? '') === 'espanhol' ? 'selected' : '' ?>>Espanhol</option>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="sinopse">
                        <textarea id="sinopse" name="sinopse" placeholder="Sinopse:" required><?= htmlspecialchars($livro['sinopse'] ?? '') ?></textarea>
                    </label>
                </div>

                <div class="form-input">
                    <label for="descricao">
                        <textarea id="descricao" name="descricao" placeholder="Descrição:" required><?= htmlspecialchars($livro['descricao'] ?? '') ?></textarea>
                    </label>
                </div>

                <button type="submit"><?= $botaoTexto ?></button>
            </div>
        </form>
    </section>
</main>

<?php loadPartial('footer'); ?>
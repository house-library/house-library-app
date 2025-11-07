<?php loadPartial('head', [
    'styles' => $styles ?? ['gerenciamento.css'],
]); ?>  
<?php loadPartial('headeradm'); ?> 

<main>
    <section id="gerenciamento">
        <form action="/listings" method="POST" enctype="multipart/form-data">
            <?php if (!empty($errors)): ?>
                <div class="errors">
                        <?php foreach ($errors as $field => $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="upload-container">
                <label for="input-capa" class="upload-label">
                    <div class="upload-placeholder">
                        <span class="upload-text">Adicionar capa</span>
                        <span class="upload-hint">Recomendado 600 x 900px</span>
                    </div>
                    <img id="preview-imagem" class="preview-imagem" src="<?= htmlspecialchars(
                        $listing['url_capa'] ?? '/assets/imgs/capadefault.svg',
                    ) ?>" alt="Pré-visualização da capa do livro" />
                </label>
                <input type="file" id="input-capa" name="capa_livro" accept="image/png, image/jpeg, image/webp" required />
            </div>

            <div class="form-gerenciamento">
                <div class="form-input">
                    <label for="titulo">
                        <input type="text" id="titulo" name="titulo" placeholder="Título:" value="<?= htmlspecialchars(
                            $listing['titulo'] ?? '',
                        ) ?>" required />
                    </label>
                </div>

                <div class="form-input">
                    <label for="categoria">
                        <select id="categoria" name="categoria" required>
                            <option value="" selected disabled>Selecionar categoria:</option>
                            <option value="romance" <?= ($listing[
                                'categoria'
                            ] ??
                                '') ===
                            'romance'
                                ? 'selected'
                                : '' ?>>Romance</option>
                            <option value="misterio" <?= ($listing[
                                'categoria'
                            ] ??
                                '') ===
                            'misterio'
                                ? 'selected'
                                : '' ?>>Mistério / Thriller</option>
                            <option value="ficcao_cientifica" <?= ($listing[
                                'categoria'
                            ] ??
                                '') ===
                            'ficcao_cientifica'
                                ? 'selected'
                                : '' ?>>Ficção Científica</option>
                            <option value="auto_ajuda" <?= ($listing[
                                'categoria'
                            ] ??
                                '') ===
                            'auto_ajuda'
                                ? 'selected'
                                : '' ?>>Auto Ajuda</option>
                            <option value="classicos" <?= ($listing[
                                'categoria'
                            ] ??
                                '') ===
                            'classicos'
                                ? 'selected'
                                : '' ?>>Clássicos</option>
                            <option value="literatura_infantil" <?= ($listing[
                                'categoria'
                            ] ??
                                '') ===
                            'literatura_infantil'
                                ? 'selected'
                                : '' ?>>Literatura Infantil</option>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="faixa">
                        <select name="faixa_etaria" id="faixa" aria-label="Faixa etária">
                            <option value="" selected disabled>Faixa Etária</option>
                            <option value="livre" <?= ($listing[
                                'faixa_etaria'
                            ] ??
                                '') ===
                            'livre'
                                ? 'selected'
                                : '' ?>>Livre (0+)</option>
                            <option value="infantil" <?= ($listing[
                                'faixa_etaria'
                            ] ??
                                '') ===
                            'infantil'
                                ? 'selected'
                                : '' ?>>Infantil (3-7)</option>
                            <option value="pre_adolescente" <?= ($listing[
                                'faixa_etaria'
                            ] ??
                                '') ===
                            'pre_adolescente'
                                ? 'selected'
                                : '' ?>>Pré-adolescente (8-12)</option>
                            <option value="adolescente" <?= ($listing[
                                'faixa_etaria'
                            ] ??
                                '') ===
                            'adolescente'
                                ? 'selected'
                                : '' ?>>Adolescente (12-18)</option>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="ano_lancamento">
                        <input type="number" id="ano_lancamento" name="ano_lancamento" placeholder="Ano de Lançamento:" value="<?= htmlspecialchars(
                            $listing['ano_lancamento'] ?? '',
                        ) ?>" required />
                    </label>
                </div>

                <div class="form-input">
                    <label for="nome_autor">
                        <input type="text" id="nome_autor" name="nome_autor" placeholder="Autor:" value="<?= htmlspecialchars(
                            $listing['nome_autor'] ?? '',
                        ) ?>" required />
                    </label>
                </div>

                <div class="form-input">
                    <label for="preco">
                        <input type="number" step="0.01" id="preco" name="preco" placeholder="Preço (ex: 19.99):" value="<?= htmlspecialchars(
                            $listing['preco'] ?? '',
                        ) ?>" required />
                    </label>
                </div>

                <div class="form-input">
                    <label for="idioma">
                        <select name="idioma" id="idioma" aria-label="Idioma" required>
                            <option value="" selected disabled>Idioma</option>
                            <option value="portugues" <?= ($listing['idioma'] ??
                                '') ===
                            'portugues'
                                ? 'selected'
                                : '' ?>>Português</option>
                            <option value="ingles" <?= ($listing['idioma'] ??
                                '') ===
                            'ingles'
                                ? 'selected'
                                : '' ?>>Inglês</option>
                            <option value="espanhol" <?= ($listing['idioma'] ??
                                '') ===
                            'espanhol'
                                ? 'selected'
                                : '' ?>>Espanhol</option>
                        </select>
                    </label>
                </div>

                <div class="form-input">
                    <label for="sinopse">
                        <textarea id="sinopse" name="sinopse" placeholder="Sinopse:" required><?= htmlspecialchars(
                            $listing['sinopse'] ?? '',
                        ) ?></textarea>
                    </label>
                </div>

                <div class="form-input">
                    <label for="descricao">
                        <textarea id="descricao" name="descricao" placeholder="Descrição:" required><?= htmlspecialchars(
                            $listing['descricao'] ?? '',
                        ) ?></textarea>
                    </label>
                </div>

                <button type="submit">Publicar</button>
            </div>
        </form>
    </section>
</main>

<?php loadPartial('footer'); ?>

<?= loadPartial('head', $viewData) ?>
<?= loadPartial('headeradm') ?> 

    <main>
      <section id="gerenciamento">
        <form
          action="/salvar-ebook"
          method="POST"
          enctype="multipart/form-data"
        >
          <div class="upload-container">
            <label for="input-capa" class="upload-label">
              <div class="upload-placeholder">
                <span class="upload-text">Adicionar capa</span>
                <span class="upload-hint">Recomendado 600 x 900px</span>
              </div>

              <img
                id="preview-imagem"
                class="preview-imagem"
                src="/assets/imgs/capadefault.svg"
                alt="Pré-visualização da capa do livro"
              />
            </label>

            <input
              type="file"
              id="input-capa"
              name="capa_livro"
              accept="image/png, image/jpeg, image/webp"
            />
          </div>

          <div class="form-gerenciamento">
            <div class="form-input">
              <label for="titulo">
                <input type="text" id="titulo"name="titulo" placeholder="Titulo:"required/>
              </label>
            </div>

            <div class="form-input">
              <label for="categoria">
                <input type="text" id="categoria" name="categoria" placeholder="Selecionar categoria:" required/>
              </label>
            </div>

            <div class="form-input">
              <label for="faixa">
                <select
                  name="faixa-etaria"
                  id="faixa"
                  aria-label="Faixa etária">
                  <option value="" selected disabled>Faixa Etária</option>
                </select>
              </label>
            </div>

            <div class="form-input">
              <label for="data">
                <select name="data" id="data" aria-label="Data">
                  <option value="" selected disabled>Data</option>
                </select>
              </label>
            </div>

            <div class="form-input">
              <label for="autor">
                <input
                  type="text"
                  id="autor"
                  name="autor"
                  placeholder="Autor:"
                  required
                />
              </label>
            </div>

            <div class="form-input">
              <label for="idioma">
                <select name="idioma" id="idioma" aria-label="Idioma">
                  <option value="" selected disabled>Idioma</option>
                </select>
              </label>
            </div>

            <div class="form-input">
              <label for="descrição">
                <input type="text" id="descrição"name="descrição" placeholder="Descrição:"required/>
              </label>
            </div>

            <button type="submit2">Publicar</button>
          </div>
        </form>
      </section>
    </main>

    


<?php loadPartial('footer'); ?>    

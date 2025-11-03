<?= loadPartial('head', $viewData) ?>
<?= loadPartial('header') ?>    

    <main class="explore-page-container">
        <div id="campo-filtragem">
            <form action="/buscar" method="GET" class="filter-form">
                <select name="documento" aria-label="Tipo de documento">
                    <option value="" selected disabled>Tipo de documento</option>
                </select>
                <select name="autor" aria-label="Autor">
                    <option value="" selected disabled>Autor</option>
                </select>
                <select name="categoria" aria-label="Categoria">
                    <option value="" selected disabled>Categoria</option>
                </select>
                <select name="materia" aria-label="Matéria">
                    <option value="" selected disabled>Matéria</option>
                </select>
                
                <select name="etiqueta" aria-label="Etiqueta">
                    <option value="" selected disabled>Etiqueta</option>
                </select>
                <select name="editorial" aria-label="Editorial">
                    <option value="" selected disabled>Editorial</option>
                </select>
                <select name="publicacao" aria-label="Ano de Publicação">
                    <option value="" selected disabled>Ano de publicação</option>
                </select>
                <select name="idioma" aria-label="Idioma">
                    <option value="" selected disabled>Idioma</option>
                </select>
                
                </form>
        </div>

        <section class="book-grid">
            <div class="book-item">
                <img src="https://via.placeholder.com/150x220?text=Livro+1" alt="Capa do Livro 1">
                <p class="book-title">Título do Livro</p>
            </div>
            <div class="book-item">
                <img src="https://via.placeholder.com/150x220?text=Livro+2" alt="Capa do Livro 2">
                <p class="book-title">Título do Livro</p>
            </div>
            </section>
    </main>


<?= loadPartial('footer') ?>    

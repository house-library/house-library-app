
 <?php
 require 'partials/head.php';
 require 'partials/header.php';
 ?>

    <div id="campo-filtragem">
      <form action="/buscar" method="GET" class="search-form" role="search">
        <select name="formatos" id="formatos" aria-label="Formatos">
          <option value="" selected disabled>Formatos</option>
        </select>

        <select name="categorias" id="categorias" aria-label="Categorias">
          <option value="" selected disabled>Categorias</option>
        </select>

        <select name="materia" id="materia" aria-label="Matéria">
          <option value="" selected disabled>Matéria</option>
        </select>

        <select name="etiqueta" id="etiqueta" aria-label="Etiqueta">
          <option value="" selected disabled>Etiqueta</option>
        </select>

        <select name="editorial" id="editorial" aria-label="Editorial">
          <option value="" selected disabled>Editorial</option>
        </select>

        <select
          name="Publicação"
          id="publicacao"
          aria-label="Ano de Publicação"
        >
          <option value="" selected disabled>Ano de publicação</option>
        </select>

        <select name="Idioma" id="idioma" aria-label="Idioma">
          <option value="" selected disabled>Idioma</option>
        </select>

        <button type="submit" class="search-button">Filtrar</button>
      </form>
    </div>

       <?php require 'partials/footer.php'; ?>


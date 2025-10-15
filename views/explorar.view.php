<?php
require '../views/partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explorar</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="../views/partials/styles/reset.css">
 <link rel="stylesheet" href="../views/partials/styles/header.css">
 <link rel="stylesheet" href="../views/partials/styles/footer.css">
 <link rel="stylesheet" href="../views/partials/styles/explorar.css">
</head>

<body>
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

        <select name="Publicação" id="publicacao" aria-label="Ano de Publicação">
          <option value="" selected disabled>Ano de publicação</option>
        </select>

        <select name="Idioma" id="idioma" aria-label="Idioma">
          <option value="" selected disabled>Idioma</option>
        </select>

        <button type="submit" class="search-button">Filtrar</button>
      </form>
    </div>
</body>
</html>

    

       <?php require 'partials/footer.php'; ?>


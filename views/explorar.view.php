<?php
require '../views/partials/header.php'; // Usa o novo header.php acima
?>

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
    <link rel="stylesheet" href="../views/partials/styles/header.css"> <link rel="stylesheet" href="../views/partials/styles/footer.css">
    <link rel="stylesheet" href="../views/partials/styles/explorar.css"> </head>

<body>
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
</body>
</html>

<?php require '../views/partials/footer.php'; ?>
<?php require 'partials/header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../views/partials/styles/reset.css">
    <link rel="stylesheet" href="../views/partials/styles/header.css">
    <link rel="stylesheet" href="../views/partials/styles/footer.css">
    <link rel="stylesheet" href="../views/partials/styles/historico.css">
</head>

<body>
    <main class="history-main">
        <h2 class="history-title">Histórico de compras</h2>

        <section class="purchase-item">
            <div class="book-cover-container">
                <img src="/caminho/para/capa1.jpg" alt="Capa do livro Creator's Call" width="100">
            </div>
            <div class="book-details">
                <h3>Creator´s Call</h3>
                <p class="book-author">John Doe</p>
                <p class="book-price"><strong>R$ 20,00</strong></p>
            </div>
            <div class="action-button">
                <button class="btn-download">Download</button>
            </div>
        </section>

        <section class="purchase-item">
            <div class="book-cover-container">
                <img src="/caminho/para/capa2.jpg" alt="Capa do livro Argonauta" width="100">
            </div>
            <div class="book-details">
                <h3>Argonauta</h3>
                <p class="book-author">Michael Lowy</p>
                <p class="book-price"><strong>R$ 20,00</strong></p>
            </div>
            <div class="action-button">
                <button class="btn-download">Download</button>
            </div>
        </section>
    </main>
</body>
</html>

<?php require 'partials/footer.php'; ?>
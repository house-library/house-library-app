<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../views/partials/styles/reset.css">
    <link rel="stylesheet" href="../views/partials/styles/header.css">
    <link rel="stylesheet" href="../views/partials/styles/footer.css">
    <link rel="stylesheet" href="../views/partials/styles/carrinho.css">
</head>
<body>
    <?php require 'partials/header.php'; ?>
    
    <main class="main">
        <h1 class="page-title">Carrinho</h1>
        
        <div class="shop-container">
            <!-- COLUNA ESQUERDA: Itens do carrinho -->
            <section class="cart-items">
                
               
                <div class="count-And-remove">
                    <h2>Itens (2)</h2>
                    <button class="remove-all">Remover todos</button>
                </div>
                
                
                <div class="item-list">
                    <img class="book-cover" src="/public/assets/capas-pi/classicos/dracula.png" alt="Capa de Dracula">
                    <div class="item-info">
                        <h3>Dracula</h3>
                        <p>Bram Stoker</p>
                    </div>
                    <div class="items-action">
                    <p class="item-price">R$ 5,00</p>
                    <button class="remove-item"><img src="/public/assets/buttons/remove.svg" alt=""></button>
                    </div>
                </div>


                <div class="item-list">
                    <img class="book-cover" src="/public/assets/capas-pi/classicos/principe.png" alt="Capa de O Principe">
                    <div class="item-info">
                        <h3>O Principe</h3>
                        <p>Maquiavel</p>
                    </div>
                    <div>
                        <button class="remove-item"><img src="/public/assets/buttons/remove.svg" alt=""></button>
                        <p class="item-price">R$ 5,00</p>
                    </div>
                </div>
            
            
            <!-- COLUNA DIREITA: Resumo -->
            
        </section>

        <aside class="cart-summary">
            <h2>Resumo de pedido</h2>
            <div class="advice-summary">
                <h4>Sem espera, sem frete!</h4>
                <p>Este produto corresponde à versão em eBook do livro para leitura em dispositivos digitais.</p>
            </div>
    
            <div class="value-summary">
                <div class="total-value">
                    <h3>Total:</h3>
                    <h3>R$ 00, 00</h3>
                </div>
    
                <button class="complete-purchase"><span>Finalizar Compra</span></button>
            </div>
        </aside>

    </div>
    
        <section class="recommendations">
      <h2>Você também pode gostar de:</h2>
      <div class="books-reco">
          <div>
              <img class="img-reco" src="/public/assets/capas-pi/classicos/ilhatesouro.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/public/assets/capas-pi/classicos/fausto.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/public/assets/capas-pi/classicos/odisseia.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/public/assets/capas-pi/classicos/orgulhoepreconceito.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/public/assets/capas-pi/classicos/damacamelias.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading-p">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
          <div>
              <img class="img-reco" src="/public/assets/capas-pi/classicos/condedemontecristo.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
      </div>
  </section>
    </main>
    
    <?php require 'partials/footer.php'; ?>
</body>
</html>

<?= loadPartial('head', $viewData) ?>

<?= loadPartial('header') ?>    
    
    <main class="main">
        <h1 class="page-title">Carrinho</h1>
        
        <div class="shop-container">
            <section class="cart-items">
                
            <div class="cart-header">
               <div class="cart-title">
                <h2>Carrinho</h2>
                 <p>Itens ()</p>
               </div>

                    <button class="remove-all">Remover todos</button>
                
            </div>

                <div class="item-list">
                    <img class="book-cover" src="/assets/capas-pi/classicos/dracula.png" alt="Capa de Dracula">
                    <div class="item-info">
                        <h3>Dracula</h3>
                        <p>Bram Stoker</p>
                    </div>
                    <div class="items-action">
                        <button class="remove-item"><img src="/assets/buttons/remove.svg" alt=""></button>
                        <p class="item-price">R$ 5,00</p>
                    </div>
                </div>


                <div class="item-list">
                    <img class="book-cover" src="/assets/capas-pi/classicos/principe.png" alt="Capa de O Principe">
                    <div class="item-info">
                        <h3>O Principe</h3>
                        <p>Maquiavel</p>
                    </div>
                    <div class="items-action">
                        <button class="remove-item"><img src="/assets/buttons/remove.svg" alt=""></button>
                        <p class="item-price">R$ 5,00</p>
                    </div>
                </div>
            
            
            
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
<<<<<<< HEAD:views/carrinho.view.php
=======
    
        <section class="recommendations">
      <h2>Recomendados para você</h2>
      <div class="books-reco-wrapper">
      <div class="books-reco">
          <div>
              <img class="img-reco" src="/assets/capas-pi/classicos/ilhatesouro.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/assets/capas-pi/classicos/fausto.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/assets/capas-pi/classicos/odisseia.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/assets/capas-pi/classicos/orgulhoepreconceito.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
          </div>
           <div>
              <img class="img-reco" src="/assets/capas-pi/classicos/damacamelias.png">
              <h3 class="books-heading">Titulo</h3>
              <p class="books-heading-p">Nome do autor</p> 
              <button class="add-book">Adicionar</button>
</div>
      </div>
      </div>
      <button class="arrow-btn arrow-next">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
>>>>>>> fb62772ca645544bfddfb419032528439918501a:App/views/carrinho.view.php
  </section>
    </main>
    
<?= loadPartial('footer') ?>    

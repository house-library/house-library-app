<?php loadPartial('head', $viewData); ?>

<?php loadPartial('header', $viewData); ?>    
    
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
    </main>
    
<?php loadPartial('footer', $viewData); ?>    

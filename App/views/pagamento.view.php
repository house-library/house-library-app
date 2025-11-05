<?php loadPartial('head', $viewData); ?>
<?php loadPartial('header'); ?>    


  <main>
      <section id="processo-pagamento">
        <form id="campo-pagamento" action="/finalizar-pagamento" method="POST">
         <div class="selecionar-pais">
  <label for="pais-select">País *</label>
  <select name="Pais" id="pais-select" required>
    <option value="" disabled>Selecione um País</option>
    <option value="BR" selected>Brasil</option>
    <option value="PT">Portugal</option>
    <option value="US">Estados Unidos</option>
    <option value="CA">Canadá</option>
    <option value="AR">Argentina</option>
    </select>
</div>
<div class="codigo-promocional">
  <label for="promo-code">Código Promocional</label>
  <div class="input-grupo">
    <input 
      type="text" 
      id="promo-code" 
      name="codigo-promocional" 
      placeholder="Digite seu código"
    />
    <button type="button" class="btn-aplicar">Aplicar</button>
  </div>
</div>
          <fieldset>
            <div class="opcao-cartao">
              <label class="opcao-cartao" for="cartao-radio">
                <input
                  type="radio"
                  name="metodo-pagamento"
                  id="cartao-radio"
                  checked
                />
                <strong>Cartão de Crédito / Débito</strong>
              </label>
            </div>

            <div class="bandeiras">
              <img src="/assets/pagamento-icons/visa.svg" alt="Visa" />
              <img
                src="/assets/pagamento-icons/mastercard.svg"
                alt="Mastercard"
              />
            </div>

            <div class="numero-cartao">
              <label for="numero-cartao">Número de cartão *</label>
              <input
                id="numero-cartao"
                type="number"
                name="numero-cartao"
                required
                placeholder="0000 0000 0000 0000"
              />
            </div>

            <div class="validade">
              <label for="validade-label">Data de validade *</label>
              <div class="data-validade">
                <input
                  type="number"
                  name="mes-validade"
                  aria-label="Mês de validade"
                  maxlength="2"
                  required
                />
                <span>/</span>
                <input
                  type="number"
                  name="ano-validade"
                  aria-label="Ano de validade"
                  maxlength="2"
                  required
                />
              </div>
            </div>

            <div class="cvv">
              <label for="cvv">CVV</label>
              <input type="number" id="cvv" name="cvv" maxlength="3" required />
              <button type="button" aria-label="O que é CVV?">
                <img
                  src="/assets/pagamento-icons/requirido.svg"
                  alt="Ajuda sobre o CVV"
                />
              </button>
            </div>
          </fieldset>

          <div class="opcao-pagamento">
            <label for="pagamento-pix">
              <input
                type="radio"
                id="pagamento-pix"
                name="metodo-pagamento"
                value="pix"
              />
              <p><strong>Pix</strong></p>
              <img src="/assets/pagamento-icons/pix.svg" alt="Pix" />
              <p>
                <strong
                  >O código Pix gerado para o pagamento é válido por 30 minutos
                  após a finalização do pedido.</strong
                >
              </p>
            </label>
          </div>

          <div class="opcao-pagamento">
            <label for="pagamento-boleto">
              <input
                type="radio"
                id="pagamento-boleto"
                name="metodo-pagamento"
                value="boleto"
              />
              <p><strong>boleto</strong></p>
              <img src="/assets/pagamento-icons/boleto.svg" alt="Boleto" />
              <p>
                <strong
                  >O prazo de entrega pode mudar devido ao tempo de compensação
                  do boleto.</strong
                >
              </p>
            </label>
          </div>

          <aside id="carrinho-resumo">
            <h3>Resumo do Pedido</h3>
            <p><strong>Total:</strong> <span>R$ 0,00</span></p>
            <p><strong>Itens:</strong> <span>(0)</span></p>
            <button type="submit">Finalizar Compra</button>
          </aside>
        </form>
      </section>
    </main>

    <?php loadPartial('footer'); ?>    



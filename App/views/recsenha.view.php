<?= loadPartial('head') ?>


    <main class="main-login">
       
        <figure class="logo-container">
      <img class="logo-login" src="../public/assets/imgs/logo.svg" alt="Logo da Marca">
      <figcaption class="brand-name">House Library</figcaption>
    </figure>
        <div class="card-login">
           
            <div class="textfield">
                <label for="usuario">Nova senha</label>
                <input type="password" name="email" placeholder="Nova senha">
            </div>
            <div class="textfield">
                <label for="senha">Digite novamente</label>
                <input type="repeat-password" id="repeat-password" name="repeat-password" placeholder="Digite novamente">
            </div>
             
            <button class="password-confirm">Confirmar</button>
           
        </div>
    
    
    </main>

    <?= loadPartial('footer') ?>    

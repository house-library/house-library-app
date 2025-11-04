<?php declare(strict_types=1);

// 1. Inclui o _head.php (que abre o <body>)
// A variável $viewData já existe neste escopo
loadPartial('head', $viewData);
?>
    <main class="main-login">
       
        <figure class="logo-container">
      <img class="logo-login" src="../public/assets/imgs/logo.svg" alt="Logo da House Library">
      <figcaption class="brand-name">House Library</figcaption>
    </figure>
        <div class="card-login">
           
            <div class="textfield">
                <label for="usuario">Email</label>
                <input type="text" id="email" name="email" placeholder="Email">
            </div>
            <div class="textfield">
                <label for="senha">Senha</label>
                <input type="password" id="password" name="password" placeholder="Senha">
            </div>
             <div class="recovery-password">
                <a href="#">Recuperar senha</a>
            </div>
            <button class="btn-login">Entrar</button>
            <div class="user-register">
                <a href="#">Novo por aqui? Cadastre-se</a>
            </div>
        </div>
    
    
    </main>
    
<?= loadPartial('footer') ?>    

    

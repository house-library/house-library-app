<?php loadPartial('head', $viewData); ?>

<?php include ("vlibras.html");?>

    <main class="main-login">
       
        <figure class="logo-container">
      <img class="logo-login" src="/assets/imgs/logo.svg" alt="Logo da House Library">
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
             <div class="link-register">
                <a class="link-user" href="/recsenha">Recuperar senha</a>
            </div>
            <button class="btn-login">Entrar</button>
            <div>
                <a class="link-user" href="/cadastro">Novo por aqui? Cadastre-se</a>
            </div>
        </div>
    
    
    </main>
    
<?php loadPartial('footer'); ?>    

    

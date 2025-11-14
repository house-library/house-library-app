<?php loadPartial('head', $viewData); ?>

<?php include ("vlibras.html");?>


    <body>
    <div class="main-login">
        
        <div class="left-login">
            <h1>Cadastre-se na House Library!</h1>
            <img src="assets/imgs/cadastro.svg" class="left-login-image" alt="Animação login">
        </div>
        <div class="right-login">
            <div class="card-login">
                <img src="assets/imgs/logo.svg" alt="House Library">
          <h1>House Library</h1>
                <div class="textfield">
                  <label for="name">Nome</label>
                  <input type="text" name="name" placeholder="Nome de usuário">
                </div>
                <div class="textfield">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" inputmode="numeric" name="cpf" placeholder="CPF">
                </div>
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" id="repeat-password" name="repeat-password" placeholder="Senha">
                </div>
                <div class="textfield">
                    <label for="senha">Repetir senha</label>
                    <input type="password" id="repeat-password" name="repeat-password" placeholder="Repetir senha">
                </div>
                <button class="btn-login">Entrar</button>
          </div>
        </div>
    </div>
</body>
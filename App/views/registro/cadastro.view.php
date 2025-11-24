<?php loadPartial('head', $viewData); ?>

<?php include __DIR__ . '/../vlibras.html'; ?>


    <body>
    <div class="main-login">
        
        <div class="left-login">
            <h1>Cadastre-se na House Library!</h1>
            <img src="/assets/imgs/cadastro.svg" class="left-login-image" alt="Animação login">
        </div>
        
        <div class="right-login">
            <div class="card-login">
                <img src="/assets/imgs/logo.svg" alt="House Library">
                <h1>House Library</h1>

                <?php if (isset($_GET['error'])): ?>
                    <div style="color: red; text-align: center; margin-bottom: 15px; padding: 10px; border: 1px solid red; border-radius: 5px;">
                        <?php
                        if ($_GET['error'] == 'falha') {
                            echo 'Erro ao realizar cadastro. Verifique os dados.';
                        }
                        if ($_GET['error'] == 'sistema') {
                            echo 'Erro no sistema. Tente novamente mais tarde.';
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <form action="/cadastro/store" method="POST" id="formCadastro">
                    
                    <div class="textfield">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Nome de usuário" required>
                    </div>

                    <div class="textfield">
                        <label for="cpf">CPF</label>
                       
                        <input type="text" id="cpf" inputmode="numeric" name="cpf" placeholder="CPF" maxlength="14" 
                               onkeypress="formata_mascara(this, '###.###.###-##')"
                               onblur="verificarDuplicidade('cpf', this.value)" required>
                        <small id="erro-cpf"></small>
                        <span id="cpfFeedback"></span>
                    </div>

                    <div class="textfield">
                        <label for="datanascimento">Data de Nascimento</label>
                        <input type="date" id="datanascimento" name="datanascimento">
                    </div>

                    <div class="textfield">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email"
                               onblur="verificarDuplicidade('email', this.value)" required>
                        <small id="erro-email" style="color: red; font-size: 0.8em; display: block; margin-top: 2px;"></small>
                        <span id="emailFeedback"></span>
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    </div>

                    <div class="textfield">
                        <label for="repeat-password">Repetir senha</label>
                        <input type="password" id="repeat-password" name="repeat-password" placeholder="Repetir senha" required>
                    </div>

                    <button type="submit" class="btn-login">Cadastrar</button>
                </form>
                
            </div>
        </div>
    </div>
    <script src="/js/validacao_cadastro.js"></script>
</body>
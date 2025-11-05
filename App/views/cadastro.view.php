<?php loadPartial('head', $viewData); ?>


    <main class="main-login">

      <figure class="logo-container">
        <img class="logo-login" src="/assets/imgs/logo.svg" alt="Logo da House Library">
        <figcaption class="brand-name">House Library</figcaption>
      </figure>
      
      <form class="card-login">
    
        
           
             <div class="textfield">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Nome do Usuário">
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
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Senha">
            </div>

             <div class="textfield">
                <label for="repeat-password">Repetir senha</label>
                <input type="password" id="repeat-password" name="repeat-password" placeholder="Repetir senha">
            </div>
         
            
            <button class="btn-register">Criar conta</button>
            
        
        </form>
    
    
    </main>
    
<?php loadPartial('footer'); ?>    


    

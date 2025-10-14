<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/views/partials/styles/login.css">
</head>

<body>
    <main class="main-login">
       
        <figure class="logo-container">
      <img class="logo-login" src="/public/assets/imgs/logo.svg" alt="Logo da House Library">
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
    
</body>
</html>

    

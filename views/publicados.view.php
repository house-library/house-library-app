<?php require 
'../views/partials/headeradm.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../views/partials/styles/reset.css">
    <link rel="stylesheet" href="../views/partials/styles/headeradm.css">
    <link rel="stylesheet" href="../views/partials/styles/footer.css">
    <link rel="stylesheet" href="../views/partials/styles/publicados.css">
</head>

<body>
    <main class="main-content">
     <header class="top-bar">    
         </div>
         <div class="search-bar">
            <form action="/buscar" method="GET" class="search-form" role="search">
                <input type="search" class="search-input" name="search-input" placeholder="Pesquisar" required>
                <button type="submit" class="search-submit" aria-label="Buscar"></button>
            </form>
        </div>
        <button class="new-ebook">+ Novo e-book</button>
        <br><br>
        <button class="painel">Painel de estatísticas</button>
      </header>
        <br>
        <br>

        <section class="book-list">
        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/artedeviver.png" alt="A arte de viver direito">
          <div class="book-info">
            <h3>A arte de viver direito</h3>
            <p>8 capítulos</p>
            <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>
        
        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/caminhandofe.png" alt="Caminhando em fé">
          <div class="book-info">
               <h3>Caminhando em fé</h3>
               <p>7 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/caminhodaluz.png" alt="No caminho da luz">
          <div class="book-info">
               <h3>No caminho da luz</h3>
               <p>5 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/crescendodesafios.png" alt="Crescendo com desafios">
          <div class="book-info">
               <h3>Crescendo com desafios</h3></h3>
               <p>4 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/fortalecasuaforca.png" alt="Fortaleça sua força interior">
          <div class="book-info">
               <h3>Fortaleça sua força interior</h3></h3>
               <p>4 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/grandesmudancas.png" alt="Grandes mudabças">
          <div class="book-info">
               <h3>Grandes mudabças</h3></h3>
               <p>7 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/habitos.png" alt="Transforme pequenos hábitos em grandes conquistas">
          <div class="book-info">
               <h3>Transforme pequenos hábitos em grandes conquistas</h3>
               <p>9 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/meuspensamentos.png" alt="Meus pensamentos e desafios">
          <div class="book-info">
               <h3>Meus pensamentos e desafios</h3>
               <p>5 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/positividade.png" alt="Diário da positividade">
          <div class="book-info">
               <h3>Diário da positividade</h3>
               <p>5 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/autoajuda/seame.png" alt="Se ame">
          <div class="book-info">
               <h3>Se ame</h3>
               <p>6 capitulos</p>
               <p>Autoajuda</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/20milleguas.png" alt="Vinte mil léguas submarinas">
          <div class="book-info">
               <h3>Vinte mil léguas submarinas</h3>
               <p>6 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/arepublica.png" alt="A república">
          <div class="book-info">
               <h3>A repúblca</h3>
               <p>7 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/cartasportuguesas.png" alt="Cartas portuguesas">
          <div class="book-info">
               <h3>Cartas portuguesas</h3>
               <p>7 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/condedemontecristo.png" alt="Conde de Monte Cristo">
          <div class="book-info">
               <h3>Conde de Monte Cristo</h3>
               <p>8 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/damacamelias.png" alt="A dama das camélias">
          <div class="book-info">
               <h3>A dama das camélias</h3>
               <p>6 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/dracula.png" alt="Drácula">
          <div class="book-info">
               <h3>Drácula</h3>
               <p>10 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/fausto.png" alt="Fausto">
          <div class="book-info">
               <h3>Fausto</h3>
               <p>11 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/ilhatesouro.png" alt="A ilha do tesouro">
          <div class="book-info">
               <h3>A ilha do tesouro</h3>
               <p>9 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

         <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/iliada.png" alt="A Ilíada">
          <div class="book-info">
               <h3>A Ilíada</h3>
               <p>5 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/odisseia.png" alt="A Odisseia">
          <div class="book-info">
               <h3>A Odisseia</h3>
               <p>7 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/orgulhoepreconceito.png" alt="Orgulho e preconceito">
          <div class="book-info">
               <h3>Orgulho e preconceito</h3>
               <p>8 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/paraisoperdido.png" alt="Paraíso perdido">
          <div class="book-info">
               <h3>Paraíso perdido</h3>
               <p>4 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/principe.png" alt="O príncipe">
          <div class="book-info">
               <h3>O príncipe</h3>
               <p>7 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/classicos/ventosuivantes.png" alt="O morro dos ventos uivantes">
          <div class="book-info">
               <h3>O morro dos ventos uivantes</h3>
               <p>3 capitulos</p>
               <p>Classico</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/2099.png" alt="2099">
          <div class="book-info">
               <h3>2099</h3>
               <p>5 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/alem.png" alt="Além">
          <div class="book-info">
               <h3>Além</h3>
               <p>6 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/alemmundo.png" alt="Além do mundo">
          <div class="book-info">
               <h3>Além do mundo</h3>
               <p>6 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/anel.png" alt="Anel de jaspe">
          <div class="book-info">
               <h3>Anel de jaspe</h3>
               <p>7 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/brilhonevoa.png" alt="Brilho na névoa">
          <div class="book-info">
               <h3>Brilho na névoa</h3>
               <p>12 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>
       
          <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/espacosideral.png" alt="Espaço sideral">
          <div class="book-info">
               <h3>Espaço sideral</h3>
               <p>8 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/homensdnoite.png" alt="Homens da noite">
          <div class="book-info">
               <h3>Homens da noite</h3>
               <p>7 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/imoveis.png" alt="Os imóveis">
          <div class="book-info">
               <h3>Os imóveis</h3>
               <p>9 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/invasoresguerreiros.png" alt="Invasores e guerreiros">
          <div class="book-info">
               <h3>Invasores e guerreiros</h3>
               <p>8 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/maravilha.png" alt="Maravilha">
          <div class="book-info">
               <h3>Maravilha</h3>
               <p>6 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/overdrimecosmico.png" alt="Overdrive Cóscimco">
          <div class="book-info">
               <h3>Overdrive Cóscimco</h3>
               <p>6 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/sonsuniverso.png" alt="Sons do universo lua">
          <div class="book-info">
               <h3>Sons do universo lua</h3>
               <p>6 capitulos</p>
               <p>Fição científica</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/asaventuraslily.png" alt="As aventuras de lily">
          <div class="book-info">
               <h3>As aventuras de lily</h3>
               <p>6 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/eraumavez.png" alt="Era uma vez">
          <div class="book-info">
               <h3>Era uma vez</h3>
               <p>3 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/forteamora.png" alt="A forte amora">
          <div class="book-info">
               <h3>A forte amora</h3>
               <p>3 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/guardiaomundo.png" alt="Os guardiões do bosque encantado">
          <div class="book-info">
               <h3>Os guardiões do bosque encantado</h3>
               <p>3 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/limaofeliz.png" alt="O limão feliz">
          <div class="book-info">
               <h3>O limão feliz</h3>
               <p>4 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/memoriasinfancia.png" alt="O limão feliz">
          <div class="book-info">
               <h3>Memórias da infância</h3>
               <p>4 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/MeninoRaposa.png" alt="O menino e a raposa">
          <div class="book-info">
               <h3>O menino e a raposa</h3>
               <p>4 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/monstrovermelho.png" alt="A lenda do monstro vermelho">
          <div class="book-info">
               <h3>A lenda do monstro vermelho</h3>
               <p>4 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/omundoleo.png" alt="Leo o bom leão">
          <div class="book-info">
               <h3>Leo o bom leão</h3>
               <p>4 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/sandramundo.png" alt="Como Sandra salvou o circo">
          <div class="book-info">
               <h3>Como Sandra salvou o circo</h3>
               <p>5 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/todosjuntos.png" alt="Todos juntos agora">
          <div class="book-info">
               <h3>Todos juntos agora</h3>
               <p>5 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/umatrupedocirco.png" alt="Uma trupe de circo">
          <div class="book-info">
               <h3>Uma trupe de circo</h3>
               <p>5 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/viagemestrelas.png" alt="Uma trupe de circo">
          <div class="book-info">
               <h3>Viagem pelas estrelas</h3>
               <p>6 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/infantil/vidasecretacoelhos.png" alt="A vida secreta dos coelhos">
          <div class="book-info">
               <h3>A vida secreta dos coelhos</h3>
               <p>7 capitulos</p>
               <p>Infantil</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/afabulagemeo.png" alt="A vida secreta dos coelhos">
          <div class="book-info">
               <h3>A fábula do gêmeo confundido</h3>
               <p>9 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/ateofim.png" alt="Até o fim">
          <div class="book-info">
               <h3>Até o fim</h3>
               <p>11 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/caodesaparecido.png" alt="O mistério do cachorro desaparecido">
          <div class="book-info">
               <h3>O mistério do cachorro desaparecido</h3>
               <p>11 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/criaturasmbrias.png" alt="Criaturas sombrias">
          <div class="book-info">
               <h3>Criaturas sombrias</h3>
               <p>10 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/entradaelegancia.png" alt="Sua entrada com elegância">
          <div class="book-info">
               <h3>Sua entrada com elegância</h3>
               <p>9 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/espreitaescuro.png" alt="O que espreita no escuro">
          <div class="book-info">
               <h3>O que espreita no escuro</h3>
               <p>7 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/estrelasnoite.png" alt="Pelas estrelas da noite">
          <div class="book-info">
               <h3>Pelas estrelas da noite</h3>
               <p>8 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/florestamisteriosa.png" alt="A floresta misteriosa">
          <div class="book-info">
               <h3>A floresta misteriosa</h3>
               <p>8 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/olharesmare.png" alt="Olhares na maré">
          <div class="book-info">
               <h3>Olhares na maré</h3>
               <p>4 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/segredosdomar.png" alt="Os segredos do mar">
          <div class="book-info">
               <h3>Os segredos do mar</h3>
               <p>5 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/semsolucao.png" alt="Sem solução">
          <div class="book-info">
               <h3>Sem solução</h3>
               <p>6 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/misterio/vidasecreta.png" alt="A vida secreta dos pintores">
          <div class="book-info">
               <h3>A vida secreta dos pintores</h3>
               <p>8 capitulos</p>
               <p>Mistério</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/amorquefloresce.png" alt="No mesmo calho: Um amor que floresce">
          <div class="book-info">
               <h3>No mesmo calho: Um amor que floresce</h3>
               <p>10 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/cartadeamor.png" alt="Carta de amor do passado">
          <div class="book-info">
               <h3>Carta de amor do passado</h3>
               <p>9 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/cartasverao.png" alt="Cartas para um verão inesperado">
          <div class="book-info">
               <h3>Cartas para um verão inesperado</h3>
               <p>11 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/coracaopapeç.png" alt="Coração de papel">
          <div class="book-info">
               <h3>Coração de papel</h3>
               <p>13 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/coracoesilencio.png" alt="Corações em silêncio">
          <div class="book-info">
               <h3>Corações em silêncio</h3>
               <p>14 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/historiaverao.png" alt="Uma história de verão">
          <div class="book-info">
               <h3>Uma história de verão</h3>
               <p>9 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/mariana.png" alt="Mariana">
          <div class="book-info">
               <h3>Mariana</h3>
               <p>7 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/nossaquimica.png" alt="Nossa química">
          <div class="book-info">
               <h3>Nossa química</h3>
               <p>5 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/outroladoamor.png" alt="Desvendando o mistério, o outro lado do amor">
          <div class="book-info">
               <h3>Desvendando o mistério, o outro lado do amor</h3>
               <p>7 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/quandovocechegou.png" alt="Quando você chegou">
          <div class="book-info">
               <h3>Quando você chegou</h3>
               <p>10 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/tudopornosdois.png" alt="Tudo por nós dois">
          <div class="book-info">
               <h3>Tudo por nós dois</h3>
               <p>7 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>

        <div class="book-item">
          <img src="/public/assets/capas-pi/romance/ultimoromance.png" alt="A última mensagem de amor">
          <div class="book-info">
               <h3>A última mensagem de amor</h3>
               <p>8 capitulos</p>
               <p>Romance</p>
          </div>
          <div class="book-actions">
            <button class="editar">Editar</button>
            <button class="excluir">Excluir</button>
          </div>
        </div>


</body>
</html>

<?php require 'partials/footer.php'; ?>
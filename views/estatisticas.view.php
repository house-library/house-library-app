<?php require 
'../views/partials/headeradm.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estatísticas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="/views/partials/styles/footer.css">
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>
    <link rel="stylesheet" href="../views/partials/styles/reset.css">
    <link rel="stylesheet" href="../views/partials/styles/headeradm.css">
    <link rel="stylesheet" href="../views/partials/styles/footer.css">
    <link rel="stylesheet" href="../views/partials/styles/estatisticas.css">
</head>

<body>

 <main class="content">
  <h1>Painel de estatísticas</h1>
</main>

 <div id="myPlot" style="width:80%;max-width:650px"></div>

<script>
const xArray = [40,50,60,70,80,90,100,110,120,130,140,150];
const yArray = [6,16,10,13,15,9,12,11,12,14,10];

// Define Data
const data = [{
  x: xArray,
  y: yArray,
  mode:"lines"
}];

// Define Layout
const layout = {
  xaxis: {range: [40, 160], title: "Jan     Fev      Mar      Abr      Mai      Jun      Jul      Ago      Set      Out      Nov      Dez"},
  yaxis: {range: [5, 16], title: "Quantidade de vendas"},  
  title: "Vendas mensais"
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
</script>

<canvas id="myChart" style="width:75%;max-width:360px"></canvas>

<script>
const xValues = ["Se ame", "Nossa química", "Vida secreta", "Era uma vez", "Espaço sideral"];
const yValues = [55, 49, 44, 24, 15];
const barColors = ["red", "green","blue","orange","brown"];

const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    plugins: {
      legend: {display: false},
      title: {
        display: true,
        text: "Ebooks mais vendidos",
        font: {size: 16}
      }
    }
  }
});
</script>

<h2>Mais vendidos</h2>
          <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/2099.png" alt="2099">
          <div class="book-info">
               <h3>2099</h3>
               <p>8 capitulos</p>
               <p>Ficção cientifica</p>
          </div>
          </div>

          <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/2099.png" alt="2099">
          <div class="book-info">
               <h3>2099</h3>
               <p>8 capitulos</p>
               <p>Ficção cientifica</p>
          </div>
        </div>

          <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/2099.png" alt="2099">
          <div class="book-info">
               <h3>2099</h3>
               <p>8 capitulos</p>
               <p>Ficção cientifica</p>
          </div>
          </div>

          <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/2099.png" alt="2099">
          <div class="book-info">
               <h3>2099</h3>
               <p>8 capitulos</p>
               <p>Ficção cientifica</p>
          </div>
          </div>

          <div class="book-item">
          <img src="/public/assets/capas-pi/ficcçao cientifica/2099.png" alt="2099">
          <div class="book-info">
               <h3>2099</h3>
               <p>8 capitulos</p>
               <p>Ficção cientifica</p>
          </div>
          </div>

</body>
</html>

<?php require 'partials/footer.php'; ?>
    

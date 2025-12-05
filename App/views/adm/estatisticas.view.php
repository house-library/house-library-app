<?php
$is_admin_page = true;

loadPartial('head', $data);
include __DIR__ . '/../vlibras.html';
loadPartial('headeradm'); 
?>

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>

<style>
  
.header {
    position: fixed;
    top: 0 !important;
    left: 0;
    width: 100%;
}

.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 80rem;
    margin: 0;
    height: 90px;
}

.container{
    margin: 0;
    padding:0;
    top: 0;
    left: 0;
}

.logo {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 4.5rem;
}

.btn-mobile-nav {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #131d4f;
}

.sidebar {
    height: 100vh;
    width: 280px;
    position: fixed;
    z-index: 1001;
    top: 0;
    left: auto;
    right: -280px;
    background-color: #fff;
    overflow-x: hidden;
    overflow-y: auto;
    transition: right 0.3s ease-out;
    box-shadow: -2px 0 15px rgba(0, 0, 0, 0.1);
}

.sidebar.active {
    left: auto !important;
    right: 0 !important;
}

</style>

<main>
    <h2>Painel de estatísticas</h2>

    <section class="charts">
        <div id="myPlot"></div>
        <canvas id="myChart"></canvas>
    </section>

    <script>
    const xArray = [40,50,60,70,80,90,100,110,120,130,140,150];
    const yArray = [6,16,10,13,15,9,12,11,12,14,10];

    const data = [{
      x: xArray,
      y: yArray,
      mode:"lines"
    }];

    const layout = {
      xaxis: {range: [40, 160], title: "Jan   Fev    Mar    Abr    Mai    Jun    Jul    Ago   Set    Out    Nov    Dez"},
      yaxis: {range: [5, 16], title: "Quantidade de vendas"},  
      title: "Vendas mensais"
    };

    Plotly.newPlot("myPlot", data, layout);
    </script>

    <script>
    const xValues = ["Se ame", "Nossa química", "Vida secreta", "Era uma vez", "Espaço sideral"];
    const yValues = [389, 344, 266, 243, 241];
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
    
    <div class="books">
      <div class="book-item">
        <img src="/assets/capas-pi/autoajuda/seame.png" alt="Se ame">
        <h3>Se ame</h3>
        <p>#01 mais vendido</p>
      </div>

      <div class="book-item">
        <img src="/assets/capas-pi/romance/nossaquimica.png" alt="Nossa química">
        <h3>Nossa química</h3>
        <p>#02 mais vendido</p>
      </div>

      <div class="book-item">
        <img src="/assets/capas-pi/misterio/vidasecreta.png" alt=" A vida secreta dos pintores">
        <h3>A vida secreta dos pintores</h3>
        <p>#03 mais vendido</p>
      </div>

      <div class="book-item">
        <img src="/assets/capas-pi/literatura_infantil/eraumavez.png" alt="Era uma vez">
        <h3>Era uma vez</h3>
        <p>#04 mais vendido</p>
      </div>

      <div class="book-item">
        <img src="/assets/capas-pi/fic-cientifica/espacosideral.png" alt="Espaço sideral">
        <h3>Espaço sideral</h3>
        <p>#05 mais vendido</p>
      </div>
    </div>
</main>

<?php loadPartial('footer'); ?>
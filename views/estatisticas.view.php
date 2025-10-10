  <?php
  require 'partials/header.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estatísticas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>
 <div id="myPlot" style="width:100%;max-width:700px"></div>

<script>
const xArray = [50,60,70,80,90,100,110,120,130,140,150];
const yArray = [7,8,8,9,9,9,10,11,14,14,15];

// Define Data
const data = [{
  x: xArray,
  y: yArray,
  mode:"lines"
}];

// Define Layout
const layout = {
  xaxis: {range: [40, 160], title: "Square Meters"},
  yaxis: {range: [5, 16], title: "Price in Millions"},  
  title: "House Prices vs. Size"
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
</script>
</body>
</html>

    <?php require 'partials/footer.php'; ?>

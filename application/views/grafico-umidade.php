<?php $this->load->view('partes/cabeçalho-painel'); ?>

<?php $this->load->view('partes/nav'); ?>

<div class="container-fluid">

          

          <!-- Content Row -->
          <div class="row">

       

          <!-- LOGO DMA -->
          <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-900">Monitoramento de Umidade</h1><br>
          
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
          ['Data/Hora', 'Umidade'],
        <?php foreach ($monitoramentos as $monitoramento){?>
        <?php $timestamp = strtotime($monitoramento ['data_hora']);
                $date = date('d/m/Y', $timestamp);
                $time = date('H:i:s', $timestamp);?>
          ['<?= $date?> <?= $time?>',  <?= $monitoramento['humidade']?>],
        <?php } ?>
        ]);
        
        var options = {
          title: 'Umidade (%)',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  
  <body>
    <div id="curve_chart" style="width: 100%; height: 500px"></div>
  </body>

          </div>
          </div>
</div><br>

           

<?php $this->load->view('partes/rodape-painel'); ?>
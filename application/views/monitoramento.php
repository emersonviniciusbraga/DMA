
<?php $this->load->view('partes/cabeçalho-painel'); ?>

<?php $this->load->view('partes/nav'); ?>




<div class="container-fluid">

          

          <!-- Content Row -->
          <div class="row">

       

          <!-- LOGO DMA -->
          <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-900">Painel de Monitoramento</h1><br>

          <?php $this->load->view('partes/cards'); ?><br>
          
          
            <script type="text/javascript">
              function Atualizar(){
                window.location.reload();
              }
            </script> 


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
            <p class="mb-4 text-gray-900">Veja aqui os valores medidos.</p>

              <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <tr>
              <th style="text-align: center;" scope="col">ID</th>
              <th style="text-align: center;" scope="col">Amônia (PPM) 
                <a style="text-align: left;" href="#">
                <i style="color: orange;">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                  </svg>
                </i>
                </a>
              </th>
              <th style="text-align: center;" scope="col">Temperatura (°C)  
                <a href="#">
                <i style="color: red;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-thermometer-half" viewBox="0 0 16 16">
                    <path d="M8 1.75a.25.25 0 0 1 .25.25v9.02a1.5 1.5 0 1 1-.5 0V2A.25.25 0 0 1 8 1.75z"/>
                    <path d="M6 2a2 2 0 1 1 4 0v7.627a3.5 3.5 0 1 1-4 0V2zm2-1a1 1 0 0 0-1 1v7.901a.5.5 0 0 1-.25.433A2.499 2.499 0 0 0 8 15a2.5 2.5 0 0 0 1.25-4.666.5.5 0 0 1-.25-.433V2a1 1 0 0 0-1-1z"/>
                  </svg>
                  </i>
              </th>
              <th style="text-align: center;" scope="col">Umidade (%) 
                <a href="#">
                <i style="color: blue;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z"/>
                  </svg>
                </i>
                </a>
              </th>
              <th style="text-align: center;" scope="col">Data</th>
              <th style="text-align: center;" scope="col">Horário</th>
            </tr>
          </thead>
          <!-- onload="setInterval('Atualizar()', 10000)" -->
        <body onload="setInterval('Atualizar()', 3000)">
          <tbody>
            <?php foreach($monitoramento as $monitoramento){?>
              <?php if($monitoramento ['end_mac'] == $sistemas['mac']){?>
              <?php $timestamp = strtotime($monitoramento ['data_hora']);
                    $date = date('d/m/Y', $timestamp);
                    $time = date('H:i:s', $timestamp);?>
              
            <tr>
              <!-- ID -->
              <td style="font-weight: bold;"><?= $monitoramento ['id_monitoramento'] ?></td>
              
              <!-- Sensor 1 -->
              <?php if ($monitoramento ['amonia'] >= 25) {?>
                <td style="color: red;"><?= $monitoramento ['amonia'] ?></td>
              <?php }elseif ($monitoramento ['amonia'] >= 15) { ?>
                <td style="color: #FFA500;"><?= $monitoramento ['amonia'] ?></td>
              <?php }else{?>
                <td><?= $monitoramento ['amonia'] ?></td>
              <?php }?>
              
              <!-- Sensor 2 -->
              <?php if ($monitoramento ['temperatura'] >= 45) {?>
                <td style="color: red;"><?= $monitoramento ['temperatura'] ?></td>
              <?php }elseif ($monitoramento ['temperatura'] >= 35) { ?>
                <td style="color: #FFA500;"><?= $monitoramento ['temperatura'] ?></td>
              <?php }else{?>
                <td><?= $monitoramento ['temperatura'] ?></td>
              <?php }?>

              <!-- Sensor 3 -->
              <?php if ($monitoramento ['humidade'] >= 60) {?>
                <td style="color: red;"><?= $monitoramento ['humidade'] ?></td>
              <?php }elseif ($monitoramento ['humidade'] >= 50) { ?>
                <td style="color: #FFA500;"><?= $monitoramento ['humidade'] ?></td>
              <?php }else{?>
                <td><?= $monitoramento ['humidade'] ?></td>
              <?php }?>

              <!-- Data/Hora -->
              <td><?= $date ?></td>
              <td><?= $time ?></td>
            </tr>
            
              <?php }else{?>
              <?php }?>
            <?php }?>
       
              
          </tbody>
        </body>
      </table>


              </div>
            </div>
          </div>

        </div>
          
        <!-- /.container-fluid -->

      </div>
    </div>
  </div>

<?php $this->load->view('partes/rodape-painel'); ?>


<?php $this->load->view('partes/cabeçalho-painel'); ?>


  <!-- Page Wrapper -->
<?php $this->load->view('partes/nav'); ?>

        <!-- Begin Page Content -->
    <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

          <!-- LOGO DMA -->
          <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-900">Controle de Sistemas</h1><br>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {
        "packages":["map"],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        "mapsApiKey": "AIzaSyBFxQFJhKXoIeaEf7tgIkUB-2Qs0ZPctqU"
      });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Cidade'],
          <?php foreach ($sistemas as $sistema){?>
          [<?= $sistema['latitude'] ?>, <?= $sistema['longitude']?>, '<?= $sistema['nomeaviario']?>'],
          <?php } ?>
        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {
          showTooltip: true,
          showInfoWindow: true
        });
      }

    </script>
  

  <body>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="text-center" id="map_div" style="width: 100%; height: 300px"></div>
        </div>
      </div>
  </body>
          
          <?php if($this->session->flashdata('sucesso_exclusao')) : ?>
            <p class="alert alert-success"><?= $this->session->flashdata('sucesso_exclusao') ?></p>
          <?php endif ?>

          <?php if($this->session->flashdata('error_exclusao')) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata('error_exclusao') ?></p>
          <?php endif ?>

          <?php if($this->session->flashdata('sucesso')) : ?>
            <p class="alert alert-success"><?= $this->session->flashdata('sucesso') ?></p>
          <?php endif ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <p class="mb-4 text-gray-900">Veja aqui a lista de seus Sistemas </p>
              <div class="table-responsive">
                <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome do Dispositivo</th>
              <th scope="col">Endereço Mac</th>
              <th scope="col">Nome do Aviário</th>
              <th scope="col">Cidade</th>
              <th scope="col">Monitoramento</th>
              <th scope="col">Editar</th>
              <!-- <th scope="col">Excluir</th> -->
            
            </tr>
          </thead>
        <body>
          <tbody>
            
            <?php foreach($sistemas as $sistema){?>
              <?php if($sistema ['usuario_id'] == $_SESSION['logged_user']['id']){?>
            <tr>
              <td><?= $sistema ['codigo'] ?></td>
              <td><?= $sistema ['nomedispositivo'] ?></td>
              <td><?= $sistema ['mac'] ?></td>
              <td><?= $sistema ['nomeaviario'] ?></td>
              <td><?= $sistema ['cidade'] ?></td>
              <td>
                <a href="<?= base_url('')?>index.php/monitoramento/dados/<?= $sistema['mac']?>">
                  <i class="btn btn-info">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                    </svg>
                  </i>
                </a>
              </td>
              <td>
                <a href="<?php base_url()?>sistemas/edit/<?= $sistema ['codigo'] ?>" class="btn btn-info">
                  <i><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg>
                  </i>
                </a>
              </td>
              <!-- <td>
                <a href="javascript:goDelete(</?= $sistema ['codigo'] ?>)" class="btn btn-info">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                  </svg>
                  <script>
                    function goDelete($codigo){
                      var myUrl = '</?php base_url()?>sistemas/delete/</?= $sistema ['codigo'] ?>'
                        if(confirm('Deseja realmente excluir esse registro?')){
                          window.location.href = '</?php base_url()?>sistemas/delete/' + $codigo;
                        }else{
                          
                          alert('Registro não alterado!');
                        }
                    }
                  </script>
                </a>

              </td> -->

            </tr>
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
   
      <!-- End of Main Content -->

<?php $this->load->view('partes/rodape-painel'); ?>

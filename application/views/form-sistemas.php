<?php $this->load->view('partes/cabeçalho-painel'); ?>



  <!-- Page Wrapper -->
  <?php $this->load->view('partes/nav'); ?>

<main role="main" >
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
      
        <div class="row">
          <div class="col">
                
          <?php if(isset($sistemas)): ?>
          <div class="text-left">
                    <h1 class="h3 mb-2 text-gray-900"><?php echo $nome ?></h1>
                </div>
          <form action="<?= base_url('')?>index.php/sistemas/update/<?= $sistemas['codigo']?>" method="post" class="user">
          <?php else :?>
          <div class="text-left">
                    <h1 class="h3 mb-2 text-gray-900"><?php echo $nome ?></h1>
                </div>
          <form action="<?= base_url('')?>index.php/sistemas/store" method="post" class="user">
          <?php endif ;?>
          <br>
          <?php if($this->session->flashdata('error')) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
          <?php endif ?>
          
          <div class="row">
            <div class="col-sm">
              <label for="nomedispositivo">Nome do Dispositivo</label>
              <input type="text" class="form-control" name="nomedispositivo" id="nomedispositivo" placeholder="Nome do Dispositivo" required value="<?= isset($sistemas) ? $sistemas['nomedispositivo'] : ''?>">
            </div>

            <div class="col-sm">
              <label for="mac">Endereço Mac</label>
              <input type="text" class="form-control" name="mac" id="mac" placeholder="Mac" required value="<?= isset($sistemas) ? $sistemas['mac'] : ''?>">
            </div>

            <div class="col-sm">
              <label for="nomeaviario">Nome do Aviário</label>
              <input type="text" class="form-control" name="nomeaviario" id="nomeaviario" placeholder="Nome Aviário" required value="<?= isset($sistemas) ? $sistemas['nomeaviario'] : ''?>">
            </div>
          </div><br>

          <div class="row">
            <div class="col-sm">
              <label for="latitude">Latitude</label>
              <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" required value="<?= isset($sistemas) ? $sistemas['latitude'] : ''?>">
            </div>

            <div class="col-sm">
              <label for="longitude">Longitude</label>
              <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" required value="<?= isset($sistemas) ? $sistemas['longitude'] : ''?>">
            </div>

            <div class="col-sm">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" required value="<?= isset($sistemas) ? $sistemas['cidade'] : ''?>">
            </div>
          </div><br>

          
          <div class="col-md-6">
              <button type="submit" class="btn btn-success btn-xs">Salvar</button>
              <a href="<?= base_url('')?>index.php/sistemas" class="btn btn-light btn-xs">Cancelar</a>
          </div>

          </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php $this->load->view('partes/rodape-painel'); ?>
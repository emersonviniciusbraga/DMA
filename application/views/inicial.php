<?php $this->load->view('partes/cabeçalho-index'); ?>

<?php $this->load->view('partes/nav-index'); ?>




  
  
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <img style="width: 100%;" src="<?= base_url('Estilo Index/img/dma.png')?>">
        </div>
      </div>
    </div>
  </header>


  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('<?= base_url('Estilo Index/img/galinha.jpg')?>'); "></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Conheça um Pouco</h2>
          <p class="lead mb-0" style="text-align: justify;">O D.M.A, tem o intuito de ajudar os profissionais da área da avicultura a ter um melhor aproveitamento das aves, através da prevenção do alto nível da amônia.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('<?= base_url('Estilo Index/img/galinha2.png')?>');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Como Funciona</h2>
          <p class="lead mb-0" style="text-align: justify;">O D.M.A utiliza de um sensor capaz de verificar o nível de gás amoníaco no ar. Além disso ele conta com essa base web que funciona como central de controle dos dispositivos.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Desenvolvedores <i class="fas fa-code"></i></h2><br>
      <div class="row">
        <div class="col-lg-3">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="<?= base_url('Estilo Index/img/icon.png')?>" alt="">
            <h5>Emerson Braga</h5>
            <p class="font-weight-light mb-0">Fullstack Developer</p>
            <br>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="<?= base_url('Estilo Index/img/icon.png')?>" alt="">
            <h5>Ryssa Daiane Sena</h5>
            <p class="font-weight-light mb-0">Estudante do 4°ano de Informática</p>
          </div>
        </div>
         <div class="col-lg-3">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="<?= base_url('Estilo Index/img/icon.png')?>" alt="">
            <h5>Raul Praxedes</h5>
            <p class="font-weight-light mb-0">Estudante do 3°ano de Informática</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="<?= base_url('Estilo Index/img/icon.png')?>" alt="">
            <h5>Danyel Aguiar</h5>
            <p class="font-weight-light mb-0">Engenheiro da Computação</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Venha fazer parte do D.M.A</h2>
        </div>
      </div>
    </div>
  </section>

<?php $this->load->view('partes/rodape-index'); ?>
<?php $this->load->view('partes/cabecalho-login'); ?>

	<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
					<form action="<?= base_url()?>index.php/signup/store" method="POST" class="login100-form validate-form">
          <span class="login100-form-title p-b-33">
						Faça Cadastro
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input for="nome" class="input100" type="text" name="nome" placeholder="Nome">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input for="email" class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input  for="senha" class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" class="login100-form-btn">
							Cadastar
						</button>
					</div><br>

						<div class="text-center">
						<input type="checkbox" onclick="mostrarSenha()"> Mostrar senha
						<script>
							function mostrarSenha(){
							var tipo = document.getElementById("inputSenha");
							if(tipo.type == "password"){
								tipo.type = "text";
							}else{
								tipo.type = "password";
							}
							}
						</script>
						</div>

						<br>
            <div class="text-center">
              <span class="txt1">
                Ja tem conta?
              </span>

              <a href="<?= base_url()?>index.php/login" class="txt2 hov1">
                Login
              </a>
            </div>

            <?php if($this->session->flashdata('error')) : ?>
              <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
            <?php endif ?>
            
					</form>
				</div>
			</div>
	</div>



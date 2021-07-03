<div class="container">
<div class="row">
    <body>
        
        <?php if(isset($cards)){?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-sm">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Amônia</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($cards) ? $cards ['amonia'] : ''?> PPM</div>
                            </div>
                            <div class="col-auto">
                            <i class="far fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div><br>
                        <a href="<?= base_url('')?>index.php/chart/dadosAmonia/<?= $sistemas['mac']?>" class="btn btn-light">
                            Ver Gráfico 
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-sm">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Temperatura</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($cards) ? $cards ['temperatura'] : ''?> °C</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-temperature-low fa-2x text-gray-300"></i>   
                            </div>
                        </div><br>
                        <a href="<?= base_url('')?>index.php/chart/dadosTemperatura/<?= $sistemas['mac']?>" class="btn btn-light">
                            Ver Gráfico 
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-sm">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Umidade</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($cards) ? $cards ['humidade'] : ''?> %</div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-tint fa-2x text-gray-300"></i>  
                            </div>
                        </div><br>
                        <a href="<?= base_url('')?>index.php/chart/dadosUmidade/<?= $sistemas['mac']?>" class="btn btn-light">
                            Ver Gráfico 
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php }else{?>
                
                <!-- Earnings (Monthly) Card Example -->
            <div class="col-sm">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Amônia</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0 PPM</div>
                            </div>
                            <div class="col-auto">
                            <i class="far fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-sm">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Temperatura</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0 °C</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-temperature-low fa-2x text-gray-300"></i>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-sm">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Umidade</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0 %</div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-tint fa-2x text-gray-300"></i>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

            
    </body>
</div>
</div>
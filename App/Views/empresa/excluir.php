<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <form class="form-horizontal" method="POST" action="http://<?php echo APP_HOST; ?>/empresa/excluir">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Excluir Empresa
            </header>
            <div class="panel-body">    
             <div class="col-lg-12">
              <section class="panel">
                <div class="alert alert-info" role="alert">                    
                  <b>Se a empresa selecionada for excluida, todas as vagas vinculadas a esta empresa também serão excluidas (total de vaga(s): <?php echo count($viewVar['vagas']); ?>). Tem certeza que deseja continuar?</b>
                </div>
              </section>
            </div>              
            <?php if($viewVar['vagas']) { ?>
            <div class="col-lg-6">
              <section class="panel">
                <div class="alert alert-success" role="alert">                    
                  <p><b>Vagas Vinculadas:</b></p>
                  <br>
                  <?php
                  foreach ($viewVar['vagas'] as $vaga) {
                    echo "<p>".$vaga->getTitulo()."</p>";
                  }
                  ?>
                </div>
              </section>
            </div>     
            <?php } ?>
          </div>
        </section>
      </div>
      <div class="col-md-12">
        <div class="panel-body" align="right">  
          <input type="hidden" name="idempresa" value="<?php echo $viewVar['empresa']->getIdEmpresa() ?>">   
          <button class="btn btn-danger" type="submit" >Confirmar Exclusão</button>
          <a href="http://localhost/mvc-crud-mn/empresa/listar" class="btn btn-success">Cancelar</a>
        </div>
      </div>
    </div>        
  </form>
</section>
</section>
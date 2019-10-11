
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <form class="form-horizontal" method="POST" action="http://<?php echo APP_HOST; ?>/vaga/excluir">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Excluir Vaga
            </header>
            <div class="panel-body">    
             <div class="col-lg-12">
              <section class="panel">
                <div class="alert alert-info" role="alert">
                  <b>Tem certeza que deseja excluir a vaga selecionada?</b>
                  <p>(<?php echo $viewVar['vaga']->getTitulo(); ?>)</p>
                </div>
              </section>
            </div>
            <div class="col-lg-6">
              <section class="panel">
                <div class="alert alert-success" role="alert">
                  <p><b>Tecnologias Vinculadas:</b></p>
                  <br>
                  <?php
                  foreach ($viewVar['tecnologias'] as $tecnologia) {
                    echo "<p>".$tecnologia->getTecnologia()."</p>";
                  }
                  ?>
                </div>
              </section>
            </div>

          </div>
        </section>
      </div>


      <div class="col-md-12">
        <div class="panel-body" align="right">
          <input type="hidden" name="idvaga" value="<?php echo $viewVar['vaga']->getIdVaga() ?>">      
          <button class="btn btn-danger" type="submit" >Confirmar Exclusão</button>
          <a href="http://<?php echo APP_HOST; ?>/vaga/listar" class="btn btn-success">Voltar</a>
        </div>
      </div>

    </div>        
  </form>
</section>
</section>



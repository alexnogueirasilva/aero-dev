  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <form class="form-horizontal" id="form_cadastro_tecnologia" method="POST" action="http://<?php echo APP_HOST; ?>/tecnologia/salvar">

          <?php if($sessao::retornaErro()){ ?>
           <div class="col-lg-12">
             
            <div class="alert alert-danger" role="alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php foreach($sessao::retornaErro() as $key => $mensagem){ ?>
                <?php echo $mensagem; ?> <br>
                <?php } ?>
              </div>
              
            </div>             
            <?php } ?>  
            
            <div class="col-lg-12">
              <section class="panel panel-default">
                <header class="panel-heading">
                  Cadastro de nova Tecnologia
                </header>
                <div class="panel-body">                

                 <div class="form-group">
                  <label  class="col-lg-3 col-sm-3 control-label">Nome da Tecnologia</label>
                  <div class="col-lg-9">
                    <div class="iconic-input right">
                      <input type="text" maxlength="45" name="tecnologia" class="form-control" required placeholder="Nome da Tecnologia" value=<?php echo $viewVar['tecnologia']->getTecnologia();?> >
                    </div>
                  </div>
                </div>                
              </section>
            </div>


            <div class="col-md-12">                        
              <div align="right">  
                <a class="btn btn-success" href="http://<?php echo APP_HOST; ?>/tecnologia/listar">Voltar</a>               
                <button class="btn btn-info">Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </section>

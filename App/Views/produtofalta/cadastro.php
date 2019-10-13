  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <form class="form-horizontal" id="form_cadastro_empresa" method="POST" action="http://<?php echo APP_HOST; ?>/empresa/salvar">

          <?php if($sessao::retornaErro()){ ?>
           <div class="col-lg-12">            
            <div class="alert alert-danger" role="alert">                
              <?php foreach($sessao::retornaErro() as $key => $mensagem){ ?>
                <?php echo $mensagem; ?> <br>
                <?php } ?>
              </div>              
            </div>             
            <?php } ?>  
            
            <div class="col-lg-12">
              <section class="panel panel-default">
                <header class="panel-heading">
                  Cadastro de nova Empresa
                </header>
                <div class="panel-body">                

                 <div class="form-group">
                  <label  class="col-lg-3 col-sm-3 control-label">Razão Social</label>
                  <div class="col-lg-9">
                    <div class="iconic-input right">
                      <input type="text" name="razaoSocial" class="form-control" required value=<?php echo $viewVar['empresa']->getRazaoSocial(); ?> >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-lg-3 col-sm-3 control-label">Nome Fantasia</label>
                  <div class="col-lg-9">
                    <div class="iconic-input right">
                      <input type="text" name="nomeFantasia" class="form-control" required value=<?php echo $viewVar['empresa']->getNomeFantasia(); ?>>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-lg-3 col-sm-3 control-label">CNPJ</label>
                  <div class="col-lg-9">
                    <div class="iconic-input right">
                      <input type="text" name="CNPJ" id="CNPJ" class="form-control" required value=<?php echo $viewVar['empresa']->getCNPJ(); ?>>                      
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <div class="col-md-12">                      
            <div align="right"> 
              <a class="btn btn-success" href="http://<?php echo APP_HOST; ?>/empresa/listar">Voltar</a>
              <button class="btn btn-info">Cadastrar</button>
            </div>            
          </div>
          
        </form>
      </div>
    </section>
  </section>
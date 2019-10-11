
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <form class="form-horizontal" id="form_cadastro" method="POST" action="http://<?php echo APP_HOST; ?>/vaga/editar">

       <?php if($sessao::retornaErro()) { ?>
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
                Editar Vaga
              </header>
              <div class="panel-body">                
                <div class="form-group">
                  <br><br>
                  <label  class="col-lg-3 col-sm-3 control-label">Título</label>
                  <div class="col-lg-9">
                    <div class="iconic-input right">                      
                      <input type="hidden" name="idvaga" value=<?php echo $viewVar['vaga']->getIdVaga(); ?>>
                      <input type="text" name="titulo" class="form-control" required value=<?php echo $viewVar['vaga']->getTitulo(); ?>>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-lg-3 col-sm-3 control-label">Empresa</label>
                  <div class="col-lg-9">
                    <div class="iconic-input">                    
                      <input type="text" name="autocomplete" id="autocomplete-empresa" class="form-control"  placeholder="Empresa - autocomplete" value=<?php echo $viewVar['vaga']->getEmpresa()->getNomeFantasia(); ?>>                
                      <input type="hidden" id="empresa" name="empresa" value=<?php echo $viewVar['vaga']->getEmpresa()->getIdEmpresa(); ?>>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-lg-3 col-sm-3 control-label">Descrição</label>
                  <div class="col-lg-9">
                    <div class="iconic-input right">
                      <textarea class="form-control spinner" placeholder="Descrição da Vaga" rows="5" name="descricao"
                      required><?php echo $viewVar['vaga']->getDescricao(); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <div class="col-md-12">
            <section class="panel panel-default">
              <header class="panel-heading">
               Tecnologias
             </header>
             <div class="panel-body">
              <div id="tecnologias-selecionadas">
                <div class="form-group">
                  <label  class="col-lg-3 col-sm-3 control-label">Adicionar</label>
                  <div class="col-lg-9">
                    <div class="iconic-input right">
                      <input type="text" id="autocomplete-tecnologia" class="form-control " placeholder="Tecnologias">
                    </div>
                  </div>
                </div>
                <table class="table table-striped">
                  <thead>
                    <th>Tecnologia</th>
                    <th>Remover</th>
                  </thead>
                  <tbody id="editar-tabela-tecnologias">
                    <?php
                    
                    foreach ($viewVar['vaga']->getTecnologias() as $tecnologia) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $tecnologia->getTecnologia(); ?>
                          <input type="hidden" name="tecnologias[]" value=<?php echo $tecnologia->getIdTecnologia(); ?>>
                        </td>
                        <td><button class="btn btn-danger btn-sm" type="button" onClick="app.removeTecnologia(this,<?php echo $tecnologia->getIdTecnologia(); ?>)">remover</button></td>
                      </tr>
                      <?php                    
                    }
                    ?>                   
                  </tbody>
                </table>                
              </div>              
            </section>
          </div>

          <div class="col-md-12">
            <div align="right">   
              <a href="http://<?php echo APP_HOST; ?>/vaga/listar" class="btn btn-success">Voltar</a>
              <button class="btn btn-info" type="submit" >Atualizar</button>           
            </div>
          </div>
        </div>
      </form>
    </section>
  </section>


  <div id="modal-tecnologias" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ATENÇÃO</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-block alert-danger fade in" id="div-modal"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
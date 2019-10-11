<section id="main-content">
  <section class="wrapper">
    <div class="row">
      
      <?php if($sessao::retornaMensagem()){ ?>
        <div class="col-lg-12">                     
          <div class="alert alert-success" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <b><?php echo $sessao::retornaMensagem(); ?></b>
          </div> 
        </div>
        <?php } ?>

        <div class="col-lg-12">
          <section class="panel panel-default">
            <header class="panel-heading">
              Tecnologias Cadastradas
            </header>
            <div class="panel-body">              
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>ID </th>
                    <th>Tecnologia </th>   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach($viewVar['tecnologias'] as $tecnologia) {
                    ?>
                    <tr>
                      <td><?php echo $tecnologia->getIdTecnologia(); ?></td>
                      <td><?php echo $tecnologia->getTecnologia(); ?></td>
                      <td align="right">
                        <a href="http://<?php echo APP_HOST; ?>/tecnologia/edicao/<?php echo $tecnologia->getIdTecnologia(); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                        
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>            
            </div>
          </section>
        </div>
      </div>
    </section>
  </section>
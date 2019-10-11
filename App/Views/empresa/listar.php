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
              Empresas Cadastradas
            </header>
            <div class="panel-body">              
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>ID </th>
                    <th>Razão Social </th>
                    <th class="hidden-phone">Nome Fantasia</th>
                    <th>CNPJ</th>                  
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach($viewVar['empresas'] as $empresa) {
                    ?>
                    <tr>
                      <td><?php echo $empresa->getIdEmpresa(); ?></td>
                      <td><?php echo $empresa->getRazaoSocial(); ?></td>
                      <td class="hidden-phone" width="30%"><?php echo $empresa->getNomeFantasia(); ?></td>
                      <td><?php echo $empresa->getCNPJ(); ?></td>

                      <td align="right">
                        <a href="http://<?php echo APP_HOST; ?>/empresa/edicao/<?php echo $empresa->getIdEmpresa(); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                        <a href="http://<?php echo APP_HOST; ?>/empresa/exclusao/<?php echo $empresa->getIdEmpresa(); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
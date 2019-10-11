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
            Vagas Disponíveis
          </header>
          <div class="panel-body">              
            <table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                  <th>ID </th>
                  <th>Título </th>
                  <th>Descrição</th>
                  <th>Empresa</th>                
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach($viewVar['vaga'] as $vaga) {
                  ?>
                  <tr>
                    <td><?php echo $vaga->getIdVaga(); ?></td>
                    <td><?php echo $vaga->getTitulo(); ?></td>
                    <td width="30%"><?php echo $vaga->getDescricao(); ?></td>
                    <td><?php echo $vaga->getEmpresa()->getNomeFantasia(); ?></td>
                    <td align="right">
                      <a href="http://<?php echo APP_HOST; ?>/vaga/edicao/<?php echo $vaga->getIdVaga(); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="http://<?php echo APP_HOST; ?>/vaga/exclusao/<?php echo $vaga->getIdVaga(); ?>" class="btn btn-danger"><i class="fa fa-trash-o "></i></a>
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
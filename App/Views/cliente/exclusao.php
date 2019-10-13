<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet">
        <div class="kt-portlet__head"></div>
        <div class="col-md-6">
            <h3>Excluir cliente</h3>
            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/cliente/excluir" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="codCliente" id="codCliente" value="<?php echo $viewVar['cliente']->getcodCliente(); ?>">

                <div class="panel panel-danger">
                    <div class="alert alert-warning" role="alert">
                    <h4><i class="flaticon-warning"></i> Deseja realmente excluir o cliente: <?php echo $viewVar['cliente']->getNomeCliente(); ?> ?</h4>
                    </div>
                    <div class="panel-footer"> 
                        <button type="submit" class="btn btn-danger btn-elevate btn-pill btn-elevate-air">Excluir</button>
                        <a href="http://<?php echo APP_HOST; ?>/cliente" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="kt-portlet__head"></div>
    </div>
</div>
</div>

<!--begin::Portlet-->
<div class="container">
    <br>
    <center>
        <h3>Alteracao de Marca</h3>
    </center>
    <?php if ($Sessao::retornaErro()) { ?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                <?php echo $mensagem; ?> <br>
            <?php } ?>
        </div>
    <?php } ?>
    <!--begin::Form-->

    <form action="http://<?php echo APP_HOST; ?>/marca/atualizar" method="post" id="form_cadastro">
        <input type="hidden" class="form-control" name="marcaCod" proCodigo="marcaCod" value="<?php echo $viewVar['marca']->getMarcaCod(); ?>">
        <input type="hidden" class="form-control" name="dataAlteracao" id="dataAlteracao" value="<?php echo $dataAtual; ?>" required>
        <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
        <input type="hidden" class="form-control" name="proUsuario" id="proUsuario" value="<?php echo $_SESSION['id']; ?>" required>
        
        <div class="kt-portlet__body">
            <div class="kt-portlet__body">                    
                <div class="form-group">
                    <label>Nome do Marca:</label>
                    <input type="text" class="form-control" placeholder="Digite Nome da Marca" id="marcaNome" name="marcaNome" value="<?php echo $viewVar['marca']->getMarcaNome(); ?>" required>
                    <span class="form-text text-muted">Digite o Nome da Marca</span>
                </div>
                </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-success btn-elevate btn-pill btn-elevate-air">Salvar</button>
                            <a href="http://<?php echo APP_HOST; ?>/marca" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    <!--end::Form-->
</div>

<!--end::Portlet-->

<!-- footer -->

</div>
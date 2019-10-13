<!--begin::Portlet-->
<div class="container">
    <br>
    <center>
        <h3>Alteracao de Estado</h3>
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

    <form action="http://<?php echo APP_HOST; ?>/estado/atualizar" method="post" id="form_cadastro">
        <input type="hidden" class="form-control" name="estId" proIdigo="estId" value="<?php echo $viewVar['estado']->getEstId(); ?>">
        <input type="hidden" class="form-control" name="dataAlteracao" id="dataAlteracao" value="<?php echo $dataAtual; ?>" required>
        <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
        <input type="hidden" class="form-control" name="estUsuario" id="estUsuario" value="<?php echo $_SESSION['id']; ?>" required>
        
        <div class="kt-portlet__body">
            <div class="kt-portlet__body">                    
                <div class="form-group">
                    <label>Nome do Marca:</label>
                    <input type="text" class="form-control" placeholder="Digite Nome da Estado" id="estNome" name="estNome" value="<?php echo $viewVar['estado']->getEstNome(); ?>" required>
                    <span class="form-text text-muted">Digite o Nome da Marca</span>
                </div>
            </div>
            <div class="kt-portlet__body">                    
                <div class="form-group">
                    <label>UF:</label>
                    <input type="text" class="form-control" placeholder="Digite a UF" id="estUf" name="estUf" value="<?php echo $viewVar['estado']->getEstUf(); ?>" required>
                    <span class="form-text text-muted">Digite a UF</span>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-success btn-elevate btn-pill btn-elevate-air">Salvar</button>
                            <a href="http://<?php echo APP_HOST; ?>/estado" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
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
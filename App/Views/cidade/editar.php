<!--begin::Portlet-->
<div class="container">
    <br>
    <center>
        <h3>Alteracao de Cidade</h3>
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

    <form action="http://<?php echo APP_HOST; ?>/cidade/atualizar" method="post" id="form_cadastro">        
        <input type="hidden" class="form-control" name="cidId" id="cidId" value="<?php echo $viewVar['cidade']->getCidId(); ?>">
        <input type="hidden" class="form-control" name="dataAlteracao" id="dataAlteracao" value="<?php echo $dataAtual; ?>" required>
        <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
        <input type="hidden" class="form-control" name="cidUsuario" id="cidUsuario" value="<?php echo $_SESSION['id']; ?>" required>
        
        <div class="kt-portlet__body">
            <div class="kt-portlet__body">                    
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control" placeholder="Digite a Cidade" id="cidNome" name="cidNome" value="<?php echo $viewVar['cidade']->getCidNome(); ?>" required>
                    <span class="form-text text-muted">Digite a Cidade</span>
                </div>
            </div>
            <div class="kt-portlet__body">                                    
                <div class="col-lg-3">
                    <div>    
                        <label>UF:</label>
                        <input type="text" name="estadoAutocomplete" id="estado-autocomplete" class="form-control" required placeholder="Estado - autocomplete"
                        value=<?php echo $viewVar['cidade']->getEstado()->getEstNome(); ?>>  
                        
                        <input type="hidden" id="estado" name="estado"
                        value=<?php echo $viewVar['cidade']->getEstado()->getEstId(); ?>>  
                        <span class="form-text text-muted">Digite a UF</span>
                      </div>
                    </div>  
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-success btn-elevate btn-pill btn-elevate-air">Salvar</button>
                            <a href="http://<?php echo APP_HOST; ?>/cidade" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
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
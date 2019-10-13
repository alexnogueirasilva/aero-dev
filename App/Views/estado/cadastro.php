<!--begin::Portlet-->
<div class="container">
    <br>
    <center>
        <h3>Cadastro de Estado</h3>
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
    
    <form class="kt-form kt-form--label-right" action="http://<?php echo APP_HOST; ?>/estado/salvar" method="post" id="form_cadastro" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
        <input type="hidden" class="form-control" name="estUsuario" id="estUsuario" value="<?php echo $_SESSION['id']; ?>" required>
        <div class="kt-portlet__body">
            <input type="hidden" class="form-control" name="dataCadastro" id="dataCadastro" value="<?php echo $dataAtual; ?>" required>
            <input type="hidden" class="form-control" name="dataAlteracao" id="dataAlteracao" value="<?php echo $dataAtual; ?>" required>                     
            <div class="col-lg-6">
                    <label>Nome da Estado:</label>
                    <input type="text" class="form-control" placeholder="Digite Nome do Estado" id="estNome" name="estNome" value="<?php echo $Sessao::retornaValorFormulario('estNome'); ?>" required>
                    <span class="form-text text-muted">Digite o Nome do Marca</span>
            </div>   
            <div class="form-group">
                    <label  class="col-lg-3 col-sm-3 control-label">teste</label>
                    <div class="col-lg-9">
                      <div>    
                        <input type="text" name="estadoAutocomplete" id="estado-autocomplete" class="form-control" required placeholder="Empresa - autocomplete"
                        >  

                        <input type="hidden" id="estado" name="estado"
                        value="">
                      </div>
                    </div>
                  </div>
            
            <div class="col-lg-2">                
                    <label>UF:</label>
                    <input type="text" class="form-control" placeholder="Digite a UF" id="estUf" name="estUf" value="<?php echo $Sessao::retornaValorFormulario('estUf'); ?>" required>
                    <span class="form-text text-muted">Digite a UF</span>
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
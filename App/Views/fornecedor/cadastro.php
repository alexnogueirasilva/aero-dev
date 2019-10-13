<!--begin::Portlet-->
<div class="container">
    <br>
    <center><h3>Cadastro de Fornecedor</h3></center>
    <?php if ($Sessao::retornaErro()) { ?>
    <div class="alert alert-warning" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
        <?php echo $mensagem; ?> <br>
        <?php } ?>
    </div>
    <?php } ?>
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" action="http://<?php echo APP_HOST; ?>/fornecedor/salvar" method="post" id="form_cadastro" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
        <div class="kt-portlet__body">
            <input type="hidden" class="form-control" name="dataCadastro" id="dataCadastro" value="<?php echo $dataAtual; ?>" required>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label for="razaoSocial">Razao do Social</label>
                    <input type="text" class="form-control" placeholder="Digite a Razao Social" id="forRazaoSocial" name="forRazaoSocial" value="<?php echo $Sessao::retornaValorFormulario('forRazaoSocial'); ?>" required>

                    <span class="form-text text-muted">Por favor insira a Razao Social</span>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Nome Fantasia:</label>
                        <input type="text" class="form-control" placeholder="Digite o Nome Fantasia" id="forNomeFantasia" name="forNomeFantasia" value="<?php echo $Sessao::retornaValorFormulario('forNomeFantasia'); ?>" required>
                        <span class="form-text text-muted">Por favor insira o Nome Fantasia</span>
                    </div>
                    <div class="col-lg-6">
                        <label class="">Numero do CNPJ:</label>
                        <input type="text" class="form-control" placeholder="Digite o numero do CNPJ" id="forCnpj" name="forCnpj" value="<?php echo $Sessao::retornaValorFormulario('forCnpj'); ?>" required>
                        <span class="form-text text-muted">Digite o numero do CNPJ</span>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-success btn-elevate btn-pill btn-elevate-air">Gravar</button>
                            <a href="http://<?php echo APP_HOST; ?>/fornecedor" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
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
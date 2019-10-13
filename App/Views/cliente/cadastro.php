<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Cliente</h3>

            <?php if ($Sessao::retornaErro()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/cliente/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nomeCliente">Nome</label>
                    <input type="text" class="form-control" name="nomeCliente" placeholder="Nome do cliente" value="<?php echo $Sessao::retornaValorFormulario('nomeCliente'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="nomeFantasiaCliente">nome Fantasia</label>
                    <input type="text" class="form-control" name="nomeFantasiaCliente" placeholder="Nome fantasia" value="<?php echo $Sessao::retornaValorFormulario('nomeFantasiaCliente'); ?>" required>
                </div>
                <div class="form-group">
                <label for="status">Status cliente</label>
                    <div class="input-group">                    
                        <select class="form-control" name="status" id="status" required="true">
                            <option value="">Selecione o Status do Cliente</option>
                            <option value="A">1 - Ativado</option>
                            <option value="D">2 - Desativado</option>
                        </select>
                        <span class="input-group-addon"></span>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="tipoCliente">Tipo cliente</label>
                        <div class="input-group">
                            <select class="form-control" name="tipoCliente" id="tipoCliente" required="true">
                                <option value="">Selecione o Tipo do Cliente</option>
                                <option value="Estadual">1 - Estadual</option>
                                <option value="Federal">2 - Federal</option>
                                <option value="Municipal">3 - Municipal</option>
                                <option value="Particular">4 - Particular</option>
                            </select>
                        </div>
                    </div>                    
                    <button type="submit" class="btn btn-success btn-elevate btn-pill btn-elevate-air">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/cliente" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Listar Cliente</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
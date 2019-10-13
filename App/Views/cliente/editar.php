<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Alteracao Cliente</h3>

            <?php if ($Sessao::retornaErro()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } else {
                 echo $mensagem;
            } ?>

            <form action="http://<?php echo APP_HOST; ?>/cliente/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="codCliente" id="codCliente" value="<?php echo $viewVar['cliente']->getCodCliente(); ?>">
                <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php  echo $_SESSION['idInstituicao']; ?>" required>
                <div class="form-group">
                    <label for="nomeCliente">Nome do cliente</label>
                    <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" placeholder="" value="<?php echo $viewVar['cliente']->getNomeCliente(); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nomeFantasiaCliente">Nome Fantasia</label>
                    <input type="text" class="form-control" name="nomeFantasiaCliente" id="nomeFantasiaCliente" placeholder="" value="<?php echo $viewVar['cliente']->getNomeFantasiaCliente(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="input-group">
                        <select class="form-control" name="status" id="status" value="<?php echo $viewVar['cliente']->getStatus(); ?>">
                            <option value="<?php echo $viewVar['cliente']->getStatus(); ?>"><?php echo $viewVar['cliente']->getStatus(); ?></option>
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
                        <select class="form-control" name="tipoCliente" id="tipoCliente" value="<?php echo $viewVar['cliente']->getTipoCliente(); ?>">
                            <option value="<?php echo $viewVar['cliente']->getTipoCliente(); ?>"><?php echo $viewVar['cliente']->getTipoCliente(); ?></option>
                            <option value="">Selecione o tipo do Cliente</option>
                            <option value="Estadual">1 - Estadual</option>
                            <option value="Federal">2 - Federal</option>
                            <option value="Municipal">3 - Municipal</option>
                            <option value="Particular">4 - Particular</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-elevate btn-pill btn-elevate-air">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/cliente" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
<!--begin::Portlet-->
<div class="container">
    <br>
    <h3>Alteracao de pedido</h3>
    <?php if ($Sessao::retornaErro()) { ?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                <?php echo $mensagem; ?> <br>
            <?php } ?>
        </div>
    <?php } ?>
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" action="http://<?php echo APP_HOST; ?>/pedido/atualizar" method="post" id="form_cadastro" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="codControle" id="codControle" value="<?php echo $viewVar['pedido']->getCodControle(); ?>">
        <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
        <div class="kt-portlet__body">
            <input type="text" class="form-control" name="dataCadastro" id="dataCadastro" readonly="readonly" value="<?php echo $dataAtual; ?>" required>
            <div class="kt-portlet__body">
                <div class="form-group"><label for="codCliente">Cliente</label>
                    <select class="form-control" name="codCliente" required>
                        <option value="">Selecione o cliente</option>
                        <?php foreach ($viewVar['listaClientes'] as $cliente) : ?>
                            <option value="<?php echo $cliente->getCodCliente(); ?>" <?php echo ($viewVar['pedido']->getCliente()->getCodCliente()  == $cliente->getCodCliente()) ? "selected" : ""; ?>>
                                <?php echo $cliente->getNomeCliente(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="form-text text-muted">Por favor insira o cliente do Pedido</span>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Numero da Licitacao:</label>
                        <input type="text" class="form-control" placeholder="Digite numero da licitacao" id="numeroPregao" name="numeroPregao" value="<?php echo $viewVar['pedido']->getNumeroLicitacao(); ?>" required>
                        <span class="form-text text-muted">Digite o numero da licitacao</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="">Numero do Pedido:</label>
                        <input type="text" class="form-control" placeholder="Digite o numero do pedido" id="numeroAf" name="numeroAf" value="<?php echo $viewVar['pedido']->getNumeroAf(); ?>" required>
                        <span class="form-text text-muted">Digite o numero do pedido</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="">Valor do pedido:</label>
                        <input type="text" class="form-control" placeholder="Digite o valor do pedido" id="valorPedido" name="valorPedido" value="<?php echo $viewVar['pedido']->getValorPedido(); ?>" required>
                        <span class="form-text text-muted">Digite o valor do pedido</span>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="form-group"><label for="codRepresentante">Representante</label>
                            <select class="form-control" name="codRepresentante" required>
                                <option value="">Selecione o Representante</option>
                                <?php foreach ($viewVar['listaRepresentantes'] as $representante) : ?>
                                    <option value="<?php echo $representante->getCodRepresentante(); ?>" <?php echo ($viewVar['pedido']->getRepresentante()->getCodRepresentante() == $representante->getCodRepresentante()) ? "selected" : ""; ?>>
                                        <?php echo $representante->getNomeRepresentante(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="form-text text-muted">Por favor insira o Representante do Pedido</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"><label for="codStatus">Status</label>
                            <select class="form-control" name="codStatus" required>
                                <option value="">Selecione o status</option>
                                <?php foreach ($viewVar['listaStatus'] as $status) : ?>
                                    <option value="<?php echo $status->getCodStatus(); ?>" <?php echo ($viewVar['pedido']->getStatus()->getCodStatus() == $status->getCodStatus()) ? "selected" : ""; ?>>
                                        <?php echo $status->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="form-text text-muted">Por favor insira o Status do Pedido</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="">Anexo:</label>
                        <input type="file" name="anexo" id="anexo" value="<?php echo  $viewVar['pedido']->getAnexo(); ?>">
                        <input type="text" class="form-control" placeholder="anexoteste" id="anexoteste"  readonly="readonly" name="anexoteste" value="<?php echo $viewVar['pedido']->getAnexo(); ?>">
                        <span class="form-text text-muted">Selecione o arquivo</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Observacao do Pedido:</label>
                    <textarea class="form-control" rows="3" placeholder="Digite Observacao do Pedido" id="observacao" name="observacao" ><?php echo $viewVar['pedido']->getObservacao(); ?></textarea>
                    <span class="form-text text-muted">Digite Observacao do Pedido</span>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-primary btn-elevate btn-pill btn-elevate-air">Enviar</button>
                            <a href="http://<?php echo APP_HOST; ?>/pedido" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
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
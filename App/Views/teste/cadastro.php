<!--begin::Portlet-->
<div class="container">
    <br>
    <h3>Cadastro de Pedido</h3>
    <?php if ($Sessao::retornaErro()) { ?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                <?php echo $mensagem; ?> <br>
            <?php } ?>
        </div>
    <?php } ?>
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" action="http://<?php echo APP_HOST; ?>/pedido/salvar" method="post" id="form_cadastro" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
        <div class="kt-portlet__body">
            <input type="text" class="form-control" name="dataCadastro" id="dataCadastro" value="<?php echo $dataAtual; ?>" required>
            <div class="kt-portlet__body">
            <div class="form-group">
                    <label  class="col-lg-3 col-sm-3 control-label">TESTANDO AUTO COMPLETE DO CLIENTE</label>
                    <div class="col-lg-9">
                      <div>                         
                        <input type="text" name="testeAutocomplete" id="teste-autocomplete" class="form-control" required placeholder="Cliente - autocomplete">
                      </div>
                    </div>
                  </div>
                  <table class="table table-striped">
                      <thead>
                        <th>Codigo</th>
                        <th>Tecnologia</th>
                        <th>Remover</th>
                      </thead>
                      <tbody id="editar-tabela-clientes"> 
                        <?php
                       if($viewVar['teste']->getClientes()) {
                         foreach ($viewVar['teste']->getClientes() as $tecnologia) {
                          ?>
                          <tr>
                            <td>
                              <?php echo $tecnologia->getClientes(); ?>
                              <input type="hidden" name="clientes[]" value=<?php echo $tecnologia->getCodCliente(); ?>>
                            </td>
                            <td><button class="btn btn-danger btn-sm" type="button" onClick="app.removeTecnologia(this,<?php echo $tecnologia->getCodCliente(); ?>)">remover</button></td>
                          </tr>
                          <?php                    
                        }
                        var_dump(" teste ".$tecnologia);
                      }
                      ?>                  
                    </tbody>
                  </table>

                <div class="form-group"><label for="codCliente">Cliente</label>
                    <select class="form-control" name="codCliente" required>
                        <option value="">Selecione o cliente</option>
                        <?php foreach ($viewVar['listaClientes'] as $cliente) : ?>
                            <option value="<?php echo $cliente->getCodCliente(); ?>" <?php echo ($Sessao::retornaValorFormulario('cliente') == $cliente->getCodCliente()) ? "selected" : ""; ?>>
                                <?php echo $cliente->getNomeCliente(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="form-text text-muted">Por favor insira o cliente do Pedido</span>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Numero da Licitacao:</label>
                        <input type="text" class="form-control" placeholder="Digite numero da licitacao" id="numeroPregao" name="numeroPregao" value="<?php echo $Sessao::retornaValorFormulario('numeroPregao'); ?>" required>
                        <span class="form-text text-muted">Digite o numero da licitacao</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="">Numero do Pedido:</label>
                        <input type="text" class="form-control" placeholder="Digite o numero do pedido" id="numeroAf" name="numeroAf" value="<?php echo $Sessao::retornaValorFormulario('numeroAf'); ?>" required>
                        <span class="form-text text-muted">Digite o numero do pedido</span>
                    </div>
                    <div class="col-lg-4">
                        <label class="">Valor do pedido:</label>
                        <input type="text" class="form-control" placeholder="Digite o valor do pedido" id="valorPedido" name="valorPedido" value="<?php echo $Sessao::retornaValorFormulario('valorPedido'); ?>" required>
                        <span class="form-text text-muted">Digite o valor do pedido</span>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="form-group"><label for="codRepresentante">Representante</label>
                            <select class="form-control" name="codRepresentante" required>
                                <option value="">Selecione o Representante</option>
                                <?php foreach ($viewVar['listaRepresentantes'] as $representante) : ?>
                                    <option value="<?php echo $representante->getCodRepresentante(); ?>" <?php echo ($Sessao::retornaValorFormulario('codRepresentante') == $representante->getCodRepresentante()) ? "selected" : ""; ?>>
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
                                    <option value="<?php echo $status->getCodStatus(); ?>" <?php echo ($Sessao::retornaValorFormulario('codStatus') == $status->getCodStatus()) ? "selected" : ""; ?>>
                                        <?php echo $status->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="form-text text-muted">Por favor insira o Status do Pedido</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="">Anexo:</label>
                        <input type="file" name="anexo" id="anexo" value="<?php echo $Sessao::retornaValorFormulario('anexo'); ?>">
                        <span class="form-text text-muted">Selecione o arquivo</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Observacao do Pedido:</label>
                    <textarea class="form-control" rows="3" placeholder="Digite Observacao do Pedido" id="observacao" name="observacao" value="<?php echo $Sessao::retornaValorFormulario('observacao'); ?>" required></textarea>
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
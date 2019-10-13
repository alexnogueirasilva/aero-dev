<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <?php if ($Sessao::retornaMensagem()) { ?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $Sessao::retornaMensagem(); ?>
        </div>
    <?php } ?>
    <div class="kt-portlet kt-portlet--mobile">
   
        <form class="kt-form kt-form--label-right" action="http://<?php echo APP_HOST; ?>/cliente/autoComplete" method="post" id="form_cadastro" enctype="multipart/form-data">
            <h3 class="kt-portlet__head-title">
                Pesquisa de pedidos registrados
            </h3>
            
            <div class="kt-portlet__body">
                    <div class="col-lg-4">
                        <label>Razao Social:</label>
                        <input type="text" class="form-control" title="Digite razao social" placeholder="Digite razao social" id="nomeCliente" name="nomeCliente" value="<?php echo $Sessao::retornaValorFormulario('nomeCliente'); ?>">
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary btn-elevate btn-pill btn-elevate-air">Pesquisar</button>
            </div>
        </form>
        
       <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                        
                    Pesquisa de coluna individual testando
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> Exportar
                            </button>                         
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Escolha uma opção</span>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-print"></i>
                                            <span class="kt-nav__link-text">Imprimir</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-copy"></i>
                                            <span class="kt-nav__link-text">copiar</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                            <span class="kt-nav__link-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                            <span class="kt-nav__link-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                            <span class="kt-nav__link-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        &nbsp;
                        <a href="http://<?php echo APP_HOST; ?>/cliente/cadastro" class="btn btn-brand btn-elevate btn-pill btn-elevate-air">
                            <i class="la la-plus"></i>Novo Cliente</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_3">
                <thead>
                    <tr>
                        <th colspan="3">Dados Cliente testando</th>
                        <th colspan="3">Dados do pedido testando</th>
                        <th colspan="3">Status testando</th>
                    </tr>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>Nome</th>
                        <th>TIPO</th>
                        <th>VALOR</th>
                        <th>AF</th>
                        <th>LICITACAO</th>
                        <th>STATUS</th>
                        <th>DATA</th>
                        <th>Acoes</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>Nome</th>
                        <th>TIPO</th>
                        <th>VALOR</th>
                        <th>AF</th>
                        <th>LICITACAO</th>
                        <th>STATUS</th>
                        <th>DATA</th>
                        <th>Acoes</th>
                    </tr>
                </tfoot>
                <tbody>			
                    <?php
                    $pedido1 = $viewVar['cliente'] ;
                    $andre = $pedido1 > 0;
                    $soma = 0;
                    if ($pedido1 > 0) {
                        foreach ($pedido1 as $cliente) {
                            ?>
                            <div class="form-group">
                    <label for="nomeFantasiaCliente">Nome Fantasia</label>
                    <input type="text" class="form-control" name="nome" id="nome"  placeholder="Nome Fantasia do cliente" 
                    value="<?php echo $cliente->getNomeFantasiaCliente(); ?>" required>
                </div>
                            <tr>
                            <td><?php echo $cliente->getCodCliente(); ?></td>
                            <td><?php echo $cliente->getNomeCliente(); ?></td>
                            <td><?php echo $cliente->getNomeFantasiaCliente(); ?></td>
                            <td><?php echo $cliente->getStatus(); ?></td>
                            <td><?php echo $cliente->getTipoCliente(); ?></td>
                            <td>
                                <span class="dropdown">
                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/cliente/edicao/<?php echo $cliente->getCodcliente(); ?>" title="Editar" class="btn btn-info btn-sm"><i class="la la-edit"></i> Editar</a>
                                        <a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/cliente/exclusao/<?php echo $cliente->getCodcliente(); ?>" title="Excluir" class="btn btn-info btn-sm"><i class="la la-edit"></i> Excluir</a>
                                        <a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/cliente/edicao/<?php echo $cliente->getCodcliente(); ?>" title="Status" class="btn btn-info btn-sm"><i class="la la-leaf"></i> Status</a>
                                        <a class="dropdown-item" href="http://<?php echo APP_HOST; ?>/cliente/edicao/<?php echo $cliente->getCodcliente(); ?>" title="Relatorios" class="btn btn-info btn-sm"><i class="la la-print"></i> Relatorio</a>
                                    </div>
                                </span>
                                <a href="http://<?php echo APP_HOST; ?>/cliente/edicao/<?php echo $cliente->getCodcliente(); ?>" title="Editar" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-edit"></i></a>
                            </td>
                            <?php
                            }
                        } else {

                            echo "<h3 class='kt-portlet__head-title'><p class='text-danger'>Sem Pedidos encontrados!</p></h3>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
    <?php
    echo "<h3 class='kt-portlet__head-title'><p class='text-info'>Qtde. de Pedidos " . $qtdePedido . " e Valor Total R$" . number_format($total, 2, ',', '.') . "</p></h3>";
    ?>
</div>
<!-- end:: Content -->
</div>
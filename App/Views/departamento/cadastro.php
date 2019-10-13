

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Departamento</h3>

            <?php if ($Sessao::retornaErro()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/departamento/salvar" method="post" id="form_cadastro">                
                <div class="form-group">
                    <label for="nome">Nome do Departamento</label>
                    <input type="hidden" class="form-control" name="inst_codigo" id="inst_codigo" value="<?php echo $instituicao; ?>">
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="Nome do departamento">
                </div>
   
                <button type="submit" class="btn btn-success btn-pill btn-elevate btn-elevate-air">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/departamento"  class="btn btn-brand btn-elevate btn-pill btn-elevate-air">Listar de Departamentos</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
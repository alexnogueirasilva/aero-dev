

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Slas</h3>

            <?php if ($Sessao::retornaErro()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/sla/salvar" method="post" id="form_cadastro">                
                <div class="form-group">
                    <label for="descricao">Descricao</label>
                    <input type="hidden" class="form-control" name="inst_codigo" id="inst_codigo" value="<?php echo $instituicao; ?>">
                    <input type="text"  class="form-control" name="descricao" id="descricao" placeholder="Descricao">
                </div>
                <div class="form-group">
                    <label for="tempo">Tempo</label>
                    <input type="text"  class="form-control" name="tempo" id="tempo" placeholder="Tempo">
                </div>
                <div class="form-group">
                    <label for="uniTempo">Uni Tempo</label>
                    <input type="text"  class="form-control" name="uniTempo" id="uniTempo" placeholder="Uni Tempo">
                </div>
   
                <button type="submit" class="btn btn-success btn-pill btn-elevate btn-elevate-air">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/sla"  class="btn btn-brand btn-elevate btn-pill btn-elevate-air">Listar Slas</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Alteracao Sla</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/sla/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['Sla']->getId(); ?>">
                <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php  echo $_SESSION['idInstituicao']; ?>" required>
                <div class="form-group">
                    <label for="descricao">Descricao</label>
                    <input type="text"  class="form-control" name="descricao" id="descricao" placeholder="" value="<?php echo $viewVar['Sla']->getDescricao(); ?>" required>
                </div>
                <div class="form-group">
                    <label for="tempo">Tempo</label>
                    <input type="text"  class="form-control" name="tempo" id="tempo" placeholder="" value="<?php echo $viewVar['Sla']->getTempo(); ?>" required>
                </div>
                <div class="form-group">
                    <label for="uniTempo">Uni Tempo</label>
                    <input type="text"  class="form-control" name="uniTempo" id="uniTempo" placeholder="" value="<?php echo $viewVar['Sla']->getUniTempo(); ?>" required>
                </div>

                <button type="submit" class="btn btn-success  btn-elevate btn-pill btn-elevate-air">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/sla" class="btn btn-info  btn-elevate btn-pill btn-elevate-air">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>

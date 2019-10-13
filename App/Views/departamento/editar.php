<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Alteracao Departamento</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/departamento/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['departamento']->getId(); ?>">
                <input type="hidden" class="form-control" name="inst_codigo" id="inst_codigo" value="<?php  echo $_SESSION['idInstituicao']; ?>" required>
                
                <div class="form-group">
                    <label for="nomeFantasia">Nome Fantasia</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['departamento']->getNome(); ?>" required>
                </div>

                <button type="submit" class="btn btn-success  btn-elevate btn-pill btn-elevate-air">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/departamento" class="btn btn-info  btn-elevate btn-pill btn-elevate-air">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>

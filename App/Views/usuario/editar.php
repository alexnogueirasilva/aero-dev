<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Usuario</h3>

            <?php if ($Sessao::retornaErro()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>
            <form action="http://<?php echo APP_HOST; ?>/usuario/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['usuario']->getId(); ?>">
                <input type="hidden" class="form-control" name="fk_instituicao" id="fk_instituicao" value="<?php echo $_SESSION['idInstituicao']; ?>" required>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do usuario" value="<?php echo $viewVar['usuario']->getNome(); ?>" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="id_dep">Departamento</label>
                        <select class="form-control" name="id_dep" required>
                            <option value="">Selecione a Departamento</option>
                            <?php foreach ($viewVar['listaDepartamentos'] as $departamento) : ?>
                                <option value="<?php echo $departamento->getId(); ?>" <?php echo ($viewVar['usuario']->getDepartamento()->getId() == $departamento->getId()) ? "selected" : ""; ?>>
                                    <?php echo $departamento->getNome(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $viewVar['usuario']->getEmail(); ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="dica">Dica</label>
                        <input type="text" class="form-control" name="dica" id="dica" placeholder="Dida de senha" value="<?php echo $viewVar['usuario']->getDica(); ?>" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="nivel">Nivel do Usuario</label>
                        <div class="input-group">
                            <select class="form-control" name="nivel" id="nivel">
                                <option value="">Selecione o nivel</option>
                                <option value="<?php echo $viewVar['usuario']->getNivel(); ?>" <?php echo ($viewVar['usuario']->getNivel() == $viewVar['usuario']->getNivel()) ? "selected" : ""; ?>>
                                    <?php echo $viewVar['usuario']->getNivel(); ?> </option>
                                <option value="1">1 - Administrador</option>
                                <option value="2">2 - Usuario</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label for="status">Status do Usuario</label>
                        <div class="input-group">
                            <select class="form-control" name="status" id="status">
                                <option value="">Selecione o Status</option>
                                <option value="<?php echo $viewVar['usuario']->getStatus(); ?>" <?php echo ($viewVar['usuario']->getStatus() == $viewVar['usuario']->getStatus()) ? "selected" : ""; ?>>
                                    <?php echo $viewVar['usuario']->getStatus(); ?> </option>
                                <option value="A">1 - Ativo</option>
                                <option value="D">2 - Desativado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-elevate btn-pill btn-elevate-air">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/usuario" class="btn btn-info btn-elevate btn-pill btn-elevate-air">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
</div>
		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(http://<?php echo APP_HOST; ?>/public/assets/media/bg/bg-2.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img src="http://<?php echo APP_HOST; ?>/public/assets/media/logos/devaction-logo-login.png">
								</a>
							</div>
							<?php if ($Sessao::retornaErro()) { ?>
								<div class="alert alert-warning" role="alert">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
										<?php echo $mensagem; ?> <br>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Entrar no sistema</h3>
								</div>
								<form class="kt-form" action="http://<?php echo APP_HOST; ?>/login/autenticar" method="post" id="form_cadastro">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<div class="row kt-login__extra">
										<div class="col">
											<label class="kt-checkbox">
												<input type="checkbox" name="remember"> Lembre-me
												<span></span>
											</label>
										</div>
										<div class="col kt-align-right">
											<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Esqueceu a senha ?</a>
										</div>
									</div>
									<div class="kt-login__actions">
										<button type="submit" class="btn btn-brand btn-pill kt-login__btn-primary">Entrar</button>
									</div>
								</form>
							</div>
							<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Cadastrar</h3>
									<div class="kt-login__desc">Digite seus dados para criar sua conta:</div>
								</div>
								<form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Nome Completo" name="fullname" value="<?php echo $Sessao::retornaValorFormulario('fullname'); ?>" required>
									</div>
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Confirme Password" name="rpassword">
									</div>
									<div class="row kt-login__extra">
										<div class="col kt-align-left">
											<label class="kt-checkbox">
												<input type="checkbox" name="agree">Eu concordo com o <a href="#" class="kt-link kt-login__link kt-font-bold">termos e condições</a>.
												<span></span>
											</label>
											<span class="form-text text-muted"></span>
										</div>
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_signup_submit" class="btn btn-brand btn-pill kt-login__btn-primary">inscrever-se</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancela</button>
									</div>
								</form>
							</div>
							<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Esqueceu a senha ?</h3>
									<div class="kt-login__desc">Insira seu e-mail para redefinir sua senha:</div>
								</div>
								<form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Pedido</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancela</button>
									</div>
								</form>
							</div>
							<div class="kt-login__account">
								<span class="kt-login__account-msg">
									Não tem uma conta ainda ?
								</span>
								&nbsp;&nbsp;
								<a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Cadastre-se!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
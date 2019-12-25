<!DOCTYPE html>
<html>
<head> 
	<title>Регистрация</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700%7COpen+Sans+Condensed:700&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	<script src="/assets/js/init.js"></script>
	<script src="/assets/js/head.js"></script>
	<script type="text/javascript" src="/assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="/assets/js/cursach.js"></script>
</head>
<body>
    <div class="page-wrapper">
		<div class="sitetoolbar">
			<?php include ("structure/menu.php");?>
		</div>
		<div class="page page_inner_padding">
			<div class="page__inner">
				<main class="main main_width-limit">
					<header class="main__header">
						<div class="main__header-inner">
							<h1 class=\"main__header-title\">Регистрация</h1>
						</div>
					</header>
					<div class=\"content\">
						<div class="lessons-list">
							<?php
								$data = $_POST;
								if ( isset($data['do_signup']) ) {
								// проверка формы на пустоту полей
									$errors = array();
									if ( trim($data['login']) == '' )
										$errors[] = 'Введите логин';
									if ( $data['password'] == '' )
										$errors[] = 'Введите пароль';
									if ( $data['password_2'] != $data['password'] )
										$errors[] = 'Повторный пароль введен не верно!';
									if ( $data['name'] == '' )
										$errors[] = 'Введите своё ФИО';
									//проверка на существование одинакового логина
									if ( R::count('users', "login = ?", array($data['login'])) > 0)
										$errors[] = 'Пользователь с таким логином уже существует!';
									if ( empty($errors) )
									{
										//ошибок нет, теперь регистрируем
										$user = R::dispense('users');
										$user->name = $data['name'];
										$user->login = $data['login'];
										$user->password = $data['password'];
										R::store($user);
										echo '<div class="login-form__success">Вы успешно зарегистрированы!</div>';
									}
									else
										echo '<div class="login-form__warning">' .array_shift($errors). '</div>';
								}
							?>
							<form class="login-form__form" action="signup.php" method="POST">
								<div class="login-form__line login-form__header">
									<div class="login-form__header-aside">
										<a class="login-form__button-link login-form__register" href="login.php">Вход</a>
									</div>
									<div class="login-form__header-delimiter">/</div>
									<h4 class="login-form__title">Регистрация</h4>
								</div>
								<div class="login-form__body">
									<div class="login-form__line login-form__row login-form__row-wrap">
										<div class="login-form__form-control">
											<label class="login-form__label">Логин:</label>
											<span class="text-input login-form__input">
												<input class="text-input__control" type="text" name="login" value="<?php echo @$data['login']; ?>" maxlength="50" tabindex="1">
											</span>
										</div>
										<div class="login-form__form-control">
											<label class="login-form__label">Пароль:</label>
											<span class="text-input text-input_with-aside login-form__input">
												<input class="text-input__control" type="password" name="password" value="<?php echo @$data['password']; ?>" maxlength="30" tabindex="2">
											</span>
										</div>
										<div class="login-form__form-control">
											<label class="login-form__label">Повторите пароль:</label>
											<span class="text-input text-input_with-aside login-form__input">
												<input class="text-input__control" type="password" name="password_2" value="<?php echo @$data['password_2']; ?>" maxlength="30" tabindex="3">
											</span>
										</div>
										<div class="login-form__form-control">
											<label class="login-form__label">Псевдоним:</label>
											<span class="text-input text-input_with-aside login-form__input">
												<input class="text-input__control" type="text" name="name" value="<?php echo @$data['name']; ?>" maxlength="30" tabindex="4">
											</span>
										</div>
										<div class="login-form__form-control login-form__submit">
											<button class="button button_action" type="submit" name="do_signup" tabindex="6">
												<span class="button__text">Регистрация</span>
											</button>
										</div>
									</div>
									<div class="login-form__line login-form__social-logins">
										<span>Войдите или зарегистрируйтесь в системе. Если у вас возникли проблемы, обратитесь к администратору</a>.</span>
									</div>
								</div>
							</form>
						</div>
					</div>
				</main>
			</div>
		</div>
	</div>
</body>
</html>

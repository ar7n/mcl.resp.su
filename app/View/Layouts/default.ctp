<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<header>
		<div class="menu">
			<div class="container">
				<nav class="menu-bar clearfix">
					<div class="logo-bar">
						<a href="/"><span class="icon-resp"></span>RESP.SU</a>
					</div>
					<div class="city-bar">
						<a href="/"><span class="icon-mcl"></span>Москва</a>
						<a href="/"><span class="icon-scl"></span>Санкт-Петербург</a>
						<a href="/"><span class="icon-ecl"></span>Екатеринбург</a>
					</div>
					<div class="auth-bar">
						<a href="/"><span class="icon-key"></span>Вход</a>
						<a href="/">Регистрация</a>
					</div>
				</nav>
			</div>
		</div>
		<div class="intro">
			<div class="container">
				<div class="inner">
					<a class="logo" href="/"></a>
				</div>
			</div>
		</div>
		<nav class="second-menu container clearfix">
			<ul>
				<li><a href="/">Новости</a></li>
				<li><a href="/">Таблица сезона</a></li>
				<li><a href="/">Участники</a></li>
				<li><a href="/">Регламент</a></li>
				<li><a href="/">Партнеры</a></li>
			</ul>
		</nav>
	</header>

	<div class="middle">
		<div class="container clearfix">
			<div id="content">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>

			</div>
			<aside class="right">
				Организаторы
			</aside>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="inner">
				<div class="created-by">
					Создание дизайна - <a href="http://bbbro.ru">BBBro</a>
				</div>
				<div class="links">
					<div class="col">
						<a href="/">Новости</a>
						<a href="/">Таблица сезона</a>
						<a href="/">Участники</a>
					</div>
					<div class="col">
						<a href="/">Регламент</a>
						<a href="/">Партнеры</a>
					</div>
				</div>
				<div class="copyrights">
					© 2011 - 2015<br/>
					Московская киберспортивная лига<br/>
					<a href="http://resp.su">Resp.su</a>. Все права защищены
				</div>
				<div class="footer-logo"></div>
			</div>
		</div>
	</footer>

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Московская киберспортивная лига</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('jquery-ui.min.css');
		echo $this->Html->css('social-likes_classic.css');
		echo $this->Html->css('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<? if (isset($AuthUser) && $AuthUser['role'] == 'admin'){ ?>
		<div class="admin-bar"><a href="/admin">Панель администрирования</a></div>
	<? } ?>
	<div class="wrap">
		<header>
			<div class="menu">
				<div class="container">
					<nav class="menu-bar clearfix">
						<div class="logo-bar">
							<a href="/"><span class="icon-resp"></span>RESP.SU</a>
						</div>
						<div class="city-bar">
							<?= $this->Html->link('<span class="icon-mcl"></span>Москва', array('msc'), array('escape' => false)); ?>
							<?= $this->Html->link('<span class="icon-scl"></span>Санкт-Петербург', array('spb'), array('escape' => false));?>
							<?= $this->Html->link('<span class="icon-ecl"></span>Екатеринбург', array('ekb'), array('escape' => false));?>
	<!--						<a href=""><span class="icon-mcl"></span>Москва</a>-->
	<!--						<a href="/"><span class="icon-scl"></span>Санкт-Петербург</a>-->
	<!--						<a href="/"><span class="icon-ecl"></span>Екатеринбург</a>-->
						</div>
						<div class="auth-bar">
							<? if (empty($AuthUser)){ ?>
								<a href="/login"><span class="icon-key"></span>Вход</a>
								<a href="/registration">Регистрация</a>
							<? } else { ?>
								<a href="/logout"></span>Выход</a>
							<? } ?>
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
					<?
					$menuItems = array(
						'Новости' => '/',
						'Таблица сезона' => '/',
						'Участники' => '/teams',
						'Регламент' => '/rules',
						'Партнеры' => '/partners',
					);
					foreach ($menuItems as $title => $url){
						if (isset($currentMenuItem) && $currentMenuItem == $title) {
							echo '<li class="active"><a href="' . $url . '">' . $title . '</a></li>';
						}
						else {
							echo '<li><a href="' . $url . '">' . $title . '</a></li>';
						}
					}
					?>
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
					<div class="title">Организаторы</div>
					<a href="/"><img src="/img/mmmc-logo.png"/></a>
					<div class="title">Информационные партнеры</div>
					<a href="/"><img src="/img/gamer-logo.png"/></a>
					<a href="/"><img src="/img/gg-logo.png"/></a>
					<div class="title">Технические партнеры</div>
					<a href="/"><img src="/img/goharu-logo.png"/></a>
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
	</div>
	<?php echo $this->element('sql_dump'); ?>

	<? echo $this->Html->script('jquery-1.11.2.min'); ?>
	<? echo $this->Html->script('jquery-ui.min'); ?>
	<? echo $this->Html->script('social-likes.min'); ?>
	<? echo $this->Html->script('scripts'); ?>

</body>
</html>

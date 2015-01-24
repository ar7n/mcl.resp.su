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
	<? if (isset($AuthUser['role']) && $AuthUser['role'] == 'admin'){ ?>
		<div class="admin-bar"><a href="/admin">Панель администрирования</a></div>
	<? } ?>
	<div class="wrap">
		<header>
			<div class="menu">
				<div class="container">
					<nav class="menu-bar clearfix">
						<div class="logo-bar">
							<a href="http://resp.su"><span class="icon-resp"></span>RESP.SU</a>
						</div>
						<div class="city-bar">
							<?= $this->Html->link('<span class="icon-mcl"></span>Москва', array('msc'), array('escape' => false)); ?>
<!--							--><?//= $this->Html->link('<span class="icon-scl"></span>Санкт-Петербург', array('spb'), array('escape' => false));?>
<!--							--><?//= $this->Html->link('<span class="icon-ecl"></span>Екатеринбург', array('ekb'), array('escape' => false));?>
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
						<a class="rsss-logo" target="_blank" href="http://mrsss.ru/"></a>
					</div>
				</div>
			</div>
			<nav class="second-menu container-nospace clearfix">
				<ul class="sections">
					<?
					$menuItems = array(
						'Новости' => array('/', true),
						'Таблица сезона' => array('/', TABLE_ENABLED),
						'Участники' => array('/teams', TEAMS_ENABLED),
						'Регламент' => array('/rules', true),
						'Партнеры' => array('/partners', true),
					);
					echo $this->element('MenuList', compact('menuItems'));
					?>
				</ul>
				<div class="archive-menu">
					<a class="active archive-item" href="/">Архив</a>
					<ul style="display: none;">
						<li>
							<a class="archive-item" href="http://resp.su/events/view/691">Четрветрый сезон</a>
						</li>
						<li>
							<a class="archive-item" href="http://resp.su/events/view/471">Третий сезон</a>
						</li>
						<li >
							<a class="archive-item" href="http://resp.su/events/view/278">Второй сезон </a>
						</li>
					</ul>
				</div>
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
					<a href="#"><img src="/img/fcsm-logo.png"/></a>
					<a href="http://mrsss.ru" rel="nofollow" target="_blank"><img src="/img/mrsss-logo.png"/></a>
					<div class="title">При поддержке</div>
					<a href="http://sport.mos.ru" rel="nofollow" target="_blank"><img src="/img/dep-logo.png"/></a>
					<div class="title">Комьюнити</div>
					<a href="http://vk.com/mclresf" rel="nofollow" target="_blank"><img src="/img/vk-logo.jpg"/></a>
					<a href="http://youtube.com/mclresf" rel="nofollow" target="_blank"><img src="/img/yt-logo.jpg"/></a>
					<a href="http://facebook.com/mclresf" rel="nofollow" target="_blank"><img src="/img/fb-logo.jpg"/></a>
					<div class="title">Информационные партнеры</div>
					<a href="http://virtus.pro" rel="nofollow" target="_blank"><img src="/img/vpro-logo.png"/></a>
					<a href="http://GoodGame.ru" rel="nofollow" target="_blank"><img src="/img/gg-logo.png"/></a>
					<a href="http://gamer.ru" rel="nofollow" target="_blank"><img src="/img/gamer-logo.png"/></a>
					<a href="http://cyber-game.tv" rel="nofollow" target="_blank"><img src="/img/cg-logo.png"/></a>
					<a href="http://team-empire.org" rel="nofollow" target="_blank"><img src="/img/te-logo.png"/></a>
					<a href="http://tort.fm" rel="nofollow" target="_blank"><img src="/img/tfm-logo.png"/></a>
					<a href="http://mmocult.ru" rel="nofollow" target="_blank"><img src="/img/mmoc-logo.png"/></a>
					<a href="http://game-links.ru" rel="nofollow" target="_blank"><img src="/img/gl-logo.png"/></a>
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
						<ul class="col">
							<?= $this->element('MenuList', array('menuItems' => array_slice($menuItems, 0 , 3)));?>
						</ul>
						<ul class="col">
							<?= $this->element('MenuList',  array('menuItems' => array_slice($menuItems, 3 , 2)));?>
						</ul>
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

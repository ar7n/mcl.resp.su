<?
$divisions = array();
for ($i=0; $i<8; $i++) {
	$divisions[chr(ord('A') + $i)] = array();
}
foreach ($universities as $university){
	$divisions[$university['University']['division']][] = $university;
}
?>

<div class="universities index">
	<div id="tabs">
		<ul class="main-tabs">
			<li><span class="title main-title">Дивизионы</span></li>
			<? foreach ($divisions as $divisionName => $division){ ?>
				<li><a href="#tabs-<?= $divisionName; ?>"><?= $divisionName; ?></a></li>
			<? } ?>
		</ul>

		<? foreach ($divisions as $divisionName => $division){ ?>
			<div id="tabs-<?= $divisionName; ?>">
				<? if (empty($division)): ?>
					<br/>
					<p>Участники будут объявлены позднее</p>
				<? else: ?>
					<? foreach ($division as $university){ ?>
						<div class="university">
							<div class="university-logo">
								<img src="/files/<?= $university['University']['logo']; ?>"/>
							</div>
							<div class="university-info">
								<div class="heading"><?= $university['University']['title']; ?></div>
								<div class="title">Менеджеры</div>
								<div class="university-managers"><p><?= $university['University']['managers']; ?></p></div>
							</div>
							<div class="university-tabs">
								<ul>
									<li><span class="title">Составы</span></li>
									<li><a href="#university-tabs-a">DOTA 2</a></li>
									<li><a href="#university-tabs-b">CS:GO</a></li>
									<li><a href="#university-tabs-c">FIFA 14</a></li>
								</ul>
								<div id="university-tabs-a"><p><?= $university['University']['team_dota2']; ?></p></div>
								<div id="university-tabs-b"><p><?= $university['University']['team_csgo']; ?></p></div>
								<div id="university-tabs-c"><p><?= $university['University']['team_fifa14']; ?></p></div>
							</div>
						</div>
					<? } ?>
				<? endif ?>
			</div>
		<? } ?>
	</div>

<? echo $this->element('SocialLikes'); ?>
</div>
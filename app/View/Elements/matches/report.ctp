<?php
/**
 * Вывод отчётов, введённых участниками матча, или судьями
 */
?>
<div class="MatchReport">
<?php
if (isset($Match['Slot'])){
	$Slot = $Match['Slot'];
}
if (isset($Match['Party'])){
	$Party = $Match['Party'];
}
if (isset($MatchReport['User'])){
	$User = $MatchReport['User'];
}

$reportParty = Set::extract('/Party[user_id='.$User['id'].']', compact('Party'));
if ($reportParty){
	echo '<p style="float: left">'.$MatchReport['created'].' введённо участником&nbsp;</p>';
	echo $this->element('parties/item', array('item' => $reportParty[0]['Party']));
}
else {
	echo '<p style="float: left">'.$MatchReport['created'].' введённо судьёй&nbsp;</p>';
	echo $this->element('users/nick', $User);
}

$Slot = Set::sort($Slot, '{n}.position', 'asc');	
echo $this->element('matches/scores', array_merge($Match, $MatchReport['statistics'], compact('Party', 'Slot')));
?>
</div>
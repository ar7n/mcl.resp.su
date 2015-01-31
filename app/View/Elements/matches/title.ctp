<?php
$firstParty = 'ожидается';
if ($Slot[0]['free']){
	$firstParty = 'пусто';
}
if ($Slot[0]['party_id']){
	$firstParty = $Slot[0]['Party']['name'];
}
$secondParty = 'ожидается';
if ($Slot[1]['free']){
	$secondParty = 'пусто';
}
if ($Slot[1]['party_id']){
	$secondParty = $Slot[1]['Party']['name'];
}
echo $firstParty.' vs '.$secondParty.' - '.$Tournament['title'];
?>

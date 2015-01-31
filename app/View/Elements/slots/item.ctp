<?php


$Party=false;
if(isset($item['Party'])){
    $Party=$item['Party'];
    unset($item['Party']);
}

$Slot=$item;
$item=$Party;
$item['Slot']=$Slot;


echo $this->element('parties/item',compact('item','itemOptions'));

?>

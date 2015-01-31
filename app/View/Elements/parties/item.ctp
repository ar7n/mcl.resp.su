<?php
$itemDefaultOptions = array(	
	'show_score' => FALSE,
	'class' => '',
);
if (isset($itemOptions)){
	$itemOptions = array_merge($itemDefaultOptions, $itemOptions);
}
else {
	$itemOptions = $itemDefaultOptions;
}
extract($itemOptions);

if(isset($item['Slot']) && $item['Slot']['disqualified']==1){
    $class.=' disqualified';
}


if ($class){
	$class = 'PartyItem '.$class;
}
else {
	$class = 'PartyItem';
}

$data_id='';
if(isset($item) && isset($item['id'])){
    $data_id=" data-party-id='{$item['id']}'";
}
?>

<div class='<?=$class?>'<?=$data_id?>> 
<?if(isset($place))
	echo $this->Html->div('place',$place);

if(!isset($geo_country_id)){
    $geo_country_id=0;
}

if($geo_country_id==0 && isset($item['id'])){
	 $geo_country_id=$item['geo_country_id'];
}

if(!$geo_country_id && isset($item['user_id'])){
    $leader_user_id=$item['user_id'];

    if($leader_user_id){
        $User=new User();
        $leader=$User->find('first',array(
            'conditions'=>array(
                'User.id'=>$leader_user_id
            ),
            'fields'=>array('geo_country_id','id'),
            'contain'=>false)
        );
        $geo_country_id=$leader['User']['geo_country_id'];
    }
}

//if ($geo_country_id){
//	$flag = getCountryFlag($geo_country_id);
//}
//else
//{
//	$flag = NULL;
//}


//debug($item['Slot']);
$type='party';

if (isset($Tournament) && $Tournament['max_party_size'] == 1){
	$type = 'user';
}

if(isset($item['Slot'])){
    if($item['Slot']['free']==1){
        $type='free';
    }
    elseif($item['Slot']['party_id']==false){
        $type='wait';
    }
}

if($type=='party' && !isset($item['id'])){
    $type='wait';
}

if ($type == 'party'){
	if (empty($item['name'])){
		$text = 'Команда '.$item['id'];
	}
	else {
		$text = $item['name'];
	}
    
    $link='/parties/view/'.$item['id'];
    
    if(isset($link_to_match) && $link_to_match){
        $link='/matches/view/'.$item['Slot']['match_id'];    
    }
    
	if (isset($item['Clan']['clan_tag']) && $item['Clan']['clan_tag']){
		$text = '<span class="clanTag">'.$item['Clan']['clan_tag'].'</span>¬'.$text;
	}
	else if (isset($item['University']['clan_tag']) && $item['University']['clan_tag']){
		$text = '<span class="clanTag">'.$item['University']['clan_tag'].'</span>¬'.$text;
	}

	$logo = '';
	if (isset($item['Hub']['LogoFile']['small_path']) && $item['Hub']['LogoFile']['small_path']){
		$logo = '<img class="logo" src="http://resp.su'.$item['Hub']['LogoFile']['small_path'].'"  width="18" height="18"/>';
	}
	echo $logo.'<span class="party-name">'.$text.'</span>';
//			$text,
//			$link,
//			array('escape' => false,'title'=>$item['name'],'class'=>'party-name')
//		);
	if (isset($item['users_party_count']) && $item['users_party_count'] > 1){
		//echo "&nbsp;(".$item['users_party_count'].")";
	}		
}
elseif($type=='user'){
	echo $this->element('users/nick', $item['User']);
}
elseif($type=='wait'){
	echo "<span>ожидается</span>";
}
elseif($type=='free'){
	echo "<span>пусто</span>";
}

$show_score=$show_score && ($type=='party' || $type=='user');

if ($show_score){
	$scores = $this->Arena->beautifyScores($item['Slot']['scores']);
	echo "<span class='score'>$scores</span>";
}

if (!empty($itemActions)){
	echo $this->element('item_actions', compact('itemActions'));
}
?>
<div style="clear:both"></div>
</div>

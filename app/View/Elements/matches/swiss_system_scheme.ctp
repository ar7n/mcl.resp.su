<?php

foreach($Party as $i=>$party){
	if(!$party['approved']){
		unset($Party[$i]);
	}

}

//if (in_array(NULL, Set::extract('/group', $Party))){
//	echo "<p>Сетка будет доступна после жеребьёвки</p>";
//	return;
//}

//записываем матчи в многомерный массив
//group, P1, P2
$list_matches=array();
foreach($Match as $match){
    $p1=0;
    if(isset($match['Party'][0]['id']))
        $p1=$match['Party'][0]['id'];
    
    $p2=0;
    if(isset($match['Party'][1]['id']))
        $p2=$match['Party'][1]['id'];
    
    if($p1 && $p2){
    
        $list_matches[]=$match;
   
   
    }
}

//загружаем очки и места
App::import('Model','Tournament');
$TournamentModel=new Tournament;
$scores=$TournamentModel->getResults($Tournament['id']);  

//вывод сеток

$num_parties=count($Party);	
//инициализация таблицы
$cells=array();
$tmp_row = array_fill(0, $num_parties+3,'&nbsp;');
$cells= array_fill(0, $num_parties+1, $tmp_row);

//first row, first col, diagonal
$cells[0][0]=array('Номер', '');
$cells[0][1]=array('Игрок', '');
$k=0;
$parties_coord=array();
foreach($Party as $party){
	$k++;
	$class='';
	$party_link=$this->element('parties/item',array('item'=>$party,'class'=>$class));

	//заполняем верхную строку, левый столбец и диагональ
	$cells[0][$k+1]=array($k,array('class'=>'top_party'));
	$cells[$k][0]=array($k,array('class'=>'top_party'));
	$cells[$k][1]=array($party_link,array('class'=>'left_party'));
	$cells[$k][$k+1]=array('&nbsp;',array('class'=>'diagonal'));

	$parties_coord[$party['id']]=$k;
}

//верхняя строка
$cells[0][$num_parties+2]=array('Очки',array('class'=>'score_col'));
$cells[0][$num_parties+3]=array('Места',array('class'=>'score_col','title'=>'Места участников'));
//$cells[0][$num_parties+3]=array('Места 2',array('class'=>'score_col','title'=>'Конечные места'));

foreach($list_matches as $match){
	$party1_id=$match['Party'][0]['id'];
	$party2_id=$match['Party'][1]['id'];

	$coor1=$parties_coord[$party1_id];
	$coor2=$parties_coord[$party2_id];

	$item=$match;
	unset($item['Party']);

	$match_score_up=$this->element('matches/item',array(
		'item'=>$item,
		'Party'=>$match['Party'],
		'type'=>'score',
		'subtype'=>'up'
	));

	$match_score_down=$this->element('matches/item',array(
		'item'=>$item,
		'Party'=>$match['Party'],
		'type'=>'score',
		'subtype'=>'down'
	));

	//верхняя половина матрицы
	$cells[$coor1][$coor2+1]=array($match_score_up,array('class'=>'score'));

	//нижняя половина
	$cells[$coor2][$coor1+1]=array($match_score_down,array('class'=>'score'));
}

//scores & places
$places=$TournamentModel->getPlacesNum($scores['places']['main']);

foreach($parties_coord as $party_id=>$y){
	$cells[$y][$num_parties+2]=$scores['scores']['main'][$party_id];
	$cells[$y][$num_parties+3]=$places[$party_id];
}

//debug($cells);
$cells=$this->Html->tableCells($cells);

echo $this->Html->tag('table',$cells);
    
?>
<script>
    
    
    //автоматическое задание ширины для центральных колонок
    /*$(document).ready(function(){
        all_width=0;
        parties=$(".MatchScheme .round-robin .top_party").length;
        
        $(".MatchScheme .round-robin .top_party").each(function(){
            all_width+=$(this).width();
        });
        
        $(".MatchScheme .round-robin .top_party").width(all_width/parties);
        
        
    });*/
    
    
</script>

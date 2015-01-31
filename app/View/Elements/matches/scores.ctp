<?php
/**
 * @package    MatchElements
 * @subpackage MatchElements.scores
 * 
 * @param array $allow_games
 * @param array $Slot
 * @param array $Party
 * @param array $Game
 */
if (!isset($allow_games, $Slot, $Party, $Game)){
	
}
?>
<table>
<?php
$partyById = Set::combine($Party, '{n}.id', '{n}');
$slotDisqualified = Set::combine($Slot, '{n}.id', '{n}.disqualified');
$slotWinner = Set::combine($Slot, '{n}.id', '{n}.winner');

/**
 * Вывод заголовка таблицы 
 * [ Гейм #1 ][ Гейм #2 ][ Гейм #3 ][ ... ]
 */
if ($allow_games){
	if (!empty($Game)){
		echo '<tr>';
		echo '<th></th>';
		foreach ($Game as $gameNum => $game){
			$game['num'] = $gameNum;
			$gameItem = $this->element('games/item', array('item' => $game));	
			echo "<th>$gameItem</th>";	
		}
		echo '</tr>';
	}
}

/**
 * Генерация тела таблицы 
 */
$tableCells = array();
$tableClasses = array();
foreach ($Slot as $slotNum => $slot){
	$party = NULL;
	if (!empty($partyById[$slot['party_id']])){
		$party = $partyById[$slot['party_id']];
	}
	$tableCells[$slotNum][0] = $this->element('parties/item', array('item' => $party));
	if ($slotDisqualified[$slot['id']]){
		$tableClasses[$slotNum][0] = 'disqualified';
	}	
	else if($slotWinner[$slot['id']]){
		$tableClasses[$slotNum][0] = 'winner';
	}
}
if ($allow_games){
	foreach ($Game as $gameNum => $game){
		if (!isset($game['Slot'])){
			$game = array_merge($game, unserialize($game['statistics']));
		}
		foreach ($game['Slot'] as $slotNum => $slot){						
			$tableCells[$slotNum][$gameNum + 1] = $slot['scores'];		
			if ($slotDisqualified[$slot['id']]){
				$tableClasses[$slotNum][$gameNum + 1] = 'disqualified';
			}	
			else if($slotWinner[$slot['id']]){
				$tableClasses[$slotNum][$gameNum + 1] = 'winner';
			}
		}
	}
}
else {
	foreach ($Slot as $slotNum => $slot){
		$tableCells[$slotNum][1] = $this->Arena->beautifyScores($slot['scores']);
		if ($slotDisqualified[$slot['id']]){
			$tableClasses[$slotNum][1] = 'disqualified';
		}	
		else if($slotWinner[$slot['id']]){
			$tableClasses[$slotNum][1] = 'winner';
		}
	}
}

/**
 * Вывод тела таблицы
 */
foreach ($tableCells as $rowNum => $rowCells){									
	echo '<tr>';
	foreach ($rowCells as $cellNum => $cell){						
		if (isset($tableClasses[$rowNum][$cellNum])){
			echo '<td class="'.$tableClasses[$rowNum][$cellNum].'">';
		}	
		else {
			echo '<td>';
		}		
		echo $cell;
		echo '</td>';
	}
	echo '</tr>';
}
?>
</table>
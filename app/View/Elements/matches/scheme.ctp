<?

if (!empty($Match)){
    echo "<div class='MatchScheme'>";
    $type=$Tournament['type'];
    $type=str_replace(' ','-',$type);
    if(strpos($type, 'elimination')) $type.=' elimination';

    echo "<div class='$type'>";

    
    if ($Tournament['type'] == 'single elimination'){
        echo $this->element('matches/list_scheme',compact('Match','Tournament'));

    }
    else if ($Tournament['type'] == 'double elimination'){
		echo $this->element('matches/list_scheme',compact('Match','Tournament'));

    }
    elseif ($Tournament['type'] == 'round robin'){
        echo $this->element('matches/round_robin_scheme',compact('Match','Tournament','Party'));
    }
	elseif ($Tournament['type'] == 'swiss system'){
		echo $this->element('matches/swiss_system_scheme',compact('Match','Tournament','Party'));
	}
    echo "</div>";
    echo "</div>";


}
else{
    echo "<p>Таблица будет объявлена позднее</p>";
}

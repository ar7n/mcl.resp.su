<?php

$grid = array();

$maps_tours=explode("\n",$Tournament['maps_tours']);


foreach ($Match as $gridMatch){
    $grid[$gridMatch['group']][$gridMatch['tour']][$gridMatch['position']] = $gridMatch;
} 
foreach ($grid as &$group){
	ksort($group);
	foreach ($group as &$tour){
		ksort($tour);
	}
}


$labels_groups=array(
    'main'=>'Главная сетка',
    'third_place'=>'Матч за третье место',
    'seventh_place'=>'Матч за седьмое место',
    'fifth_place'=>'Матч за пятое место',
);

?><script>if(my_new_top > 0) my_new_top = my_new_top; else var my_new_top = 0;</script><?

echo "<div class='scroll_block'>";
echo "<div class='scheme-container' style=''>";

$sort_keys=array('main','upper','lower','final','third_place','fifth_place','seventh_place');

foreach($sort_keys as $k){
    if(isset($grid[$k])){
        $sorted_grid[$k]=$grid[$k];
        unset($grid[$k]);
    }
}

    $sorted_grid=array_merge($sorted_grid,$grid);
    unset($grid);


    foreach($sorted_grid as $group=>$matches_in_group){
        ksort($matches_in_group);

		if($group=='third_place' && $Tournament['se_allow_third_place_match']==false){
			continue;
		}



        //добавляем прямоугольник с победителем для всех подсеток кроме нижней и верхней
        if(!($group=='upper' || $group=='lower')){
            $final_match=end($matches_in_group);
            $matches_in_group[] = $final_match;
        }
        else{
            $matches_in_group[] = false;
        }

        if($group=='third_place' || $group=='fifth_place' || $group=='seventh_place'){

            echo "<figure class='{$group}_table_container'><figcaption>{$labels_groups[$group]}</figcaption>";

        }
        echo "<table class='SingleElemination  $group'><tr>";



        //$matches_in_group[]=array('Match');
        $num_tours=count($matches_in_group);

        if($group=='main'){
			while(count($matches_in_group)<7){
				$matches_in_group[]=array();
            }
        }

        $j=0;
		foreach($matches_in_group as $tour_num=>$matches){
            $k=$num_tours-$tour_num-1;

            $num_places=count($matches);
            $last_tour=($j==($num_tours-1));
            $pre_last=($j==($num_tours-2));
            $column='';

            if(($group=='main' || $group=='upper' || $group=='lower') && !empty($matches)){
                $tour_label='&nbsp;';
                $map_name='&nbsp;';
                if($k>0){
                    //выводим номер тура и название карты
					//////////////////////////////////////////////////////////////inferno
					//$tour_label=getTourName($k,$group,$tour_num);
                    $tour_label=$this->Arena->getTourName($k,$group,$tour_num,0);
					//print_r($Tournament);
					if($Tournament['type'] == "double elimination")
						{
							if($Tournament['playoff_grid_size'] == 8)
								{
									$_style = "padding-top:50px;";
									?><script>my_new_top = 25;</script><?
								}
							elseif($Tournament['playoff_grid_size'] == 4)
								{
									$_style = "padding-top:170px;";
									?><script>my_new_top = 85;</script><?
								}
							else $_style = "";
						}
					else
						{
							if($Tournament['playoff_grid_size'] == 16) $_style = "padding-top:90px;";
							else $_style = "";
						}
					/////////////////////////////////////////////////////////////\inferno
                    $i_mapname=$tour_num;
                    if($group=='lower'){
                        $i_mapname+=count($sorted_grid['upper'])+1;
                    }
                    $map_name=isset($maps_tours[$i_mapname])?$maps_tours[$i_mapname]:'';
                }
                $column="<div class='tourname' style='".$_style."'><em>$tour_label</em><br /><strong class='map'>$map_name&nbsp;</strong></div>";

            }



            if(!empty($matches)){

                $num_level=(!$last_tour?$j+1:$j);

                $first_tour=false;


                if($group=='lower'){
                    if($num_level%2===1){
                        $first_tour=true;
                    }

                    $num_level=ceil($num_level/2);
                }

                $tour_class="level".$num_level;
                $column.= '<ul class="'.$tour_class.($last_tour?' last':'').($pre_last?' prelast':'').($first_tour?' first_half_tour':'').'">';



                $i=1;
                $counter=1;
                foreach($matches as $place=>$match){
                    $last=($place == $num_places-1) ;
                    $first=($place == 0);
                    $class=($last?'last ':'');
                    $class.=($first?'first ':'');
                    $class.=($i%2==0? 'even':'odd');
                    $class=" class=\"$class\"";


                    $params=array(
                        'item' => $match,
                        'type'=>(!$last_tour?'small':'small_winner'),
                    );

                    if($tour_num==0 && $group=='main'){
                        $params['counter']=$counter;
                        $counter+=2;
                    }

                    $match_block=$this->element('matches/item', $params);
					if(isset($match['Slot'][0]['Party']['User']['id']))
					$match_block=str_replace("/users/view/".$match['Slot'][0]['Party']['User']['id'],"/matches/view/".$match['id'],$match_block);
					if(isset($match['Slot'][1]['Party']['User']['id']))
					$match_block=str_replace("/users/view/".$match['Slot'][1]['Party']['User']['id'],"/matches/view/".$match['id'],$match_block);

                    $column.= "<li{$class}>{$match_block}</li>";

                    $i++;
                }
                $column.= "</ul>";
            }
            $j++;
            if($matches!==false){
                echo $this->Html->tag('td', $column);
            }
        }


        echo "</tr></table>";




        if($group=='third_place'){
            echo "</figure>";
        }


    }


echo "</div>";
echo "</div>";

?>
<script>
    var scheme_popup_opened=false

$(document).ready(function(){

    if($('table.main .prelast').length == 1){
        td_offset=$("table.main .prelast").parent().offset();
        mi_offset=$("table.main .prelast .MatchItem").offset();


        $("figure.third_place_table_container").css('position','absolute');


        offset=td_offset;
        offset.top=mi_offset.top+60;

        $("figure.third_place_table_container").offset(offset);

        $('div.scheme-container').width($("table.main").width());

    }



    if($('table.final').length == 1){
        //передвигаем блок с финалом в центр справа
        upper_height=$("table.upper").innerHeight();
        lower_height=$("table.lower").innerHeight();

        width=$("table.upper").innerWidth();

        half_height=$("table.final").innerHeight()/2 - parseInt($("table.final td").css('padding-top'))/2;

        left=width;
        top1=(upper_height-half_height);

        $('table.final').css({
            top:top1+my_new_top,
            left:left

        });

        //увеличиваем ширину контейнера сетки
        $('div.scheme-container').width(width+$("table.final").width());
        
        //перемещаем линии верхней сетки
        bot=-upper_height/2+45;
        //console.log(bot);
        $(".upper ul.prelast .MatchItem .after").css({
            'bottom':(bot)+'px'
        });
        
        //перемещаем линии нижней сетки
        bot2=-lower_height/2+16;
        //console.log(bot2);
        $(".lower ul.prelast .MatchItem .after").css({
            'top':bot2+'px',
            'border-width':'0 1px 1px 0'
        
        });
        
        
        $(".lower ul.prelast .MatchItem .after span").css({
            'bottom':'0px',
            'top':'0px'
            
        })
        
    }
        
    
    /*$(".MatchScheme .MatchItem .PartyItem a.party-name").click(function(e){
        party_id=$(this).parent().data('party-id');
        if(!party_id)
            return;
        
        
        $.ajax({
            url: "/parties/scheme_popup/"+party_id,
            cache: true,
            success: function(html){
                 


                $('body .schemePopup').remove();

                $("body").append(html);
                popup=$('body .schemePopup')

                
                var x = e.pageX-24;
                var y = e.pageY+5-popup.height();

                popup.offset({top:y,left:x})
                scheme_popup_opened=true;
                
                $("body .schemePopup").mousedown(function(){
                    return true;
                })
            }
        });

        
        return false;
    });*/
    
    
    
    $("body, .scroll_block").click(function(){
        if(scheme_popup_opened){
            setTimeout(function(){$('body .schemePopup').remove();},100);
        }
        return true;
    });
    
    $('body .schemePopup').click(function(event){
        event.stopPropagation();
    });
        
    
    $(".PartyItem").hover(select_path)
    
})

function select_path(){
    
    party_id=$(this).data("party-id");
    if(!party_id)
        return;

    var last_after_party_block;
    var selected_in_lower=false;

    $('.PartyItem').each(function(){
        if($(this).data('party-id')==party_id){
            last_after_party_block=$(this).parent().find(".after")
            last_after_party_block.toggleClass("after-select");
            $(this).parents('li').toggleClass("selected")
            
            //есть ли выделение в нижней сетке
            if(selected_in_lower==false){
                selected_in_lower=$(this).parents('.SingleElemination').hasClass('lower');
            }

        }
    })
    last_after_party_block.toggleClass("after-select");
    
    //если есть выделение в нижней сетке, то в верхней убираем последную линию, т.к она не показывает победителя
    if(selected_in_lower){
        $('.upper .PartyItem').each(function(){
            if($(this).data('party-id')==party_id){
                last_after_party_block=$(this).parent().find(".after")
            }
        })
        last_after_party_block.toggleClass("after-select");
    }

    

}

    $(document).ready(function () {
        $('.scroll_block').mousedown(function (event) {
            $(this)
                .data('down', true)
                .data('x', event.clientX)
                .data('scrollLeft', this.scrollLeft);

            return false;
        }).mouseup(function (event) {
            $(this).data('down', false);
        }).mousemove(function (event) {
            if ($(this).data('down') == true) {
                this.scrollLeft = $(this).data('scrollLeft') + $(this).data('x') - event.clientX;
            }
        }).css({
            'overflow' : 'hidden',
            'cursor' : '-moz-grab'
        });

        $(document).mouseup(function(event){
            $('.scroll_block').data('down', false);
        })
    });

    $(window).mouseout(function (event) {
        if ($('.scroll_block').data('down')) {
            try {
                if (event.originalTarget.nodeName == 'BODY' || event.originalTarget.nodeName == 'HTML') {
                    $('#timeline').data('down', false);
                }
            } catch (e) {}
        }
    });

</script>

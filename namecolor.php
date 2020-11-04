<?php
function oncolor($rating, $name) {
    if($rating == 0) {$color='black'; $grade='未参加过比赛'; $idg='non';}
    else if($rating <= 1200) {$color='gray'; $grade='新手'; $idg='new';}
    else if($rating <= 1400) {$color='green'; $grade='入门'; $idg='pui';}
    else if($rating <= 1500) {$color='blue'; $grade='专家'; $idg='exp';}
    else if($rating <= 1700) {$color='purple'; $grade='专业选手'; $idg='can';}
    else if($rating <= 2000) {$color='orange'; $grade='大师'; $idg='mas';}
    else if($rating <= 2500) {$color='#ec3813'; $grade='特级大师'; $idg='gma';}
    else if($rating <= 2700) {$color='#fa0508'; $grade='国际大师'; $idg='ima';}
    else if($rating <= 3000) {$color='#d40c0f'; $grade='超级大师'; $idg='sma';}
    else if($rating <= 3100) {$color='#c70f22'; $grade='国际超级大师'; $idg='ism';}
    else if($rating >= 3300) {$color='#830c22'; $grade='传奇大师'; $idg='lma';}
    return "<a id='$idg' href='/information/?$name'><div class='tooltip'>".$name."<span class='tooltiptext'>$grade</span></div></a>";
}
?>
<?php
foreach ($menuItems as $title => $params){
    if ($params[1]) {
        $class = '';
        if (isset($currentMenuItem) && $currentMenuItem == $title) {
            $class = 'active';
        }
        echo '<li class="' . $class . '"><a href="' . $params[0] . '">' . $title . '</a></li>';
    }
    else{
        echo '<li class="disabled">' . $title . '</li>';
    }
}
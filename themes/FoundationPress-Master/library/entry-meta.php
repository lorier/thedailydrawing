<?php
if(!function_exists('FoundationPress_entry_meta')) :
    function FoundationPress_entry_meta() {
        echo '<time class="updated date" datetime="'. get_the_time('c') .'"><span class="month">'. get_the_time('n').'</span><span class="day">.'.get_the_time('j').'</span><span class="year">.'.get_the_time('y').'</span>' .'</time>';
    }
endif;
?>
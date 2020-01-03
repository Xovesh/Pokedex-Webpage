<?php
function get_Type_Color($type_name){
    if($type_name == "NAN"){
        $type_name = "NONE";
    }
    switch ($type_name) {
        case 'NORMAL':
            $color = 'A8A77A';
           break;case 'FIGHTING':
            $color = 'C22E28';
           break;case 'FLYING':
            $color = 'A98FF3';
           break;case 'POISON':
            $color = 'A33EA1';
           break;case 'GROUND':
            $color = 'E2BF65';
           break;case 'ROCK':
            $color = 'B6A136';
           break;case 'BUG':
            $color = 'A6B91A';
           break;case 'GHOST':
            $color = '735797';
           break;case 'STEEL':
            $color = 'B7B7CE';
           break;case 'FIRE':
            $color = 'EE8130';
           break;case 'WATER':
            $color = '6390F0';
           break;case 'GRASS':
            $color = '7AC74C';
           break;case 'ELECTRIC':
            $color = 'F7D02C';
           break;case 'PSYCHIC':
            $color = 'F95587';
           break;case 'ICE':
            $color = '96D9D6';
           break;case 'DRAGON':
            $color = '6F35FC';
           break;case 'DARK':
            $color = '705746';
           break;case 'FAIRY':
            $color = 'D685AD';
           break;
        default:
            $color = 'FFFFFF';
            break;
    }
    return '<button type="button" class="btn" '. 'style="pointer-events:none; background-color:#'.$color.'"> '.$type_name . '</button>';
}
?>

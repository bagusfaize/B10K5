<?php

function gantiKata($teks,$abjad,$ganti){
    $array = str_split($teks);
    $max = count($array);

    for($i=0; $i<$max; $i++){
        if($array[$i] == $abjad){
            $array[$i] = $ganti;
        }
    }
    print_r(implode($array));
}
gantiKata('purwakarta','a','o');

?>

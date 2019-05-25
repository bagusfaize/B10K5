<?php
// BELOM JADI
function cetakGambar($input){

    $i;
    $j;

    for($i = 1; $i <= $input; $i++)
    {
        for($j = 1; $j <= $input; $j++){
            echo "X ";
        }
        echo ("\n");
    }
}
cetakGambar(5);

?>
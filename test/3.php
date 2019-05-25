<?php
//echo "There are <strong>".preg_match_all('/[aeiou]/i',$string,$matches)." vowels</strong> in the string <strong>".$string."</strong>";
function countVowel($input){
    $wovels = preg_match_all('/[aiueoAIUEO]/',$input,$matches);

    
    echo "Total vowels $wovels";
    echo "<br>$input ";
}

countVowel('programmer');
?>
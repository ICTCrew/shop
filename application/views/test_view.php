<?php
//print_r($proizvod);
echo $proizvod[0]['Ptitle']."<br>";
echo $proizvod[0]['modelOpis']."<br>";
echo $proizvod[0]['osobine']."<br>";
$osobineN=  explode('*', $proizvod[0]['osobine']);
$broj=count($osobineN);
    for($i=0; $i<$broj-1; $i++){
       $osobina=  explode('|', $osobineN[$i]);
        echo $osobina[0].": ".$osobina[1]." ".$osobina[2]."<br>";
}

?>


<?php

foreach ($sve as $meni) {
    //if()
}

foreach ($menu as $meni) {
                   if(isset($meni['main_menu'])){
                       $niz=$meni['main_menu']['SubMenu'];
                       for($i=0; $i<count($niz); $i++) {
                           
                        echo "<li><a class='color4' href='".$niz[$i]['url']."' target='".$niz[$i]['target']."'>".$niz[$i]['anchor']."</a></li>";
                        if(isset($niz[$i]['SubMenu'])){
                          
                            foreach ($niz[$i]['SubMenu'] as $pod){
                                
                                echo '<li><a href="'.$niz[$i]['SubMenu'][0]['url'].'">'.$niz[$i]['SubMenu'][0]['anchor'].'</a></li>';
                            }
                               
                        }
                       }
                      break;
                       
                   }
                   
               }








/*echo $proizvod[0]['Ptitle']."<br>";
echo $proizvod[0]['modelOpis']."<br>";
echo $proizvod[0]['osobine']."<br>";
$osobineN=  explode('*', $proizvod[0]['osobine']);
$broj=count($osobineN);
    for($i=0; $i<$broj-1; $i++){
       $osobina=  explode('|', $osobineN[$i]);
        echo $osobina[0].": ".$osobina[1]." ".$osobina[2]."<br>";
}*/

?>


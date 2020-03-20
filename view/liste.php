<?php
     $vehicules = $result["data"]["vehicules"];
     $marques   = $result["data"]["marques"];
    echo "<h3>Filtrer par marque</h3>";
    echo "<div class='nav_layout'>";
    if(!empty($marques)){
        foreach($marques as $m){
            echo "<a href='?action=liste&id=", $m->getId(), "'>", $m, "</a>&nbsp;";
        }
    }
    else echo "Pas de marques disponibles..."; 
    echo "</div>";
?>

<div class="list_voiture">
    <?php
        foreach($vehicules as $v){
            echo "<div class='voiture'><h1>".$v->getMarque()->getNom()."</h1>";
            echo "<div ><h3>".$v->getImmat()."</h3></div>";
                echo "<a href='index.php?action=voir&id=".$v->getId()."'><div class='photo'>
                    <img src=".$v->getPhoto()." alt=''></a>
                </div>";     
        echo "</div>";
        }
    ?>

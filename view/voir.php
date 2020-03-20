<?php
    $vehicule = $result["data"];
?>

    <div> 
        <?php

            // echo "<p>", $vehicule, "</p>"; 
            echo "<div class='voiture'><h1>".$vehicule->getMarque()->getNom()."</h1>";
        echo "<p class='index'><a href='index.php?action=voir&id=".$vehicule->getId()."'>".$vehicule->getMarque()->getNom()."</a></p>";
        echo "<div>".$vehicule->getMarque()->getOrigine()."</div>";
            echo "<div>".$vehicule->getModele()."</div>";
            echo "<div>Nombres de portes : ".$vehicule->getNb()."</div>";
            echo "<div>plaque : ".$vehicule->getImmat()."</div>";
            echo "<div class='photo'>
                <img src=".$vehicule->getPhoto()." alt=''>
            </div>              
            <div>
                <ul>Couleurs";
                    
                    if(!is_null($vehicule->getCouleurs())){ 
                        $i = 0;
                        foreach ($vehicule->getCouleurs() as $key => $value) {
                            echo '<li>'.$vehicule->getCouleurs()[$i].'</li>';
                            $i++;
                        }
                    }
                    else{
                        echo '<li>non renseigné</li>';
                    }
               echo "</ul>
            </div>
    </div>";

        ?>

    </div>

<?php 
    // var_dump($content);
?>

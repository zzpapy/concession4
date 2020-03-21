<?php
    $vehicule = $result["data"];
?>

    
        <?php

            // echo "<p>", $vehicule, "</p>"; 
echo "<div class='voiture_seul'><h1>".$vehicule->getMarque()->getNom()."</h1>";
    echo "<p class='index'><a href='index.php?action=voir&id=".$vehicule->getId()."'>".$vehicule->getMarque()->getNom()."</a></p>";
    echo "<div>".$vehicule->getMarque()->getOrigine()."</div>";
    echo "<div>".$vehicule->getModele()."</div>";
    echo "<div>Nombres de portes : ".$vehicule->getNb()."</div>";
    echo "<div>plaque : ".$vehicule->getImmat()."</div>";
    echo "<div class='photo'>
        <img src=".$vehicule->getPhoto()." alt=''>
    </div>              
    <div>
        <div>Couleurs";
        
            
            if(!is_null($vehicule->getCouleurs())){ 
                $i = 0;
                echo '<form action="" method="POST" class="crea_form">';
                foreach ($vehicule->getCouleurs() as $key => $value) {
                    if($i != 0){
                        echo '<span><input type="color" name="couleurs1" value="'.$vehicule->getCouleurs()[$i].'"'.$vehicule->getCouleurs()[$i].'</span>';
                    }
                    else{
                        echo '<input type="hidden" name="id" value="'.$vehicule->getId().'">';
                        echo '<span><input type="color" name="couleurs" value="'.$vehicule->getCouleurs()[$i].'"'.$vehicule->getCouleurs()[$i].'</span>';
                    }
                    $i++;
                }
                echo '<span><input type="submit" name="action" value="update"></span>';
                echo '</form>';
            }
            else{
                echo '<span>non renseigné</span>';
            }
        echo "</div>
    </div>
    </div>";

        ?>

<?php 
    // var_dump($content);
?>

<?php
    $vehicule = $render["content"];
?>

    <div> 
        <?php

            // echo "<p>", $vehicule, "</p>"; 
            echo "<div class='voiture'><h1>".$render["content"]->getMarque()->getNom()."</h1>";
        echo "<p class='index'><a href='index.php?action=voir&id=".$render["content"]->getId()."'>".$render["content"]->getMarque()->getNom()."</a></p>";
        echo "<div>".$render["content"]->getMarque()->getOrigine()."</div>";
            echo "<div>".$render["content"]->getModele()."</div>";
            echo "<div>Nombres de portes : ".$render["content"]->getNb()."</div>  
            <div class='photo'>
                <img src=".$render["content"]->getPhoto()." alt=''>
            </div>              
            <div>
                <ul>Couleurs";
                    
                    if(!is_null($render["content"]->getCouleurs())){ 
                        $i = 0;
                        foreach ($render["content"]->getCouleurs() as $key => $value) {
                            echo '<li>'.$render["content"]->getCouleurs()[$i].'</li>';
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

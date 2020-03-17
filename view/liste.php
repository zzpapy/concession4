<?php
    $vehicules = $render["data"];
?>

<div class="list_voiture">
    <?php
        foreach($render["content"] as $v){
            // var_dump($v);
            echo "<div class='voiture'><h1>".$v->getMarque()->getNom()."</h1>";
            echo "<p class='index'><a href='index.php?action=voir&id=".$v->getId()."'>".$v->getMarque()->getNom()."</a></p>";
            echo "<div>".$v->getMarque()->getOrigine()."</div>";
                echo "<div>".$v->getModele()."</div>";
                echo "<div>'Nombres de portes : '".$v->getNb()."</div>  
                <div class='photo'>
                    <img src=".$v->getPhoto()." alt=''>
                </div>              
                <div>
                    <ul>Couleurs";
                        
                        if(!is_null($v->getCouleurs())){
                            $i = 0;
                            foreach ($v->getCouleurs() as $key => $value) {
                                echo '<li>'.$v->getCouleurs()[$i].'</li>';
                                $i++;
                            }
                        }
                        else{
                            echo '<li>non renseigné</li>';
                        }
                   echo "</ul>
                </div>
        </div>";
        }
    ?>

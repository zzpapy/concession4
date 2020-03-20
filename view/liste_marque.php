<?php 

$vehicules = $result["data"]["vehicules"];
if(is_array($vehicules) && !is_null($vehicules)){

    foreach($vehicules as $v){
        echo "<div class='voiture'><h1>".$v->getMarque()->getNom()."</h1>";
        echo "<p class='index'><a href='index.php?action=voir&id=".$v->getId()."'>".$v->getMarque()->getNom()."</a></p>";
        echo "<div>".$v->getMarque()->getOrigine()."</div>";
            echo "<div>".$v->getModele()."</div>";
            echo "<div>Nombres de portes : ".$v->getNb()."</div>  
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
}
else if(!is_null($vehicules)){
    echo "<div class='voiture'><h1>".$vehicules->getMarque()->getNom()."</h1>";
        echo "<p class='index'><a href='index.php?action=voir&id=".$vehicules->getId()."'>".$vehicules->getMarque()->getNom()."</a></p>";
        echo "<div>".$vehicules->getMarque()->getOrigine()."</div>";
            echo "<div>".$vehicules->getModele()."</div>";
            echo "<div>Nombres de portes : ".$vehicules->getNb()."</div>  
            <div class='photo'>
                <img src=".$vehicules->getPhoto()." alt=''>
            </div>              
            <div>
                <ul>Couleurs";
                    
                    if(!is_null($vehicules->getCouleurs())){ 
                        $i = 0;
                        foreach ($vehicules->getCouleurs() as $key => $value) {
                            echo '<li>'.$vehicules->getCouleurs()[$i].'</li>';
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
else{
    echo "<div><h2>Aucun véhicule de la marque</h2></div>";
}
?>

<?php 
    // var_dump($result);
?>
<div class="voiture">
    <h1>Création véhicule</h1>
    <form action="" method="POST" class="crea_form" enctype="multipart/form-data">
        <div>        
            <input type="text" name="immat" placeholder="Immatriculation">        
        </div>
        <div>
            <select name="marque_id" id="">
                <option value="">Sélectionner marque</option>
                <?php 
                    foreach ($result['data'] as $key => $value) {
                        echo "<option value='".$value->getId()."'>".$value."</option>";
                    }
                ?>
            </select>     
            <!-- <input type="text" name="marque_id" placeholder="Marque">         -->
        </div>
        <div>        
            <input type="text" name="modele" placeholder="Modele">        
        </div>
        <div> 
            <label for="">couleur n° 1</label>       
            <input type="color" name='couleurs' placeholder="couleur">        
        </div>
        <div> 
            <label for="">couleur n° 2</label>         
            <input type="color" name='couleurs1' placeholder="couleur">        
        </div>
        <div>        
            <input type="text" name='nb_portes' placeholder="nombre de portes">        
        </div>
        <div>        
            <input type="text" name='motorisation' placeholder="motorisation">        
        </div>
        <div>   
        Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">  
            <input type="text" name='photo' placeholder="url photo">        
        </div>
        <div><input  type="submit"></div>
    </form>
</div>
<div class="voiture">
    <h1>Création marque</h1>
    <form action="" method="POST" class="crea_form">
        <div>        
            <input type="text" name='nom' placeholder="Nom">        
        </div>
        <div>        
            <input type="text" name='origine' placeholder="origine">        
        </div>
        <input type="submit">
    </form>
</div>
<!-- <div class="voiture">
    <h1>Afficher véhicules par marques</h1>
    <form action="" class="crea_form">
        <a href=""></a>
        <?php
            // foreach ($result['data'] as $key => $value) {
            //     echo "<div><a href='index.php?action=liste&nom=".$value->getNom()."&id=".$value->getId()."'>".$value->getNom()."</a></div>";
            // }
        ?>
    </form>
</div> -->
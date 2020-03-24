<?php 
    // var_dump($result);
?>
<div class="voiture_crea">
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
            <input type="color" name='couleurs[]' placeholder="couleur">        
        </div>
        <span class="choixPlus fas fa-plus"></span>
        <div class="couleur_suppl"></div>
        <!-- <div class = "deux hide"> 
            <label for="">couleur n° 2</label>         
            <input type="color" name='couleurs1' placeholder="couleur" value="">        
        </div> -->
        <div>        
            <input type="text" name='nb_portes' placeholder="nombre de portes">        
        </div>
        <div> 
            <select name="motorisation">
                <option value="">Motorisation</option>
                <option value="SP">SP</option>
                <option value="diesel">Diesel</option>
                <option value="hybr">Hybride</option>
                <option value="elec">Electrique</option>
            </select>       
        </div>
        <div>   
        <div>
            <p>photo</p>
        </div>
        <span class="upload">upload</span><span class="link">lien</span>
            <input class="hide up" type="file" name="fileToUpload" id="fileToUpload">  
            <input class="hide lien" type="text" name='photo' placeholder="url photo">        
        </div>
        <input class="button" type="submit">
    </form>
</div>
<div class="voiture_crea">
    <h1>Création marque</h1>
    <form action="" method="POST" class="crea_form">
        <div>        
            <input type="text" name='nom' placeholder="Nom">        
        </div>
        <div>        
            <input type="text" name='origine' placeholder="origine">        
        </div>
        <input class="button" type="submit">
    </form>
</div>
<div class="voiture_crea">
    <h1>Création motorisation</h1>
    <form action="" method="POST" class="crea_form">
        <div>        
            <input type="text" name='motorisation' placeholder="Nom">        
        </div>
        <div>        
            <input type="text" name='origine' placeholder="origine">        
        </div>
        <input class="button" type="submit">
    </form>
</div>
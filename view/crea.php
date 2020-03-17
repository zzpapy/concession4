<?php 
    // var_dump($render);
?>
<form action="" method="POST" class="crea_form">
    <div>        
        <input type="text" name="immat" placeholder="Immatriculation">        
    </div>
    <div>
        <select name="marque_id" id="">
            <option value="">Sélectionner marque</option>
            <?php 
                foreach ($render['content'] as $key => $value) {
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
        <input type="text" name='couleurs' placeholder="couleur">        
    </div>
    <div>        
        <input type="text" name='nb_portes' placeholder="nombre de portes">        
    </div>
    <div>        
        <input type="text" name='motorisation' placeholder="motorisation">        
    </div>
    <div><input  type="submit"></div>
</form>
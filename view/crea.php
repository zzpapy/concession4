<?php 
    // var_dump($render);
?>
<div>

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
            <input type="color" name='couleurs' placeholder="couleur">        
        </div>
        <div>        
            <input type="color" name='couleurs1' placeholder="couleur">        
        </div>
        <div>        
            <input type="text" name='nb_portes' placeholder="nombre de portes">        
        </div>
        <div>        
            <input type="text" name='motorisation' placeholder="motorisation">        
        </div>
        <div>        
            <input type="text" name='photo' placeholder="url photo">        
        </div>
        <div><input  type="submit"></div>
    </form>
</div>
<div>
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
<div>
    <form action="" class="crea_form">
        <a href=""></a>
        <?php
            foreach ($render['content'] as $key => $value) {
                echo "<div><a href='index.php?action=liste&nom=".$value->getNom()."&id=".$value->getId()."'>".$value->getNom()."</a></div>";
            }
        ?>
        <input type="text">
    </form>
</div>
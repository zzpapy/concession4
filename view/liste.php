<?php
    $vehicules = $render["data"];
?>

<div class="list_voiture">
    <?php
        foreach($render["content"] as $v){
            echo "<p class='index'><a href='index.php?action=voir&id=".$v->getId()."'>".$v."</a></p>";
        }
    ?>
</div>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/styles/style.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
<div class="nav">
    <a href="index.php?action=index">index voitures</a>
    <a href="index.php?action=crea">création</a> 
</div>
<div class="nav">
    <h1>Afficher véhicules par marques</h1>
    <div class="">
        <?php
            foreach ($render['list'] as $key => $value) {
                echo "<a href='index.php?action=liste&nom=".$value->getNom()."&id=".$value->getId()."'>".$value->getNom()."</a>";
            }
        ?>
    </div>
</div>
<div class="container">
    <?php 
    if(isset($render["content"])){
        $content = $render["data"];
        require $content; 
    }
    ?>
</div>
</div>
</body>
</html>
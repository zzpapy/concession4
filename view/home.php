<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
<div class="nav">
    <a href="index.php?action=index">index voitures</a>
    <a href="index.php?action=crea">création véhicule</a>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php?action=index">index voitures</a>
    <a href="index.php?action=voir&id=25">une voiture</a>
<?php 
if(isset($render["content"])){
    $content = $render["data"];
    require $content; 
}
 ?>
</body>
</html>
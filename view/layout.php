<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="public/styles/style.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
<i class="fas fa-bars menu hide"></i>
<div class="nav nav_nav">
    <a href="index.php">Accueil</a>            
    <a href="index.php?action=index">index voitures</a>
    <a href="index.php?action=crea">création</a> 
    <!-- <button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois -->
    <h4>recherche véhicules par plaques</h4>
    <input type="text" id="recherche">
</div>
<div class="affich"></div>
<div class="container">
    <?php 
    echo $page;
    ?>
</div>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="public/scripts/script.js"></script>
</body>
</html>
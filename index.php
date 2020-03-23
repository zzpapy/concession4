<?php
    namespace App;
// var_dump($_GET["action"]);
    use Controller\HomeController;

    define('DS', DIRECTORY_SEPARATOR); // le caractère séparateur de dossier (/ ou \)
    // meilleure portabilité sur les différents systêmes.
    define('BASE_DIR', dirname(__FILE__).DS); // pour se simplifier la vie
    define('VIEW_DIR', BASE_DIR."view/");     //le chemin où se trouvent les vues

    require("app/Autoloader.php");
    Autoloader::register();
    $ctrl = new HomeController();
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if(isset($_POST["immat"]) && !empty($_POST)){
            $action = "traitementCrea";
            $file = $_FILES;
            $id = $_POST;
            $result = $ctrl->$action($id,$file);
        }
        if(isset($_POST["origine"]) && !empty($_POST)){
            $action = "traitementMarque";
            $id = $_POST;
            $result = $ctrl->$action($id);
        }
        if(isset($_POST["action"]) && $_POST["action"]=="update"){
            // var_dump($_POST);die;
            $action = "update";
            $nom = $_POST;
            $id = $_POST["id"];
            $result = $ctrl->$action($nom,$id);
        }
    }
    else $action = "index"; 
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $nom = '';
    if(isset($_GET['nom'])){
        $nom = $_GET['nom'];
        $id = $_GET['id'];
    }
    
    $result = $ctrl->$action($id,$nom);
    if($action == "ajax"){//si l'action était ajax
        echo $result;//on affiche directement le return du contrôleur (càd la réponse HTTP sera uniquement celle-ci)
    }
    else if($action == "recherche"){
        echo($result);
    }
    else{
        ob_start();//démarre un buffer (tampon de sortie)
        /*la vue s'affiche dans le buffer qui devra être inséré
        au milieu du template*/
        include($result['view']);
        /*je mets cet affichage dans une variable*/
        $page = ob_get_contents();
        /*j'efface le tampon*/
        ob_end_clean();
        /*j'affiche le template principal*/
        include VIEW_DIR."layout.php";
    }

<?php
    namespace App;

    use Controller\HomeController;

    define('DS', DIRECTORY_SEPARATOR); // le caractère séparateur de dossier (/ ou \)
    // meilleure portabilité sur les différents systêmes.
    define('BASE_DIR', dirname(__FILE__).DS); // pour se simplifier la vie
    define('VIEW_DIR', BASE_DIR."view/");     //le chemin où se trouvent les vues

    require("app/Autoloader.php");
    Autoloader::register();
    // var_dump($_POST);
    $ctrl = new HomeController();
    // var_dump($_GET);die;
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if(isset($_POST["immat"]) && !empty($_POST)){
            // var_dump($_FILES);die;
            $action = "traitementCrea";
            $file = $_FILES;
            $id = $_POST;
            $render = $ctrl->$action($id,$file);
        }
        if(isset($_POST["origine"]) && !empty($_POST)){
            $action = "traitementMarque";
            $id = $_POST;
            $render = $ctrl->$action($id);
        }
        if(isset($_POST["action"]) && $_POST["action"]=="update"){
            // var_dump($_POST);die;
            $action = "update";
            $nom = $_POST;
            $id = $_POST["id"];
            $render = $ctrl->$action($nom,$id);
        }
    }
    else $action = "home"; 
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $nom = '';
    if(isset($_GET['nom'])){
        $nom = $_GET['nom'];
        $id = $_GET['id'];
    }
    
    $render = $ctrl->$action($id,$nom);
    require($render['view']);

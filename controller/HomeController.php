<?php
    namespace Controller;

    use Model\Managers\VehiculeManager;
    use Model\Managers\MarqueManager;
    
    
    class HomeController{

        public function index(){

            $man = new VehiculeManager();

            $vehicules = $man->findAll();
            return $this->home([
                "view" => "liste.php",
                "data" => $vehicules
            ]);
        }

        public function voir($id){
            
            $man = new VehiculeManager();

            $vehicule = $man->findOneById($id);

            return $this->home([
                "view" => "voir.php",
                "data" => $vehicule
            ]);
        }
        public function crea(){
            $manager = new MarqueManager();
            $marques = $manager->findAll();
            return $this->home([
                "view" => "crea.php",
                "data" => $marques
            ]);
        }
        public function traitementCrea($tab){
            $man = new VehiculeManager($tab);
            $tab["couleurs"] = json_encode($tab["couleurs"]);
            // var_dump($tab["couleurs"]);die;
            $new = $man->add($tab);
            var_dump($this->index()["view"]);
            header("location:index.php?action=index");
            // return require($this->index()["view"]);die;
        }
        public function home($root){
            return [
                "view" => VIEW_DIR."home.php",
                "data" => VIEW_DIR.$root["view"],
                "content" => $root["data"]
            ];
        }
    }

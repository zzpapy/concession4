<?php
    namespace Controller;

    use Model\Managers\VehiculeManager;
    
    class HomeController{

        public function index(){

            $man = new VehiculeManager();

            $vehicules = $man->findAll();
            var_dump($vehicules);
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
            return $this->home([
                "view" => "crea.php",
                "data" => ""
            ]);
        }
        public function traitementCrea($tab){
            $man = new VehiculeManager();
            $new = $man->add($tab);
            return $this->home([
                "view" => "crea.php",
                "data" => ""
            ]);
        }
        public function home($root){
            return [
                "view" => VIEW_DIR."home.php",
                "data" => VIEW_DIR.$root["view"],
                "content" => $root["data"]
            ];
        }
    }

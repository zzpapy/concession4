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
        public function liste($id,$nom){
            $manager = new VehiculeManager();
            $marques = $manager->findByMarque($id);
            // var_dump($marques);die;
            return $this->home([
                "view" => "liste_marque.php",
                "data" => $marques
            ]);
        }
        public function traitementCrea($tab){
            $man = new VehiculeManager($tab);
            $tab["couleurs"] = json_encode([$tab["couleurs"],$tab["couleurs1"]]);
            unset($tab["couleurs1"]);
            $new = $man->add($tab);
            // var_dump($new);die;
            var_dump($this->index()["view"]);
            header("location:index.php?action=index");
            // return require($this->index()["view"]);die;
        }
        public function traitementMarque($tab){
            $man = new MarqueManager($tab);
            // var_dump($tab);die;
            $new = $man->add($tab);
            header("location:index.php?action=crea");
            // return require($this->index()["view"]);die;
        }
        public function update($tab){
            // var_dump($tab);die;
            $man = new VehiculeManager($tab);
            $id = $tab["id"];
            unset($tab["id"]);
            $tab["couleurs"] = json_encode([$tab["couleurs"],$tab["couleurs1"]]);
            unset($tab["couleurs1"]);
            unset($tab["action"]);
            $new = $man->update($tab,$id);
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

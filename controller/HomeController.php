<?php
    namespace Controller;

    use Model\Managers\VehiculeManager;
    use Model\Managers\MarqueManager;
    use APP\Upload;
    
    
    class HomeController{

        public function index(){

            $vman = new VehiculeManager();
            $mman = new MarqueManager();

            $vehicules = $vman->findAll();
            $marques = $mman->findAll();
            return [
                "view" =>  VIEW_DIR."liste.php",
                "data" =>[
                    "vehicules" => $vehicules,
                    "marques" => $marques
                    ]
                ];
        }

        public function voir($id){
             
            $man = new VehiculeManager();
            $vehicule = $man->findOneById($id); 

            return [
                "view" => VIEW_DIR."voir.php",
                "data" => $vehicule
            ];
        }
        public function crea(){
            $manager = new MarqueManager();
            $marques = $manager->findAll();
            return [
                "view" => VIEW_DIR."crea.php",
                "data" => $marques
            ];
        }
        public function liste($idmarque){
            
            $vman = new VehiculeManager();
            $mman = new MarqueManager();

           
            $marque = $mman->findOneById($idmarque);
            $vehicules = $vman->findByMarque($idmarque);

            return [
                "view" => VIEW_DIR."liste_marque.php",
                "data" => [
                    "marque" => $marque,
                    "vehicules" => $vehicules
                ]
            ];
        }
        public function traitementCrea($tab,$file){
            if(isset($_FILES) && !empty($_FILES["fileToUpload"]["name"])){
               
                $up = Upload::uploadFile("fileToUpload",$_FILES["fileToUpload"]["name"],"public/images/");
                $tab["photo"] = "public/images/".$up;
            }
            $man = new VehiculeManager($tab);
                
                $i = 0;
                $colors = [];
                while($i < count($tab["couleurs"])){
                    array_push($colors,$tab["couleurs"][$i]);
                    $i++;
                }
                $tab["couleurs"] = json_encode($colors);                
                $new = $man->add($tab);
            header("location:index.php?action=index");
        }
        public function traitementMarque($tab){
            $man = new MarqueManager($tab);
            $new = $man->add($tab);
            header("location:index.php?action=crea");
        }
        public function update($tab){
            $man = new VehiculeManager($tab);
            $id = $tab["id"];
            unset($tab["id"]);
            $i = 0;
            $colors = [];
            while($i < count($tab["couleurs"])){
                array_push($colors,$tab["couleurs"][$i]);
                $i++;
            }
            $tab["couleurs"] = json_encode($colors);
            unset($tab["couleurs1"]);
            unset($tab["action"]);
            $new = $man->update($tab,$id);
            header("location:index.php?action=voir&id=".$id);
        }

        public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            return $nb;
        }
        public function recherche(){
            $man = new VehiculeManager();
            $char = $_GET["nb"];
            $res = $man->recherche($char);
            $i = 0;
            $tab = [];
            if($res){
                if(is_object($res) ){
                    $immat = $res->getImmat();
                    $id =$res->getId();
                    $photo = $res->getPhoto();
                    // var_dump($photo);
                    include(VIEW_DIR."ajax.php");
                }
                else{
                    while($i < count($res)){
                        $immat = $res[$i]->getImmat();
                        $id =$res[$i]->getId();
                        $photo = $res[$i]->getPhoto();
                        // var_dump($photo);
                        include(VIEW_DIR."ajax.php");
                        $i++;           
                    }
                }
            }
            // var_dump($res);
        }
        public function liste_recherche($tab){
            // var_dump($_GET);
            return json_encode($tab);           
        }
    }

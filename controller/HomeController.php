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
            var_dump($id);
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
            // var_dump($marques,$id);die;
            return $this->home([
                "view" => "liste_marque.php",
                "data" => $marques
                ]);
            }
            public function traitementCrea($tab,$file){
                
                
                // var_dump($_FILES,!empty($_FILES["fileToUpload"]["name"]));die;
            if(isset($_FILES) && !empty($_FILES["fileToUpload"]["name"])){

                $target_dir = "public/images/";
                $target_file = $target_dir . basename($file["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($file["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($file["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($file["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $file["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                $tab["photo"] = $target_file;
            }
            $man = new VehiculeManager($tab);
            $tab["couleurs"] = json_encode([$tab["couleurs"],$tab["couleurs1"]]);
            unset($tab["couleurs1"]);           
            
            $new = $man->add($tab);
            var_dump($this->index()["view"]);
            header("location:index.php?action=index");
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
            $manager = new MarqueManager();
            $marques = $manager->findAll();
            return [
                "view" => VIEW_DIR."home.php",
                "data" => VIEW_DIR.$root["view"],
                "content" => $root["data"],
                "list" => $marques
            ];
        }
    }

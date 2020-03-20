<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Entities\Vehicule;

    class VehiculeManager extends Manager{

        protected $className = "Model\Entities\Vehicule"; 
        protected $tableName = "vehicule";

        public function __construct(){
            parent::connect();
        }

        public function findByMarque($id){
            $sql = "SELECT *
                    FROM ".$this->tableName." a WHERE a.marque_id = :id";
                    // var_dump($this->tableName,$id);die;
            return $this->getMultipleResults(
                DAO::select($sql,["id"=>$id]), 
                $this->className
            );
        }
        /*
        public function findAll(){
            return parent::findAll();
        }
        
        public function findOneById($id){
            return parent::findOneById($id);
        }
        */
    }
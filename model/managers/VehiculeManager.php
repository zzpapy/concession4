<?php
    namespace Model\Managers;
    
    use App\Manager;
    use Model\Entities\Vehicule;

    class VehiculeManager extends Manager{

        protected $className = "Model\Entities\Vehicule";
        protected $tableName = "vehicule";

        public function __construct(){
            parent::connect();
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
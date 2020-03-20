<?php
    namespace App;

    abstract class Manager{

        protected function connect(){
            DAO::connect();
        }

        public function findAll(){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    ";

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        }

        public function findOneById($id){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.id_".$this->tableName." = :id
                    ";
            // var_dump($id);
            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

        public function findOneByName($nom){

            $sql = "SELECT id
                    FROM ".$this->tableName." a
                    WHERE a.nom".$this->tableName." = :nom
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['nom' => $nom], false), 
                $this->className
            );
        }


        public function add($data){
            $keys = array_keys($data);
            $values = array_values($data);
            $sql = "INSERT INTO ".$this->tableName."
                    (".implode(',', $keys).")
                    VALUES
                    ('".implode("','",$values)."')";
            return DAO::insert($sql);
        }
        public function update($data,$id){
            // var_dump($data);
            $keys = array_keys($data);
            $values = array_values($data);
            $sql = "UPDATE ".$this->tableName."
                    SET ".implode($keys)."=".json_encode(implode($values))."
                    WHERE id_vehicule = ".$id;
            return DAO::update($sql);
        }
        // public function findByMarque($id){
        //     $sql = "SELECT *
        //             FROM ".$this->tableName." a WHERE marque_id = :id";
        //             // var_dump($id);die;
        //     return $this->getMultipleResults(
        //         DAO::select($sql,["id"=>$id]), 
        //         $this->className
        //     );
        // }
        
        protected function getMultipleResults($rows, $class){

            $objects = [];
            if(isset($rows[0])){
                foreach($rows as $row){
                    // if(is_array( $row)){}
                    $objects[] = new $class($row);
                }
            }
            else{
                // var_dump(isset($rows[0]));
                return new $class($rows);
            }

            return $objects;
        }

        protected function getOneOrNullResult($row, $class){

            if($row != null){
                return new $class($row);
            }
            return false;
        }
        public function recherche($char){

            $sql = " SELECT a.immat, a.id_vehicule
                    FROM ".$this->tableName." a
                    WHERE a.immat LIKE '%". $char ."%' ";
                    // var_dump($char);die;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        }

    }
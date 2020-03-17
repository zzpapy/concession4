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

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
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

                    
            var_dump($sql);
            return DAO::insert($sql);
        }
        
        protected function getMultipleResults($rows, $class){

            $objects = [];

            foreach($rows as $row){
                $objects[] = new $class($row);
            }

            return $objects;
        }

        protected function getOneOrNullResult($row, $class){

            if($row != null){
                return new $class($row);
            }
            return false;
        }

    }
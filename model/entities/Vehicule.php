<?php
    namespace Model\Entities;

    use App\Entity;

    final class Vehicule extends Entity{

        private $id;
        private $immat;
        private $modele;
        private $couleurs;
        private $marque;
        private $nb;
        private $photo;

        public function __construct($data){         
            $this->hydrate($data);        
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        protected function setId($id){

            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of immat
         */ 
        public function getImmat()
        {
            return $this->immat;
        }

        /**
         * Set the value of immat, formatted like this : XX-000-XX
         *
         * @return  self
         */ 
        public function setImmat($immat)
        {
            $immat = substr_replace($immat,'-',2,0);
            $immat = substr_replace($immat,'-',6,0);
            $this->immat = $immat;

            return $this;
        }

        /**
         * Get the value of modele
         */ 
        public function getModele()
        {
            return $this->modele;
        }

        /**
         * Set the value of modele
         *
         * @return  self
         */ 
        public function setModele($modele)
        {
            $this->modele = $modele;

            return $this;
        }

        /**
         * Get the value of couleurs
         */ 
        public function getCouleurs($index = null)
        {
            if($index !== null){
                return $this->couleurs[$index];
            }
            else return $this->couleurs;
        }

        /**
         * Set the value of couleurs
         *
         * @return  self
         */ 
        public function setCouleurs($couleurs)
        {
            $this->couleurs = json_decode($couleurs);

            return $this;
        }

        /**
         * Get the value of marque
         */ 
        public function getMarque()
        {
                return $this->marque;
        }

        /**
         * Set the value of marque
         *
         * @return  self
         */ 
        public function setMarque($marque)
        {
                $this->marque = $marque;

                return $this;
        }

        public function __toString(){

            return $this->immat." - ".$this->modele;
        }

        /**
         * Get the value of nb
         */ 
        public function getNb()
        {
                return $this->nb;
        }

        /**
         * Set the value of nb
         *
         * @return  self
         */ 
        public function setNb($nb)
        {
                $this->nb = $nb; 

                return $this;
        }

        /**
         * Get the value of photo
         */ 
        public function getPhoto()
        {
                return $this->photo;
        }

        /**
         * Set the value of photo
         *
         * @return  self
         */ 
        public function setPhoto($photo)
        {
                $this->photo = $photo;

                return $this;
        }
    }

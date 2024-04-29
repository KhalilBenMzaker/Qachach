<?php
	class categorie{
		private $id_categorie=null;	
		private $nom_categorie=null;

		function __construct( $id_categorie, $nom_categorie){	
	    	$this->id_categorie=$id_categorie;
			$this->nom_categorie=$nom_categorie;
		}

		function getid_categorie(){
			return $this->id_categorie;
		}
		
		function getnom_categorie(){
			return $this->nom_categorie;
		}
	
		function setid_categorie(string $id){
			$this->id_categorie=$id_categorie;
	
	}
	}
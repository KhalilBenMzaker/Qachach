<?php
	class produit{
		private $id_produit=null;
		
		private $nom=null;
		private $descriptionn=null;
		private $prix=null;
	
	
		
		
		
		function __construct( $id_produit, $nom , $descriptionn,$prix){
			
			$this->id_produit=$id_produit;
			$this->nom=$nom;
			$this->desriptionn=$descriptionn;
		
			$this->prix=$prix;
		

		}

	
		function getdescriptionn(){
			return $this->getdescriptionn;
		}
		
		function getnom(){
			return $this->nom;
		}
	
		function getid_produit(){
			return $this->id_produit;
		}
		
		function getprix(){
			return $this->prix;
		}
	
	
		function setdescription(string $descriptionn){
			$this->descriptin=$descriptionn;
		}
		
		
		function setid_produit(string $id){
			$this->id_produit=$id_produit;

		}	function setprix(string $prix){
			$this->prix=$prix;

		}
	
		
	
	
		
		
	}

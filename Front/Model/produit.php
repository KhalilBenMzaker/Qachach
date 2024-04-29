

<?php
	class produit{
		private $id_produit=null;
	
		private $descriptionn=null;
		private $prix=null;
		private $imagee=null; 
		private $nom_categprie=null; 
		
		
		function __construct($id_produit, $descriptionn, $prix, $imagee, $nom_categorie){
			$this->id_produit=$id_produit;
	
			$this->descriptionn=$descriptionn;
			$this->prix=$prix;
			$this->imagee=$imagee;
			$this->nom_categorie=$nom_categorie;
		}

		function getid_produit(){
			return $this->id_produit;
		}
		function getnom(){
			return $this->nom;
		}
		function getdescriptionn(){
			return $this->descriptionn;
		}
		function getprix(){
			return $this->prix;
		}
		function getimagee(){
			return $this->imagee;
		}
		function getnom_categorie(){
			return $this->nom_categorie;
		}
	
		function setid_produit(string $id_produit){
			$this->id_produit=$id_produit;
		}
	
		function setdescriptionn(string $descriptionn){
			$this->descriptionn=$descriptionn;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		function setimagee(string $imagee){
			$this->imagee=$imagee;
		}
		function setnom_categorie(string $nom_categorie){
			$this->nom_categorie=$nom_categorie;
		}
		
		
		
		
	}

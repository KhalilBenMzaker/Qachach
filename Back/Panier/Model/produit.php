<?php
	class produit{
		private $id_produit=null;
	
		private $descriptionn=null;
		private $prix=null;
		private $imagee=null;
		
		
		function __construct($id_produit, $descriptionn, $prix, $imagee){
			$this->id_produit=$id_produit;
	
			$this->descriptionn=$descriptionn;
			$this->prix=$prix;
			$this->imagee=$imagee;
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
		
		
		
		
	}
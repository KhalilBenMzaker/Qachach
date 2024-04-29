<?php
	class Panier{
		private $id_panier=null;
		private $prixT=null;
		private $id_user=null;
		private $nb_produit =null;
        private $id_produit=null;
	
		
		function __construct($id_panier, $prixT, $id_user, $nb_produit, $id_produit){
			$this->id_panier=$id_panier;
			$this->prixT=$prixT;
			$this->id_user=$id_user;
			$this->nb_produit =$nb_produit ;
            $this->id_produit=$id_produit;
		}
		function getid_panier(){
			return $this->id_panier;
		}
        function getid_produit(){
			return $this->id_produit;
		}
		function getprixT(){
			return $this->prixT;
		}
		function getid_user(){
			return $this->id_user;
		}
		function getnb_produit(){
			return $this->nb_produit ;
		}
		
		function setprixT(string $prixT){
			$this->prixT=$prixT;
		}

        function setid_produit(string $id_produit){
			$this->id_produit=$id_produit;
		}
		function setid_user(string $id_user){
			$this->id_user=$id_user;
		}
		function setnb_produit (string $nb_produit ){
			$this->nb_produit =$nb_produit ;
		}
		
	}


?>
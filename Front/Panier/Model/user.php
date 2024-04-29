<?php
class Client{
	    private $nom=null;
		private $id=null;
		
		private $prenom=null;
		private $cin=null;
		private $adresse_mail=null;
		private $num_tel=null;
		private $password=null;
		
        function __construct( $nom, $prenom,  $adresse_mail,$cin, $num_tel , $password){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			
			$this->adresse_mail=$adresse_mail;
			$this->cin=$cin;
			$this->num_tel=$num_tel;
            $this->password=$password;
        }
        function getId(){
			return $this->id;
		}
       

        function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}



        function getCin(){
			return $this->cin;
		}
		function getAdresse_mail(){
			return $this->adresse_mail;
		}
		function getNum_tel(){
			return $this->num_tel;
		}

        function getpassword(){
			return $this->password;
		}

		function setId(string $id){
			$this->id=$id;
		}
        
		function setNom(string $nom){
			$this->nom=$nom;
		}
         
		
        
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setCin(string $cin){
			$this->cin=$cin;
		}
		function setAdress_mail(string $adresse_mail){
			$this->adresse_mail=$adresse_mail;
		}
		function setNum_tel(int $num_tel){
			$this->num_tel=$num_tel;
		}

        function setpassword(int $password){
			$this->password=$password;
		}
		
	}


?>
<?php
	Require_once '../../../Front/config.php';
	include_once '../Model/categorie.php';
	
	class categorieC {

		function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		function supprimercategorie($categorie_id){
			$sql="DELETE FROM categorie WHERE id_categorie=:id_categorie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_categorie', $categorie_id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (  id_categorie,nom_categorie) 
			VALUES ( :id_categorie,:nom_categorie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					'id_categorie' => $categorie->getid_categorie(),
					'nom_categorie' => $categorie->getnom_categorie()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function recuperercategorie($id_categorie){
			$sql="SELECT * from categorie where id_categorie=$id_categorie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategorie($categorie, $id_categorie){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						id_categorie= :id_categorie, 
					
			
						nom_categorie= :nom_categorie
						
					WHERE id_categorie= :id_categorie'
				);
				$query->execute([
					'id_categorie' => $categorie->getid_categorie(),
				
					'nom_categorie' => $categorie->getnom_categorie()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		

	}
?>
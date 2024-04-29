<?php
	require_once '../config.php';
	include_once '../Model/produit.php';
	class produitC {

		function afficherproduits(){
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		function supprimerproduit($produit_id){
			$sql="DELETE FROM produit WHERE id_produit=:id_produit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_produit', $produit_id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		function ajouterproduit($produit){
			$sql="INSERT INTO produit (id_produit, descriptionn, prix,imagee) 
			VALUES (:id_produit, :descriptionn, :prix, :imagee)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_produit' => $produit->getid_produit(),
			
					'descriptionn' => $produit->getdescriptionn(),
					'prix' => $produit->getprix(),
					'imagee' => $produit->getimagee()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function recupererproduit($id_produit){
			$sql="SELECT * from produit where id_produit=$id_produit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierproduit($produit, $id_produit){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET  
					
						descriptionn= :descriptionn, 
						prix= :prix,
						imagee= :imagee
					WHERE id_produit= :id_produit'
				);
				$query->execute([
					'id_produit' => $produit->getid_produit(), 
				
					'descriptionn' => $produit->getdescriptionn(),
					'prix' => $produit->getprix(),
					'imagee' => $produit->getimagee()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>
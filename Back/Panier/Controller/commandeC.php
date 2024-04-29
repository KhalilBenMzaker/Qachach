<?php
	include '../config.php';
	include_once '../Model/commande.php';
	class commandeC {
		function affichercommande(){
			$sql="SELECT * FROM commande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function affichercommandeParUser($id_user){
			$sql="SELECT * FROM commande WHERE id_user=:id_user";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercommande($ref_commande){
			$sql="DELETE FROM commande WHERE ref_commande=:ref_commande";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':ref_commande', $ref_commande);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercommande($commande){
			$sql="INSERT INTO commande (ref_commande, prixT, id_user, id_produit) 
			VALUES (:ref_commande,:prixT,:id_user, :id_produit)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'ref_commande' => $commande->getref_commande(),
					'prixT' => $commande->getPrixT(),
					'id_user' => $commande->getId_user(),
					'id_produit' => $commande->getId_produit()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercommande($ref_commande){
			$sql="SELECT * from commande where ref_commande=$ref_commande";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$commande=$query->fetch();
				return $commande;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercommande($commande, $ref_commande){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commande SET 
						prixT= :prixT, 
						id_user= :id_user, 
						id_produit= :id_produit
					WHERE ref_commande= :ref_commande'
				);
				$query->execute([
					'prixT' => $commande->getPrixT(),
					'id_user' => $commande->getId_user(),
					'id_produit' => $commande->getId_produit(),
					'ref_commande' => $ref_commande
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		function chercherUser($aux){
			$sql="select id from user where (id LIKE ''%'+aux'%'')";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}	
		}
		function calculer(){
			try {
				$db = config::getConnexion();
					$query = $db->prepare(
				'SELECT SUM(prix) as Prix_Total FROM produit'
			);
			$query->execute();
			return $query->fetch();}
					
				
				catch(PDOException $e){
					die('Erreur:'. $e->getMeesage());
				}
		}

	}
?>
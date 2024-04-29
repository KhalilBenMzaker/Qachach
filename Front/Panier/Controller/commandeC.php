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
			$sql="INSERT INTO commande (ref_commande,date_commande,etat,id_panier,mode_payement,id_user) 
			VALUES (:ref_commande,:date_commande,:etat,:id_panier,:mode_payement,:id_user)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'ref_commande' => $commande->getref_commande(),
					'date_commande' => $commande->getdate_commande(),
					'etat' => $commande->getetat(),
					'id_panier' => $commande->getid_panier(),
					'mode_payement' => $commande->getmode_payement(),
					'id_user' => $commande->getid_user()
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

		function rechercher_adressemail_user($id)
        {
            $requete = "select adresse_mail from user where id like '$id'";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
		
	/*	function modifiercommande($commande, $ref_commande){
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
		}*/

	}
?>
<?php
	require_once '../config.php';
	include_once '../Model/Panier.php';
	class PanierC {
		function afficherPanier(){
			$sql="SELECT * FROM panier";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function afficherPanierParUser($id_user){
			$sql="SELECT * FROM panier WHERE id_user=:id_user";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerPanier($id_panier){
			$sql="DELETE FROM panier WHERE id_panier=:id_panier";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_panier', $id_panier);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterPanier($panier){
			$sql="INSERT INTO panier (id_panier, prixT, id_user, id_produit) 
			VALUES (:id_panier,:prixT,:id_user, :id_produit)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_panier' => $panier->getId_panier(),
					'prixT' => $panier->getPrixT(),
					'id_user' => $panier->getId_user(),
					'id_produit' => $panier->getId_produit()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererPanier($id_panier){
			$sql="SELECT * from panier where id_panier=$id_panier";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$panier=$query->fetch();
				return $panier;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierPanier($panier, $id_panier){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE panier SET 
						prixT= :prixT, 
						id_user= :id_user, 
						id_produit= :id_produit
					WHERE id_panier= :id_panier'
				);
				$query->execute([
					'prixT' => $panier->getPrixT(),
					'id_user' => $panier->getId_user(),
					'id_produit' => $panier->getId_produit(),
					'id_panier' => $id_panier
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		function chercherUser($aux){
		    try {
			$db = config::getConnexion();
				$query = $db->prepare(
			'select id from user where id =: aux'
		);
		$query->execute([
		'id' => $id_user	
		]);
		return $query->fetchAll();}
				
			
			catch(PDOException $e){
				die('Erreur:'. $e->getMeesage());
			}	
		}
		function trierpanier(){
			$requete = "select * from panier ORDER BY prixT DESC";
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
		function rechercherpanier($id)
        {
            $requete = "select * from panier where id_panier like '%$id%'";
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

		function rechercherpanier2($id)
        {
            $requete = "select * from panier where id_user like '$id'";
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

		function rechercherpanier3($id)
        {
            $requete = "select * from panier where id_user like '$id' LIMIT $offset, $no_of_records_per_page";
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

	}
?>
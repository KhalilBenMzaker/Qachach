<?php
	include '../config.php';
	include_once '../Model/panier.php';
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
		function ajouterPanier($id_panier){
			$sql="INSERT INTO panier (id_panier, prixT, id_user, nb_produit,id_produit) 
			VALUES (:id_panier,:prixT,:id_user, :nb_produit,:id_produit)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_panier' => $panier->getid_panier(),
					'prixT' => $panier->getprixT(),
					'id_user' => $panier->getid_user(),
					'nb_produit' => $panier->getnb_produit(),
                    'id_produit' => $panier->getid_produit(),
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
						nb_produit= :nb_produit, 
                        id_produit= :id_produit, 
					WHERE id_panier= :id_panier'
				);
				$query->execute([
					'prixT' => $panier->getprixT(),
					'id_user' => $panier->getid_user(),
					'nb_produit' => $panier->getnb_produit(),
                    'id_produit' => $panier->getid_produit(),
					'id_panier' => $id_panier
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
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

	}
?>
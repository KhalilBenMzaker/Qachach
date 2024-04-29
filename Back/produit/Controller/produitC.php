<?php
	include '../../config.php';
	include_once '../Model/produit.php';
	class ProduitC {

		function afficherproduit(){
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
			$sql="INSERT INTO produit (  id_produit,nom,descriptionn,prix) 
			VALUES ( :id_produit,:nom, :descriptionn,: prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					'id_produit' => $produit->getid_produit(),
					'nom' => $produit->getnom(),
					'descriptionn' => $produit->getdescriptionn(),
					
					'prix' => $produit->getprix()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function recupererproduit($id_produit_produit){
			$sql="SELECT * from produit where id_produit=$id_produit";
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
		
		function modifierproduit($produit, $id_produit){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						id_produit= :id_produit, 
					
						descriptionn= :descriptionn, 
					
						nom= :nom,
						prix= :prix,
						
					WHERE id_produit= :id_produit'
				);
				$query->execute([
					'id_produit' => $produit->getid_produit(),
				
					'nom' => $produit->getnom(),
					'descriptionn' => $produit->getdescriptionn(),		
					'prix'=>$produit->getprix(),
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function rechercherproduit($nom_categorie)
        {
            $requete = "select * from produit where nom_categorie like '%$nom_categorie%'";
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
		function trierproduit(){
			$requete = "select * from produit ORDER BY  prix ASC";
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
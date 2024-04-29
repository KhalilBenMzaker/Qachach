<?php
require_once '../config.php';
include_once '../model/user.php';

class ClientC {
    function afficherclient(){
        $sql="SELECT * FROM user";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }



    function ajouteruser($client){
        $sql="INSERT INTO user ( nom, prenom, adresse_mail,cin, num_tel, password) 
        VALUES ( :nom, :prenom, :adresse_mail, :cin, :num_tel, :password)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                
                'adresse_mail' => $client->getAdresse_mail(),
                'cin' => $client->getCin(),
                'num_tel' => $client->getNum_tel(),
                'password' => $client->getpassword()
                

            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    function supprimerclient($id){
        $sql="DELETE FROM user WHERE id=:id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id', $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }

    function modifierclient($client, $id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    nom= :nom, 
                    prenom= :prenom, 
                    adresse_mail= :adresse_mail, 
                    cin= :cin,
                    num_tel= :num_tel,
                    password= :password

                    
                WHERE id=:id'
            );
            $query->execute([

                
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'adresse_mail' => $client->getAdresse_mail(),
                'cin' => $client->getCin(),
                
                
                'num_tel' => $client->getNum_tel(),
                'password' => $client->getpassword(),
                'id'=> $id
                

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function recupererclient($id){
        $sql="SELECT * from user where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $client=$query->fetch();
            return $client;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    


    

}



    ?>
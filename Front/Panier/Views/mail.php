<?php
session_start();
$email=$_SESSION['mail'];

        ini_set('SMTP','smtp.topnet.tn');
        ini_set('smtp_port',25);
        $dest="yosrabbassi0@gmail.com";
        $corp="Votre commande est en cours de traitement";
        $headers="From: yosr.abbassi@esprit.tn";
        $sujet="Confirmation";
        
  if (mail($dest, $sujet,  $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
  } else {
    echo "Échec de l'envoi de l'email...";
  }
//header("Location:afficherPanier.php");


?>

<?php
//require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row">
  	<div class="col-xl-12">
  		<h1 class="text-center pt-5">Commande</h1>
  		<table class="table table-bordered">
  			<thead>
  				<tr>
					<th>Réference commande
                    <th>Date commande</th>
  					<th>Etat</th>
					  <th>Id panier </th>
  					<th>Mode de paiement</th>
					  <th>Id utilisateur</th>

				</tr>
  			</thead>
  			<tbody>
  				<?php
  				$n=1;
  				?>
                  <tr>
                   <td><?PHP echo  $_POST['ref_commande']; ?></td>
	                 <td><?PHP echo $_POST['date_commande']; ?></td>
	                 <td><?PHP echo $_POST['etat']; ?></td>
	                 <td><?PHP echo $_POST['id_panier']; ?></td>
	                 <td><?PHP echo $_POST['mode_payement']; ?></td>
					 <td><?PHP echo $_POST['id_user']; ?></td>

					</tr>
	              <?php $n++; ?>
<?php
                
              
                
  				?>
  			</tbody>
  		</table>
        <div class="text-center">
        	<button onclick="window.print()" class="btn btn-secondary">Imprimer</button>
        	
        </div>
  	</div>
  </div>
</div>

</body>
</html>

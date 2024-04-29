<?php
	include '../Controller/panierC.php';
	
   
 /* $host = 'localhost';
  $dbname = '9ach';
  $username = 'root';
  $password = '';
  
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  if (isset($_POST['id_user']))
    {
  $sql = "SELECT * FROM panier where `id_user` = $_POST[id_user]";
    }
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
  }catch (PDOException $e){
    echo "$e->getMessage()";
  }
  
	//$reclamationC=new ReclamationC();*/
    $panierC=new PanierC();
    $listePanier=$panierC->afficherpanier(); 
	//$listePanier=$panierC->afficherPanier(); 
    //$email=$_SESSION['email'];
    if(isset($_GET['recherche']))
    {
        $listePanier=$panierC->rechercherpanier2($_GET['recherche']);
    }
    if(isset($_POST['date']))
    {
        $listePanier=$panierC->trierpanier();  
    }
    
?>

<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>9achech</title>


<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="shortcut icon" href="assets/images/logo.png">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

<link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

<link rel="stylesheet" href="assets/css/owl-carousel.css">

<link rel="stylesheet" href="assets/css/lightbox.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
	<body>




    <?php

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page;

$conn=mysqli_connect("localhost","root","","9ach");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(*) FROM panier";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM panier LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn,$sql);

mysqli_close($conn);
?>



		<!-- ***** Preloader Start ***** -->
		<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="http://localhost/ProjetFinaaal/Front/index.html" class="logo">
                        <img src="assets/images/logo.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="http://localhost/ProjetFinaaal/Front/index.html" class="active">Acceuil</a></li>
                        <li class="submenu"
                        ><a href="products.html">Produits</a>
                        <ul>
                            <li><a href="http://localhost/ProjetFinaaal/Front/femme.html">Femme</a></li>
                            <li><a href="http://localhost/ProjetFinaaal/Front/fomme.html">Homme</a></li>
                            <li><a href="http://localhost/ProjetFinaaal/Front/enfant.html">Enfant</a></li>
                            <li><a href="http://localhost/ProjetFinaaal/Front/bebe.html">Bébé</a></li>
                          
                        </ul>
                    </li>
                        <li class="scroll-to-section"><a href="evenement.html">Evénements</a></li>
                        <li class="scroll-to-section">
                            <a href="livraison.html">Livraison</a>
                        </li>
                        
                        <li class="submenu">
                            <a href="javascript:;">Reclamation</a>
                            <ul>
                                <li><a href="ajouterreclamation.html">Envoyer Reclamation</a></li>
                                <li><a href="consulterreclamation.html">Consulter Reclamation</a></li>
                                
                                
                            </ul>
                        </li>
                        
                        <li style="background-color: white; color: black; position: relative; right: 2px;"><a href="inscription.html">Se connecter</a></li>
                    
                        <li class="scroll-to-section">
                        <a href="http://localhost/ProjetFinaaal/Front/Panier/Views/afficherPanier.php">
                        <img src="assets/images/ajouter-un-panier.png" alt=""  height ="30" width="30">
                        </a>
                        </li>

                    </ul>   
                    
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
		<div  style="position:relative; top: 120px;">
	    <button class="btn btn-warning"><a href="ajouter_dansPanier.php">Ajouter au panier</a></button>
		
		<center><h1>Liste des Articles</h1></center>
       
                    <form action="" method="POST">
                        <table >
                            <tr>
                        <td><input type="text"  name="date" hidden value="1"></td>
                        <td><input Type="submit" value="Trier" style="width:200px;"></td>
                      </table>
                    </form>
		<table border="1" align="center" class="table table-dark">
			<tr>
				<th>ID du Panier</th>
				<th>Prix Total</th>
				<th>ID Produit</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				while($panier = mysqli_fetch_array($res_data)){
			?>
			<tr>
				<td><?php echo $panier['id_panier']; ?></td>
				<td><?php echo $panier['prixT']; ?></td>
				<td><?php echo $panier['id_produit']; ?></td>
				
				<td>
					<form method="POST" action="modifierPanier.php">
						<input class="btn btn-primary" type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $panier['id_panier']; ?> name="id_panier">
					</form>
				</td>
                <td>
					<a href="Supprimer_duPanier.php?id_panier=<?php echo $panier['id_panier']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
        <nav>
        <div class="row">
                <ul class="pagination">
            <li><a href="?pageno=1">First</a></li>
            <li></li>
            
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</li>
            </ul>
                </nav>
        <button class="btn btn-warning"><a href="ajouterCommande.php">Confirmer la commande</a></button>


 
</div>
	

<footer style="margin-top:200px;">
    <div class="container"  ">
        <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                    <div class="logo">
                        <img src="assets/images/white-logo.png" alt="">
                    </div>
                    <ul>
                        <li><a href="#">Petite Ariana, Tunisie</a></li>
                        <li><a href="#">9achech@esprit.tn</a></li>
                        <li><a href="#">+216 71 546 008</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>Shopping &amp; Categories</h4>
                <ul>
                    <li><a href="homme.html">Homme</a></li>
                    <li><a href="femme.html">Femme</a></li>
                    <li><a href="enfant.html">Enfant</a></li>
                    <li><a href="bebe.html">Bébé</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Liens Utiles</h4>
                <ul>
                    <li><a href="http://localhost/ProjetFinaaal/Front/index.html">Acceuil</a></li>
                    <li><a href="#">A propos de <i>9achech</i></a></li>
                    <li><a href="#">Aide</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Help &amp; Information</h4>
                <ul>
                    <li><a href="inscription.html">S'inscrire</a></li>
                    <li><a href="ajouterreclamation.html">Reclamation</a></li>
                    <li><a href="evenement.html">Evénements</a></li>
                    <li><a href="livraison.html">Livraison</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2022 9achech Co., Ltd. All Rights Reserved. 
                  
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/slick.js"></script> 
<script src="assets/js/lightbox.js"></script> 
<script src="assets/js/isotope.js"></script> 

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
        setTimeout(function() {
          $("."+selectedClass).fadeIn();
          $("#portfolio").fadeTo(50, 1);
        }, 500);
            
        });
    });

</script>
	</body>
</html>

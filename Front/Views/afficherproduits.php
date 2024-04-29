<<?php
	include '../Controller/produitC.php';
	$produitC=new produitC();
	//$listeproduits=$produitC->afficherproduits(); 
    if(isset($_GET['recherche']))
    {
        $listeproduits=$produitC->rechercherproduit($_GET['recherche']);
    }
    else if(isset($_POST['categorie']))
    {
        $listeproduits=$produitC->trierproduit($produit);  
    }
    else{
	$listeproduits=$produitC->afficherproduits(); 
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <style>
        table.table.table-dark {
            width: 50%;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>9achech</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
  
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="../index.html" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.html" class="active">Acceuil</a></li>
                            <li class="submenu"
                            ><a href="products.html">Produits</a>
                            <ul>
                                <li><a href="femme.html">Femme</a></li>
                                <li><a href="homme.html">Homme</a></li>
                                <li><a href="enfant.html">Enfant</a></li>
                                <li><a href="bebe.html">Bébé</a></li>
                              
                            </ul>
                        </li>
                            <li class="scroll-to-section"><a href="./afficherproduits.php">Evénements</a></li>
                            <li class="scroll-to-section">
                                <a href="./login/index.html">Livraison</a>
                            </li>
                            
                            <li class="submenu">
                                <a href="javascript:;">Reclamation</a>
                                <ul>
                                    <li><a href="./login/index.html">Envoyer Reclamation</a></li>
                                    <li><a href="./login/index.html">Consulter Reclamation</a></li>
                                    
                                    
                                </ul>
                            </li>
                            
                            <li style="background-color: white; color: black; position: relative; right: 2px;"><a href="./login/index.html">se connecter</a></li>
                        
                            <li class="scroll-to-section">
                            <a href="./login/index.html">
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
    

	  <button><a href="ajouterproduit.php">Ajouter un produit</a></button>
	
		<center><h1>Liste des produits</h1></center>
        <div class="text-center">
        	<button onclick="window.print()" class="btn btn-secondary">Imprimer</button>
        	
        </div>
        <button type="submit" class="btn btn-success" style="width: 200px;" onclick="location.href= '../stat.php'">Statistiques des produits</button>
        </nav>
        <div id="google_translate_element"></div>
         <script type="text/javascript">
             function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
             }
         </script>

         <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <form action="" method="GET"> 
                        <table style=" position:relative;top:px;">
                        <tr>
                        <td><input type="research" placeholder="Rechercher" name="recherche" ></td>
                        <td><input Type="submit" value="Rechercher"></td>
                      </table>
                    </form>
                    <form action="" method="POST">
                        <table >
                            <tr>
                        <td><input type="text"  name="categorie" hidden value="1"></td>
                        <td><input Type="submit" value="Trier" style="width:200px;"></td>
                      </table>
                    </form>
            
                    </form>
		<table class="table table-dark" border="1" align="center" style="width:- 20px; ">
			<tr>
				<th>id_produit</th>
			
				<th>descriptionn</th>
				<th>prix</th>
                <th>imagee</th>
                <th>nom_categorie</th>
           
				
			</tr>
			<?php
				foreach($listeproduits as $produit){
			?>
			<tr>
                <td><?php echo $produit['id_produit']; ?></td>
		    
				<td><?php echo $produit['descriptionn']; ?></td>
				<td><?php echo $produit['prix']; ?></td>
                <td>
                    <img src="<?php echo 'upload/'. $produit['imagee']; ?>" width='90' height='90' alt="yyyy"> <?php echo 'upload/'. $produit['imagee']; ?>
                    <a  target=”_blank” href="./upload/<?php echo $row['file']; ?>">Imagee </a></td>

                <td><?php echo $produit['nom_categorie']; ?></td>
				
				<td>
					<form method="POST" action="modifierproduit.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $produit['id_produit']; ?> name="id_produit">
					</form>
				</td>
				<td>
                <a href="supprimerproduit.php?id_produit=<?php echo $produit['id_produit']; ?>">Supprimer</a>
				</td>
			</tr>
				
				
				
			</tr>
			<?php
				}
			?>
		</table>
        
	
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="" >
                        </div>
                        <ul>
                            <li><a href="https://goo.gl/maps/QTWZKmixveMGVW4v5">Petite Ariana, Tunisie</a></li>
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
                        <li><a href="index.html">Acceuil</a></li>
                        <li><a href="#aboutUs">A propos de <i>9achech</i></a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="inscription.html">S'inscrire</a></li>
                        <li><a href="ajouterreclamation.html">Reclamation</a></li>
                        <li><a href="produit.html">Evénements</a></li>
                        <li><a href="livraison.html">Livraison</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                    <li><a href="#"><i class="zahra"></i></a></li>
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

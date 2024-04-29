
<?php
    include_once '../Model/Panier.php';
    include_once '../Controller/PanierC.php';
    include_once '../Controller/userC.php';
    include_once '../Model/user.php';
    include_once '../Controller/produitC.php';
    include_once '../Model/produit.php';

    $error = "";
    $erroridP="";
    // create panier
    $panier = null;

    // create an instance of the controller
    $panierC = new PanierC();
    if (
        isset($_POST["id_panier"]) &&
		isset($_POST["prixT"]) &&		
        isset($_POST["id_user"]) &&
		isset($_POST["id_produit"])
    ) {
        if (
            !empty($_POST["id_panier"]) && 
			!empty($_POST['prixT']) &&
            !empty($_POST["id_user"]) && 
			!empty($_POST["id_produit"])
        ) {
            $panier = new Panier(
                $_POST['id_panier'],
				$_POST['prixT'],
                $_POST['id_user'], 
				$_POST['id_produit']
            );
            $panierC->ajouterPanier($panier);
            header('Location:afficherPanier.php');
        }
        else{
            $error = "Missing information";
            if(empty($_POST["id_panier"])){
                $erroridP='<p id="errorIDP" class="error"></p>';
            }
        }
           
    }
    $userC= new ClientC();
    $resultat1=$userC->afficherclient();
    $produitC= new produitC();
    $resultat2=$produitC->afficherproduits();

    
?>
<html lang="en">
<head>

    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
    <link rel="apple-touch-icon" href="images/logo.png">
    <link rel="shortcut icon" href="images/logo.png">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/verif.js"> </script>
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    

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


   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        form {
            width: 50%;
            margin: 0px 350px;
            margin-top:150px;
        }
        .error{
            color: red;
        }
    </style>
	</head>
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
<body>
        <button><a href="afficherPanier.php">Retour à la liste des paniers</a></button>
        <hr>
        
       
        <form action="" method="POST">
                    <div class="form-group">
                        <label for="id_panier" class=" form-control-label">ID panier</label>
                        
                        <input type="number" name="id_panier" id="id_panier" maxlength="20" placeholder="Enter your id event" class="form-control"></div>
                        <p id="errorIDP" class="error"></p>
                    <div class="form-group">
                        <label for="prixT" class=" form-control-label">Prix Produit</label>
                        <input type="number" name="prixT" id="prixT" placeholder="Prix" class="form-control"></div>
                        <p id="errorPT" class="error"></p>
                        
                    <div class="form-group">
                        <label for="id_user" class=" form-control-label">Id user</label>
                        <select name="id_user" id="id_user" requied>
                            <option value=""> Choose an option </option>
                            <?php foreach ($resultat1 as $value) {
                      ?>
                        <option value="<?php echo($value["id"])?>"> <?php echo($value["nom"])?></option>
                    <?php }?>
                    </select>
                        <p id="errorIDU" class="error"></p>
                    </div>
                   
                    <div class="form-group">
                        <label for="id_produit" class=" form-control-label">Id produit</label>
                        <select name="id_produit" id="id_produit" requied>
                            <option value=""> Choose an option </option>
                            <?php foreach ($resultat2 as $value) {
                      ?>
                        <option value="<?php echo($value["id_produit"])?>"> <?php echo($value["id_produit"])?></option>
                    <?php }?>
                    </select>
                        <p id="errorIDProd" class="error"></p>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Envoyer" onclick="verif()">
                    <input class="btn btn-warning" type="reset" value="Annuler" > 
                </form>
                <?php echo $erroridP; ?>

                <script>
                    $panierC1 = new PanierC();
                    $panierC1->chercherUser($_POST['id_user']);
                    if($panierC1===NULL)
                    document.getElementById("errorIDU").innerHTML=("User inexistant");
                </script>
               
    </body>
<footer style="margin-top:200px;">
    <div class="container"  >
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

</html>



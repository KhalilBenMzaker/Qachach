
<?php
    include_once '../Model/produit.php';
    include_once '../Controller/produitC.php';
    include_once '../../Back/produit/Model/categorie.php';
    include_once '../../Back/produit/Controller/categorieC.php';
    

    $error = "";

    // create adherent
    $produit = null;
    // create an instance of the controller
    $produitC = new produitC();
    if(isset($_FILES['imagee'])){
        $tmpName = $_FILES['imagee']['tmp_name'];
        $name = $_FILES['imagee']['name'];
        $size = $_FILES['imagee']['size'];
        $error = $_FILES['imagee']['error'];
        move_uploaded_file($tmpName, './upload/'.$name);
}
    if (
        isset($_POST["id_produit"]) &&
		
        isset($_POST["descriptionn"]) &&
		isset($_POST["prix"]) &&
        isset($_POST["imagee"]) &&
        isset($_POST["nom_categorie"]) 
        
    
        
    ) {
        
        if (
            !empty($_POST["id_produit"]) && 
		
            !empty($_POST["descriptionn"]) && 
			!empty($_POST["prix"])&&
            !empty($_POST["imagee"])&&
            !empty($_POST["nom_categorie"])
            
        ) {
            $produit = new produit(
                $_POST['id_produit'],
			
                $_POST['descriptionn'], 
				$_POST['prix'],
                $_POST['imagee'],
                $_POST['nom_categorie']
               
            );
            $produitC->ajouterproduit($produit);
            header('Location:afficherproduits.php');
        }
        else
            $error = "Missing information";
    }

    $categorieC=new categorieC();
    $resultats =$categorieC->affichercategorie();
?>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>9ach</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
    <body>
        <button><a href="afficherproduits.php">Retour à la liste des produits</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="ajouterproduit.php" method="POST" 
                        <label for="id_produit" class=" form-control-label">Id produit</label>
                        
                        <input type="number" name="id_produit" id="id_produit" maxlength="20" placeholder="Enter your product id" class="form-control"></div>
             
                    <div class="form-group">
                        <label for="descriptionn" class=" form-control-label">descriptionn</label>
                        <input type="text" name="descriptionn" id="descriptionn" placeholder="Enter descriptionn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prix" class=" form-control-label">prix</label>
                        <input type="number" name="prix" id="prix"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="imagee class=" form-control-label">imagee</label>
                        <input type="file" name="imagee" id="imagee" placeholder="Enter photo" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="nom_categorie">categories</label>
<select name="nom_categorie" id="nom_categorie" required>
                  <option value="">choose an option</option>
                    <?php foreach ($resultats as $value) {
                      ?>
    <option value="<?php echo($value["nom_categorie"])?>"> <?php echo($value["nom_categorie"])?></option>

  <?php }?>

</select>
                    </div>
                 
                 
                  
                    <input type="submit" value="Envoyer">
                    <input type="reset" value="Annuler" > 
                </form>
    </body>
</html>






























    
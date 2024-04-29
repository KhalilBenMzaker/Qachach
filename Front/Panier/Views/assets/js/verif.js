function verif()
{
   
   var n=document.getElementById('id_panier').value;
   var p=document.getElementById("prixT").value;
   var m=document.getElementById("id_user").value;
   var c=document.getElementById("id_produit").value;
   //document.getElementById("errorPR").innerHTML="<p>"+p+"</p>"
   //document.getElementById("errorCR").innerHTML="<p>"+c+"</p>"
   if(n=="")
   document.getElementById("errorIDP").innerHTML=("*Required");

   if(p=="")
   document.getElementById("errorPT").innerHTML=("*Required");

   if(m=="")
   document.getElementById("errorIDU").innerHTML=("*Required");


   if(c=="")
   document.getElementById("errorIDProd").innerHTML=("*Required");

   

}

<script language="JavaScript">
function surligne(champ, erreur)
{
   if(erreur)
      champ.style.borderColor = "#fba";
   else
      champ.style.borderColor = "#00ff36";
}
function verifnom(champ)

{
   var regex = /^[a-zA-Zç][a-zç]+[a-zA-Zç][a-zç]+([0-9]{1,4}@DIF+)+([ -'\s][a-zA-Z][a-z]+)?$/;
   if(!regex.test(champ.value))

   {

      surligne(champ, true);

      return false;

   }
  

   else

   {

      surligne(champ, false);

      return true;

   }
  }
  function verifpassword(champ)

{
   var regex = /^Only[0-9]{1,3}DIF/;
   if(!regex.test(champ.value))

   {

      surligne(champ, true);

      return false;

   }  
   

   else

   {

      surligne(champ, false);

      return true;

   }
  }
  function verifForm(f)
{
   var nomOk = verifnom(f.nom);
   var passwordOk = verifpassword(f.password);
   if(nomOk && passwordOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

</script>
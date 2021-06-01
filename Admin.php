
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/full-width-pics.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style2.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Panneau administrateur QLXI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions
        </a>
          <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>-->
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center">
  <h1 class="mt-5 text-white font-weight-light">Bienvenue dans le pannel d'administration de Quartier Libre XI.</h1>
  <p class="lead text-white-50"></p>
  <html>
    <head>
        <meta charset="UTF-8" >
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    
    <body>
<center>
<p>
  <p>
    <p>
  <p>
    <p>
  <p>
<?php

        echo "<h2>Gestion des enfants</h2>";
        $serveur ="localhost";
        $bdd = "qlxi";
        $user="root" ;
        $mdp="";
        //connexion au serveur
        $connexion = mysqli_connect($serveur, $user, $mdp);
        $requete ="SELECT IdEnfant,enfant.nom as Nom, prenom,ecole.nom AS ecole, classe.libelle AS classe, IdClasse, IdEcole FROM classe, enfant, ecole WHERE classe.id_classe = enfant.idclasse;";
        mysqli_select_db($connexion, $bdd); 
        $resultats = mysqli_query($connexion, $requete);
        echo"<table border -1";
        echo "<tr><th> Nom </th>
              <th> Prenom</th>
              <th> Ecole</th>
              <th> Classe</th>
              <th> Editer</th>
              <th> Supprimer</th></tr>";
        while ($ligne = mysqli_fetch_assoc($resultats))
            {
                echo "<tr><td>" .$ligne["Nom"]. "</td>
                <td>" .$ligne["prenom"]. "</td>
                <td>" .$ligne["ecole"]. "</td>
                <td>" .$ligne["classe"]. "</td>
                <th>
                  <a href='Edit.php?IdEnfant=".$ligne["IdEnfant"]."&Nom=".$ligne["Nom"]."&Prenom=".$ligne["prenom"]."&ecole=".$ligne["ecole"]."&classe=".$ligne["classe"]."&IdEcole=".$ligne["IdEcole"]."&IdClasse=".$ligne["IdClasse"]."'>
                    <img src='img/icons8-crayon-64.png' alt='Editer'/>
                  </a>
                </th>
                <th>
                <a href=admin.php?Supprimer=1&IdEnfant=".$ligne["IdEnfant"].">
                    <img src='img/icons8-effacer-64.png' alt='Supprimer'/>
                  </a></th>";

            }    
        echo"</table>";
            mysqli_close($connexion);

?>
<p>
  <p>
    <p>
  <p>
    <p>
  <p>
    <div class="int1">
      <?php
      $serveur ="localhost";
      $bdd ="qlxi";
      $user ="root";
      $mdp="";
      $connexion = mysqli_connect($serveur, $user, $mdp);
      mysqli_select_db($connexion, $bdd);
      $requete ="select * from enfant ;";
      $resultats = mysqli_query($connexion, $requete);
      ?>
      
      <table border =0>
      <form method="post">

      <tr><td><font color="black"> Nom de l'enfant :</font></td><td><input type="text" name="Nom"></td></tr>
      <tr><td><font color="black"> Prénom de l'enfant :</font></td><td><input type="text" name="Prenom"></td></tr>
       <div><tr><td><label for="idselect"><font color="black">Classe :</label></div>
        <select name="Classe" id="idselect">
          <option value="0"selected="selected=">Faites votre choix</option>
          <option value="1">6éme</option>
          <option value="2">5éme</option>
          <option value="3">4éme</option>
          <option value="4">CM2</option>
          <option value="5">3eme</option>
          <option value="6">CM1</option>
          <option value="7">CE2</option>
          <option value="8">CE1</option>
          <option value="9">CP</option>
          <option value="10">Seconde</option>
          <option value="11">Premiere</option>
          <option value="12">Terminal</option>
        </select>
       <div><tr><td><label for="idselect">Ecole :</label>
        <select name="Ecole" id="idselect">
          <option value="0"selected="selected=">Faites votre choix</option>
          <option value="1">Parmentier</option>
          <option value="2">Belleville</option>
        </select></div>
      </td></tr>

      <tr><td> <input type="reset" name="Annuler" value ="Annuler"></td>
      <td><input type="submit" name="Valider" value ="Valider"></td></tr>
      </form>
      </table>
    </div>
    <?php
    if (isset($_POST["Valider"]))
    {
      //connexion au serveur

      $Nom = $_POST["Nom"];
      $Prenom = $_POST["Prenom"];
      $Classe = $_POST["Classe"];
      $Ecole = $_POST["Ecole"];
      
      
      
      $requete = "insert into enfant values('0', '$Nom', '$Prenom', '$Classe','$Ecole');";
      echo $requete;
      $resultats = mysqli_query($connexion,$requete);
      echo "Insertion reussi de l'enfant ".$Nom."";

      mysqli_close($connexion);
    }
    if (isset($_POST["Modifier"]))
    {
      // var_dump($_POST);die();
      $IdEnfant = $_POST["IdEnfant"];
      $Nom = $_POST["Nom"];
      $Prenom = $_POST["Prenom"];
      $Classe = $_POST["Classe"];
      $Ecole = $_POST["Ecole"];
      //$requete="UPDATE 'enfant' SET 'Nom' = '$Nom', 'Prenom' = '$Prenom', 'Adresse' = '$Adresse', 'CodePostal' = $CodePostal WHERE 'IdEnfant'=$IdEnfant";
      $requete ="UPDATE `enfant` SET `Nom`='$Nom',`Prenom`='$Prenom',`IdEcole.`='$Ecole.',`IdClasse`=$Classe WHERE `IdEnfant` =$IdEnfant";
      echo $requete;
      // var_dump($requete);die();
  
      $resultats = mysqli_query($connexion, $requete);
      print_r($resultats);     
       mysqli_close($connexion);

      echo "Modification reussi de l'enfant ".$Nom."";

    }
  if (isset($_GET["Supprimer"]))
    {  
      $IdEnfant= $_GET["IdEnfant"];
      $requete="delete from enfant where IdEnfant=".$IdEnfant.";";        
      $resultats = mysqli_query($connexion, $requete);
      echo "Suppression réussite de l'enfant avec l'id de enfant=".$IdEnfant."";
      mysqli_close($connexion);

    }

?>

<p img src="https://img.icons8.com/color/48/000000/ms-excel.png"/>
    
    </body>
</html>    
</div>
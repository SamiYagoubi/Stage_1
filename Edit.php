
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/full-width-pics.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style2.css">    

    </head>
    <body>
        <div class="int1">
        <?php
        $serveur = "localhost";
        $bdd = "qlxi";
        $user="root" ;
        $mdp="";
        $connexion = mysqli_connect($serveur, $user, $mdp);
        mysqli_select_db($connexion, $bdd);
        $requete = "select * from enfant ;";
        $resultats = mysqli_query($connexion, $requete);
        $IdEnfant=$_GET['IdEnfant'];
        $Nom=$_GET['Nom'];
        $Prenom=$_GET['Prenom'];
        $ecole=$_GET['ecole'];
        $IdClasse=$_GET['IdClasse'];
        $classe=$_GET['classe'];
        $IdEcole=$_GET['IdEcole'];

        ?>
        <center>
            <h2> Modification d'un enfant </h2>
        </br></br>
        <table border =0>
        <form method="post" action="admin.php">
      <tr><td><input type="hidden" name="IdEnfant" value="<?php echo $IdEnfant ?>"</td></td>    
      <tr><td><font color="black"> Nom de l'enfant :</font></td><td><input type="text" name="Nom" value="<?php echo $Nom ;?>"></td></tr>
      <tr><td><font color="black"> Prénom de l'enfant :</font></td><td><input type="text" name="Prenom" value="<?php echo $Prenom ;?>"></td></tr>
      <tr><td><label for="idselect">Ecole :</label>
        <select name="Ecole" id="idselect">
          <option value="<?php echo $IdEcole; ?>"selected="selected="><?php echo $ecole; ?></option>
          <option value="1">Parmentier</option>
          <option value="2">Belleville</option>
        </select>
      </td></tr>      <tr><td><label for="idselect">Classe :</label>
        <select name="Classe" id="idselect">
          <option value="<?php echo $IdClasse; ?>"selected="selected="><?php echo $classe; ?></option>
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
      <tr><td><a href="Admin.php"><input type="button" name="Annuler" value ="Annuler"></a>
      <td><a href="Admin.php"><input type="submit" name="Modifier" value ="Modifier"></td></tr></a>
      </form>
      </table>
    </form>
</table>
</div>
<?php
?>
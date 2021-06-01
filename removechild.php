
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
        ?>
        <center>
            <h2> Suppression d'un enfant </h2>
        </br></br>
        <table border =0>
        <form method="post" action="removechild.php">

        <tr><td><font color="black">  Id de l'enfant :</font></td><td><input type="text" name="IdEnfant"></td></tr>
        <tr><td> <input type="reset" name="Annuler" value="Annuler"></td>
        <td>  <input type="submit" name="Supprimer" value ="Supprimer" href="Admin.php"></td></tr>
    </form>
</table>
</div>
<?php
        

        if (isset($_POST["Supprimer"]))
            {
        
       
        $IdEnfant= $_POST["IdEnfant"];
        $requete="delete from enfant where IdEnfant=".$IdEnfant.";";
        
        $resultats = mysqli_query($connexion, $requete);
        echo "Suppression réussite de l'enfant avec l'id de enfant=".$IdEnfant."";
            mysqli_close($connexion);
            }

?>
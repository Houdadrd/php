<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post">
        <!-- ComboBox pour afficher les classes -->
        <h1>Les classes:</h1>
        <select name="classe">
        <?php
        include("connexion.php");
            $sql = "SELECT * FROM classe";
            $res = mysqli_query($con,$sql);

            if ($res->num_rows > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<option value='" . $row["code"] . "'>" . $row["nom"] . "</option>";
                }
            } else {
                echo "0 résultats";
            }
        ?>
        </select>
        <input type="submit" value="Submit">
</form>
<?php
           include("connexion.php");
           // 3. Récupération du code de la classe sélectionnée via POST
           if(isset($_POST['classe'])) {
               $classe_code = $_POST['classe'];
       
               echo "<h1>Les étudiants de la classe:</h1>
               <table border='1'>
               <tr>
                   <th>ID</th>
                   <th>Nom</th>
                   <th>Prénom</th>
               </tr>";
               
               $sql = "SELECT id, nom, prenom FROM etudiant WHERE code_classe = '$classe_code'"; 
               $result = mysqli_query($con, $sql); 
               if ($result->num_rows > 0) {
                   while($row = mysqli_fetch_assoc($result)) {
                       echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["prenom"] . "</td></tr>";
                   }
               } else {
                   echo "<tr><td colspan='3'>Aucun étudiant trouvé dans cette classe</td></tr>";
               }
               echo "</table>";        
           }
    ?>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "worldcup";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

?>
<?php
// Exécuter une requête SQL pour récupérer les équipes

$result = $conn->query("SELECT g.nom AS nom_groupe, GROUP_CONCAT(e.nom_equipe) AS equipes_du_groupe
FROM groupes g
JOIN equipe e ON g.id = e.id_groupe
where g.nom='A'
GROUP BY g.nom");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes Nationales</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Add this inside the head tag of your HTML file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script></head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<body class="h-auto" style="width: 100% !important;background-image:url(./worldcup/LOGO/back.jpeg);background-size: cover;background-position: center; background-repeat: no-repeat;">
    <section>
        <div class="cup d-flex justify-content-between align-items-center " style="width: 80% ">
            <div class="image" style="width: 30% ">
                <img  src="worldcup/LOGO/LOGO.png" alt="logo" class="w-100  ">
            </div>
            <div class="fifa text-start" style="width: 30%;">
                <h1 class="  text-white fs-3 w-100 ">FIFA WORLD CUP <strong style="font-family:Agbalumo !important;">MOROCCO<span class="text-success">2030</span></strong></h1>
            </div>
        </div>
    </section>
<!-- button filtage  -->
<section class="w-100">
<div class=" mt-5 d-flex flex-wrap justify-content-center gap-1">
         <form action="" method="POST">
         <button class="btn btn-primary px-3 " name="A" type="button">ALL GROUPE</button>
          <button  class="btn btn-primary btn-group"  name="B" type="button" >GROUPE A</button>
          <!-- <button class="btn btn-primary " type="button">GROUPE B</button>
          <button class="btn btn-primary " type="button">GROUPE D</button>
          <button class="btn btn-primary " type="button">GROUPE C</button>
          <button class="btn btn-primary " type="button">GROUPE D</button>
          <button class="btn btn-primary " type="button">GROUPE E</button>
          <button class="btn btn-primary " type="button">GROUPE F</button>  
          <button class="btn btn-primary " type="button">GROUPE G</button>
          <button class="btn btn-primary " type="button">GROUPE H</button> -->
         </form>
        </div>
        
           </section>
<!-- fin button  -->

<!-- Affichage des cartes d'équipes -->
<!-- Affichage des cartes d'équipes -->
<section>
    <div class="container mt-5 d-flex flex-wrap justify-content-center gap-5">
        <?php
        // Vérifiez si la requête a renvoyé des résultats
        if ($result->num_rows > 0) {
            // Parcourez les résultats de la requête
            while ($row = $result->fetch_assoc()) {
                $nom_groupe = $row["nom_groupe"];
                $equipes_du_groupe = $row["equipes_du_groupe"];

                // Div pour chaque carte d'équipe Bootstrap
                echo '<div class="card" style="width: 18rem;">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $nom_groupe . '</h5>';
                echo '<p class="card-text">' . $equipes_du_groupe . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // Aucune équipe n'a été trouvée
            echo '<p>Aucune équipe trouvée.</p>';
        }
        ?>
    </div>
</section>

<!-- Inclusion du script Bootstrap JS et jQuery -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script> 

</body>
</html>













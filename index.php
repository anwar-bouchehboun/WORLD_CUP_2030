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

// Execute an SQL query to retrieve the teams
$result = $conn->query("SELECT g.nom AS nom_groupe, GROUP_CONCAT(CONCAT(e.nom_equipe, ' - ', e.logo)) AS equipes_du_groupe
 FROM groupes g JOIN equipe e ON g.id = e.id_groupe GROUP BY g.nom;");

// Check if the query was successful
if (!$result) {
    die("Erreur d'exécution de la requête : " . $conn->error);
}
?>
<?php
// Exécuter une requête SQL pour récupérer les équipes
$result = $conn->query("SELECT g.nom AS nom_groupe, GROUP_CONCAT(e.nom_equipe) AS equipes_du_groupe
FROM groupes g
JOIN equipe e ON g.id = e.id_groupe
GROUP BY g.nom");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes Nationales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Add this inside the head tag of your HTML file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script></head>
<body>

<!-- Affichage des cartes d'équipes -->
<div class="container mt-5 d-flex flex-wrap justify-content-center gap-5 " >
<?php
// Exécuter une requête SQL pour récupérer les équipes avec les logos
$result = $conn->query("SELECT g.nom AS nom_groupe, GROUP_CONCAT(CONCAT(e.nom_equipe, ' - ', e.logo)) AS equipes_du_groupe
FROM groupes g
JOIN equipe e ON g.id = e.id_groupe
GROUP BY g.nom");
?>

<?php
while ($row = $result->fetch_assoc()) :
    $equipes = explode(',', $row['equipes_du_groupe']);
?>

    <div>
        <div class="card mb-4" style="width: 15rem;">
            <div class="text-center fs-3 bg-success"><h3 style="color: #fff;">GROUPE <?= $row['nom_groupe'] ?></h3></div>
            <div class=" text-center  mx-auto  w-100" style="background-color: #32ff7e;">
                <?php for ($i = 0; $i < count($equipes); $i++) :
                    list($nomEquipe, $logo) = explode(' - ', $equipes[$i]);
                ?>
                    <div class="d-flex" style="margin-left: 10%;">
                        <div class="">                  
                              <img src="<?php echo $logo; ?>" alt="Logo" class="mr-2 " style="max-width: 40px; max-height: 40px;">
                        </div>
                        <div>
                        <p class="   mt-1 fs-5"><?= $nomEquipe ?></p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<!-- Inclusion du script Bootstrap JS et jQuery -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script> 

</body>
</html>













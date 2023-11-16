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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Add this inside the head tag of your HTML file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script></head>

<body class="" style="width: 100% !important;background-image:url(./worldcup/LOGO/back.jpeg);background-size: cover;background-position: center; background-repeat: no-repeat;">
    <section>
        <div class="cup d-flex justify-content-between align-items-center " style="width: 80% ">
            <div class="image" style="width: 30% ">
                <img  src="worldcup/LOGO/LOGO.png" alt="logo" class="w-50  ">
            </div>
            <div class="fifa text-start" style="width: 30%;">
                <h1 class="  text-white fs-3 w-100 ">FIFA WORLD CUP <strong style="font-family:Agbalumo !important;">MOROCCO<span class="text-success">2030</span></strong></h1>
            </div>
        </div>
    </section>
<!-- button filtage  -->
<section class="w-75 mx-auto">
<div class=" mt-1 d-flex flex-wrap justify-content-center gap-1">
         <form action="" method="POST" class="mb-4">
          <input type="submit" class="btn btn-primary px-3 " value="ALL GROUPE" name="ALL" id="all"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE A" name="A" id="GA"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE B" name="B" id="GB"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE C" name="C" id="GC"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE D" name="D" id="GD"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE E" name="E" id="GE"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE F" name="F" id="GF"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE G" name="G" id="GG"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUPE H" name="H" id="GH"/>

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
        <!-- A -->
        <?php
if (@$_POST['A']) {
    $idG = 1;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE A</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
<!-- B -->
 <?php
if (@$_POST['B']) {
    $idG = 2;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE B</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
<!-- C -->
<?php
if (@$_POST['C']) {
    $idG = 3;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE B</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
<!-- D -->
<?php
if (@$_POST['D']) {
    $idG = 4;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE B</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
<!-- E -->
<?php
if (@$_POST['E']) {
    $idG = 5;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE B</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
<!-- F -->
<?php
if (@$_POST['F']) {
    $idG = 6;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE B</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
<!-- G -->
<?php
if (@$_POST['G']) {
    $idG = 7;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE B</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
<!-- H -->
<?php
if (@$_POST['H']) {
    $idG = 8;
    $sql = "SELECT e.nom_equipe, e.logo,e.continent FROM equipe e WHERE e.id_groupe = $idG";
    $req = mysqli_query($conn, $sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            
            <th scope="col">GROUPE B</th>
            <th scope="col">CONTIENT</th>
            <th scope="col">Point</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                
                <td><img src="<?php echo $row['logo']; ?>" alt="Logo" style="max-width: 40px; max-height: 40px;">
<?php echo $row['nom_equipe']; ?></td>
                <td><?php echo $row['continent']; ?></td>
                <td>0</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>

<?php
}
?>
           </section>
<!-- fin button  -->

<!-- Affichage des cartes d'équipes -->
<!--  -->

<?php
    $result = $conn->query("SELECT g.nom AS nom_groupe, GROUP_CONCAT(CONCAT(e.nom_equipe, ' - ', e.logo)) AS equipes_du_groupe
    FROM groupes g
    JOIN equipe e ON g.id = e.id_groupe
    GROUP BY g.nom");
?>
<section>
    <div id="groups" class="container mt-5 d-flex flex-wrap justify-content-center gap-5">

        <?php
        while ($row = $result->fetch_assoc()) :
            $equipes = explode(',', $row['equipes_du_groupe']);
        ?>

            <div>
                <div class="card mb-4 p-2" style="width: 15rem;">
                    <div class="text-center fs-3 bg-white"><h3 style="color: #001C30;">GROUPE <?= $row['nom_groupe'] ?></h3></div>
                    <div class="text-center w-100 rounded-2">
                        <?php for ($i = 0; $i < count($equipes); $i++) :
                            list($nomEquipe, $logo) = explode(' - ', $equipes[$i]);
                        ?>
                            <div class="d-flex my-1 py-2 rounded-2 border" style="background-color:#001B79">
                                <div>
                                    <img src="<?php echo $logo; ?>" alt="Logo" class="mr-2" style="max-width: 40px; max-height: 40px;">
                                </div>
                                <div>
                                    <p class="text-white fs-4 m-0"><?= $nomEquipe ?></p>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</section>
<!-- Inclusion du script Bootstrap JS et jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script> 

</body>
</html>













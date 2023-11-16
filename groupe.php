<?php
include'./PHP_Sql/cnx.php'
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
<style>
    .hideGroup{
        display: none !important;
       
    }
</style>
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
<div class=" mt-1">
         <form  method="GET" class="mb-4  d-flex flex-wrap justify-content-center gap-2">
          <input type="submit" class="btn btn-primary px-3 " value="ALL GROUP" name="ALL" id="all"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUP A" name="A" id="G" />
          <input type="submit" class="btn btn-primary btn-group" value="GROUP B" name="B" id="G"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUP C" name="C" id="G"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUP D" name="D" id="G"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUP E" name="E" id="G"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUP F" name="F" id="G"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUP G" name="G" id="G"/>
          <input type="submit" class="btn btn-primary btn-group" value="GROUP H" name="H" id="G"/>
         </form>
        </div>
        <!-- A -->
        <?php
        include'PHP_Sql/GA.PHP'
        ?>
<!-- B -->
<?php
        include'PHP_Sql/GB.PHP'
        ?>
<!-- C -->
<?php
        include'PHP_Sql/GC.PHP'
        ?>
<!-- D -->
<?php
        include'PHP_Sql/GD.PHP'
        ?>
<!-- E -->
<?php
        include'PHP_Sql/GE.PHP'
        ?>
<!-- F -->
<?php
        include'PHP_Sql/GF.PHP'
        ?>
<!-- G -->
<?php
        include'PHP_Sql/GG.PHP'
        ?>
<!-- H -->
<?php
        include'PHP_Sql/GH.PHP'
        ?>

           </section>
<!-- fin button  -->

<!-- Affichage des cartes d'équipes -->
<!--  -->


<section>
<?php
    $result = $conn->query("SELECT g.nom AS nom_groupe, GROUP_CONCAT(CONCAT(e.nom_equipe, ' - ', e.logo)) AS equipes_du_groupe
    FROM groupes g
    JOIN equipe e ON g.id = e.id_groupe
    GROUP BY g.nom");
?>
    <div id="groupe" class=" container mt-5 d-flex flex-wrap justify-content-center gap-5">

        <?php
        while ($row = $result->fetch_assoc()) :
            $equipes = explode(',', $row['equipes_du_groupe']);
        ?>

            <div>
                <div  class="card mb-4 p-2" style="width: 15rem;">
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

        <?php endwhile; 
           $conn->close();?>
    </div>
</section>


<!-- Inclusion du script Bootstrap JS et jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script> 
<script src="js.js"></script>
</body>
</html>













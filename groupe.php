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
          <?php 
              include'PHP_Sql/button.php'
          ?>
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
                include'PHP_Sql/affiche.php'
                ?>
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













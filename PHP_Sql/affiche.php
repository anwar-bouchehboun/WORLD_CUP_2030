<?php
$cnc = mysqli_connect("localhost", "root", "", "worldcup");
function test($cnc) {

    $GROUPS = "SELECT * FROM groupes;";
    $GROUPSCNC = mysqli_query($cnc,$GROUPS);
  
  
  
    while ($row = mysqli_fetch_assoc($GROUPSCNC)) {
      $groupId = $row["id"];
    echo '<div class=" card mb-4 col-md-3 d-flex align-items-center p-2" style="width:18rem;">
  
    <h1 class="text-center bg-white w-100 fs-3" style = "color: #001C30;">GROUPE '.$row ["nom"].'</h1>
  
    <div class="d-flex justify-content-between flex-column w-100 gap-2 ">';
    $TEAMS = "SELECT * FROM equipe WHERE id_groupe = $groupId;";
    $TEAMSCNC = mysqli_query($cnc,$TEAMS);
  
    while ($roww = mysqli_fetch_assoc($TEAMSCNC)) {
  
      echo '
      <div class="FIRST d-flex align-items-center fw-bold gap-2 rounded-2 border" style = "background-color:#001B79;" data-bs-toggle="modal" data-bs-target="#exampleModal_'.$roww ["id_equipe"].'">
          <img src="'.$roww ["logo"].'" alt="LOGO" class="w-25">
          <p class="text-white fs-4 m-0">'.$roww ["nom_equipe"].'</p>
        </div>
        
        <div class="modal fade" id="exampleModal_'.$roww ["id_equipe"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-2" id="exampleModalLabel">  <img src="'.$roww ["logo"].'" alt="logo" class="w-25">'.$roww ["nom_equipe"].'</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body  rounded mx-auto  my-2 "style="width:80%;style="background-color: #94A684;">
                    <img src="'.$roww ["logo"].'" alt="logo" class="w-25">
                    <h2 class="fs-3 ">CAPITALE: <strong> '.$roww['capitale'].' </strong></h2>
                    <h2 class="fs-3 ">CONTIENT: <strong> '.$roww['continent'].' </strong></h2>
                    <h2 class="fs-3">POPULATION: <strong> '. $roww['population'].' </strong></h2>
                    <h2 class="fs-3">JOUEURS CLES: <strong> '.$roww['joueur'].'</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        
        
        ';
    }
  
    echo '
    </div>
    </div>
    ';
  
  }
  };
  

test($cnc);

?>

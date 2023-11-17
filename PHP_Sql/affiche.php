<?php
    $result = $conn->query("SELECT g.nom AS nom_groupe, GROUP_CONCAT(CONCAT(e.nom_equipe, ' - ', e.logo)) AS equipes_du_groupe
    FROM groupes g
    JOIN equipe e ON g.id = e.id_groupe
    GROUP BY g.nom");
?>
    <div id="groupe" class=" container mt-5 d-flex flex-wrap justify-content-center align-items-center gap-5">
 <!-- ARRY ASSOICTAIVE -->
        <?php
        while ($row = $result->fetch_assoc()) :
            $equipes = explode(',', $row['equipes_du_groupe']);
        ?>

            <div>
                <div  class="card mb-4 p-2" style="width: 15rem;">
                    <div class="text-center fs-3 bg-white"><h3 style="color: #001C30;">GROUPE <?= $row['nom_groupe'] ?></h3></div>
                    <div class="text-center w-100 rounded-2">
                        <?php for ($i = 0; $i < count($equipes); $i++) :
                        // trouve liste on recuper donner in Arry 
                            list($nomEquipe, $logo) = explode(' - ', $equipes[$i]);
                        ?>
                            <div class="d-flex my-1 py-2 rounded-2 border" style="background-color:#001B79">
                                <div class=" ms-1">
                                    <img src="<?php echo $logo; ?>" alt="Logo" class="mt-1 ms-1" style="max-width: 40px; max-height: 40px;">
                                </div>
                                <div>
                            <button class="text-white ms-1 fs-5 m-0 btn "type="button"><?= $nomEquipe ?></button> 
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

        <?php endwhile; 
           $conn->close();?>
    </div>
<?php
if (isset($_GET['G'])) {
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
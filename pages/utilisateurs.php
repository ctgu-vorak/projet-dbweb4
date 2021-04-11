

<div class="w3-container w3-padding w3-center">
    <table class="w3-border w3-table-all w3-centered">
        <thead>
            <tr class='w3-border'><th colspan='2'>Utilisateurs</th></tr>
            <tr class='w3-border'><th class='w3-border'>Nom</th><th class='w3-border'>Lien</th></tr>
        </thead>

        <?php
        if(isset($db)) {
            $stmt = $db->prepare("SELECT pseudo FROM utilisateurs");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $i = 1;
            foreach($result as $key) {
                echo "
        <tr class='w3-border'>
            <td class='w3-container w3-border'>".$key['pseudo']."</td>
            <td class='w3-container w3-border' style='width: auto'>
                <form method='get' action='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                    <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' type='submit' name='id' value='$i'> Lien vers le profil</button>
                </form>
            </td>
        </tr>";
                $i++;
            }
        }
        ?>
    </table>
</div>

<div class="w3-container w3-padding w3-left">
    <button id="open_modal" class="w3-button w3-deep-purple w3-round-xlarge w3-hover-purple">
        Connexion
    </button>
    <div id="modalBox" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <header class="w3-container w3-deep-purple">
            <span class="close_modal w3-button w3-xlarge w3-display-topright w3-hover-purple"
                  title="Fermer">&times;</span>
                <h4>Connexion</h4>
            </header>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="w3-margin">
                    <label><b>Pseudo</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Pseudo" name="pseudo_pseudo" maxlength="45" required/>

                    <label><b>ID</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="number" placeholder="Numéro d'identifiant" name="id_pseudo" maxlength="2147483647" required />



                    <div>
                        <table class="w3-table w3-all-centered">
                            <tr style="height: auto">
                                <th>
                                    <button class="w3-button w3-round w3-block w3-green w3-section w3-hover-green"
                                            type="submit">Connexion
                                    </button>
                                </th>
                                <th>
                                    <button class="w3-button w3-round w3-block w3-red w3-section w3-hover-red" type="reset">Vider les champs</button>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<script type="text/javascript" src="assets/scripts/modal.js"></script>


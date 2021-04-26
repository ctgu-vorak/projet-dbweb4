<button id="open_modal" class="w3-button w3-theme w3-round-xlarge w3-hover-dark-grey">
    <i class="fa fa-edit"></i> Edition
</button>

<div id="modalBox" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

        <header class="w3-container w3-theme">
            <span class="close_modal w3-button w3-xlarge w3-display-topright w3-hover-dark-grey"
                  title="Fermer">&times;</span>
            <h2>Editeur de publication</h2>
        </header>

        <div class="w3-bar">
            <button id="move_add" class="tablink w3-bar-item w3-button w3-left" onclick="switchTabbedContent(event, 'addpub')">Ajouter</button>
            <button id="move_mod" class="tablink w3-bar-item w3-button w3-left" onclick="switchTabbedContent(event, 'modpub')">Modifier</button>
        </div>
        <div id="addpub" class="switch">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="w3-margin">
                <label><b>Pseudo</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Pseudo" name="pseudo" maxlength="45" value="<?php echo $_SESSION['pseudo']?>" readonly required/>

                <label><b>Publication</b></label>
                <textarea style="resize: none" class="w3-input w3-border w3-margin-bottom" name="content" placeholder="Contenu publication" maxlength="250" rows="auto" cols="auto" required></textarea>

                <p><b>Catégorie</b></p>


                <table style="width: auto">
                    <tr  style="background-color: #ffffff">
                        <td class="w3-left">
                            <input type="radio" name="categorie" value="divers" required/>
                            <label>Divers</label><br>
                        </td>
                    </tr>
                    <tr style="background-color: #ffffff">
                        <td class="w3-left">
                            <input type="radio" name="categorie" value="news" required/>
                            <label>News</label><br>
                        </td>
                    </tr>
                    <tr style="background-color: #ffffff">
                        <td class="w3-left">
                            <input type="radio" name="categorie" value="sport" required/>
                            <label>Sport</label><br>
                        </td>
                    </tr>
                    <tr style="background-color: #ffffff">
                        <td class="w3-left">
                            <input type="radio" name="categorie" value="citation" required/>
                            <label>Citation</label><br>
                        </td>
                    </tr>
                </table>

                <div>
                    <table class="w3-table w3-all-centered">
                        <tr style="height: auto">
                            <th>
                                <button class="w3-button w3-round w3-block w3-green w3-section w3-hover-green"
                                        type="submit">Ajouter
                                </button>
                            </th>
                            <th>
                                <button class="w3-button w3-round w3-block w3-red w3-section w3-hover-red" type="reset">Recommencer</button>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        </div>
        <div id="modpub" class="switch">
            <br>
            <span><i><b>Prochainement, vous pourrez modifier vos publications.<br>Un peu de patience.</b></i></span><br><br>
            <i class="fa fa-cogs" style="font-size:48px;color:#607d8b"></i><br><br>
        </div>

    </div>
</div>
<script type="text/javascript" src="assets/scripts/modal.js"></script>
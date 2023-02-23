<?php
ob_start()
?>
<div class="">
    <div class="row">
        <nav class="col-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="/spy-game/src/controller/back/missions.php">Missions</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/missionTypes.php">Types de mission</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/specialisations.php">Spécialisations</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/persons.php">Personnes</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/agents.php">Agents</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/targets.php">Cibles</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/contacts.php">Contacts</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/countries.php">Pays</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/nationalities.php">Nationalités</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/hideouts.php">Planques</a></li>
            </ul>
        </nav>
        <div class="col-10">
            <div>
                <?php require '../../templates/back/table.php'; ?>
            </div>
        </div>
    </div>
</div>
<div id="error"> <?php $error ?></div>
<?php
$content = ob_get_clean();
require_once('../../templates/layout.php');

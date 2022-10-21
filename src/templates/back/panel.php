<?php
ob_start()
?>
<div class="">
    <div class="row">
        <nav class="col-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="/spy-game/src/controller/back/missions.php">Missions</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/missionTypes.php">Type de mission</a></li>
                <li class="list-group-item"><a href="/spy-game/src/controller/back/specialisations.php">Spécialisation</a></li>
                <li class="list-group-item">Personne</li>
                <li class="list-group-item">Agent</li>
                <li class="list-group-item">Cible</li>
                <li class="list-group-item">Contact</li>
                <li class="list-group-item">Pays</li>
                <li class="list-group-item">Nationalité</li>
                <li class="list-group-item">Planque</li>
            </ul>
        </nav>
        <div class="col-10">
            <div>
                <?php require_once($table); ?>
            </div>
        </div>
    </div>
</div>





<?php
$content = ob_get_clean();
require_once('../../templates/layout.php');

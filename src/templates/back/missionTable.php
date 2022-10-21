<article>
    <div>
        <h2>Missions</h2>
        <table class="table" id="missionsBack">
            <tr>
                <th>id</th>
                <th>agent</th>
                <th><a href="/spy-game/src/controller/back/missionTypes.php">target</a></th>
                <th>contact</th>
                <th>code_name</th>
                <th>mission_type</th>
                <th>status</th>
                <th>country</th>
                <th>hideout</th>
                <th><a href="/spy-game/src/controller/back/specialisations.php">specialisation</a></th>
                <th>start_date</th>
                <th>end_date</th>
            </tr>
            <?php foreach($missions as $item): ?>
                <tr>
                    <?php foreach($item->iterateValues() as $value): ?>
                        <td>
                            <?php echo($value) ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</article>
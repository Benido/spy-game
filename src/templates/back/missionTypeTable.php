<article>
    <div>
        <h2>Mission Types</h2>
        <table class="table" id="missionTypes">
            <tr>
                <th>id_mission_type</th>
                <th>title</th>
                <th>description</th>
            </tr>
            <?php foreach($missionTypes as $item): ?>
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
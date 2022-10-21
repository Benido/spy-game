<article>
    <div>
        <h2>Specialisations</h2>
        <table class="table" id="specialisations">
            <tr>
                <th>id_specialisation</th>
                <th>title</th>
                <th>description</th>
            </tr>
            <?php foreach($specialisations as $item): ?>
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

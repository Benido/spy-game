<article>
    <div>
        <h2>Countries</h2>
        <table class="table" id="countries">
            <tr>
                <th>id_country</th>
                <th>name</th>
            </tr>
            <?php foreach($countries as $item): ?>
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
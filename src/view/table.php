<?php
ob_start();
?>

<article>
    <div>
        <table>
            <tr>
            <?php
            if (isset($data)) {
                foreach ($data[0] as $propertyName => $value): ?>
                    <th><?php echo($propertyName) ?></th>
            <?php
                endforeach;
            }
            ?>
            </tr>
            <?php foreach($data as $item): ?>
                <tr>
                    <?php foreach ($item as $value): ?>
                        <td><?php echo($value) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</article>

<?php
$content = ob_get_clean();
require_once('layout.php');
<article>
        <h2><?php echo $data['tableTitle'] ?></h2>
        <table class='table' id=<?php echo $data['tableName'] ?>>
            <tr>
                <?php
                foreach ($data['tableProperties'] as $property) :?>
                <th><?php echo($property) ?></th>
                <?php
                endforeach;
                ?>
            </tr>
            <?php foreach($table as $item): ?>
                <tr>
                    <?php foreach($item->iterateValues() as $value): ?>
                        <td>
                            <?php echo($value) ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <div class="d-flex justify-content-center">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">Nouvelle entrée</button>
    </div>
    <?php require_once ('../../templates/back/insertModal.php') ?>
</article>
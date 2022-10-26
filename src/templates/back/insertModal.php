<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Nouvelle entrée sur <?php echo $data['tableName']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/spy-game/src/controller/back/countries.php" method="post" id= <?php echo $data['tableName'].'_form' ?>>
            <?php foreach(array_slice($data['tableProperties'], 1) as $column): ?>
                <div class="mb-3">
                    <label for=<?php echo $column ?> class="col-form-label"><?php echo $column ?>:</label>
                    <input type="text" class="form-control" id=<?php echo $column ?> name=<?php echo $column ?>>
                </div>
            <?php endforeach; ?>
            <input type="hidden" id="action" name="action" value="insert">
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary" form=<?php echo $data['tableName'].'_form' ?>>Ajouter</button>
      </div>
    </div>
  </div>
</div>
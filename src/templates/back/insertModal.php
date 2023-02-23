<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Nouvelle entrée sur <?php echo $data['tableName']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="formErrorMessage" class="text-danger" tabindex="0"><?= $errorMessage ?></div>
        <form id= <?php echo $data['tableName'].'_form' ?>>
            <?php foreach(array_slice($data['tableProperties'], 1) as $column): ?>
                <div class="mb-3">
                    <label for=<?php echo $column ?> class="col-form-label"><?php echo $column ?>:</label>
                    <?php if (key_exists('multipleChoiceInput', $data) && key_exists($column, $data['multipleChoiceInput']))  { ?>
                    <select id= <?php echo $column ?>
                            name= <?php echo $column ?>
                           class="form-control" >
                            <?php foreach ($data['multipleChoiceInput'][$column] as $id => $option):  ?>
                                <option value="<?php echo $id ?>"> <?php echo $option ?> </option>
                            <?php endforeach; ?>
                    </select>
                            <?php } else { ?>
                    <input id=<?php echo $column ?>
                           name=<?php echo $column ?>
                           class="form-control"
                           <?php if (key_exists('date', $data) && in_array($column, $data['date'])) {
                               echo "type='date' min='1900-01-01'";
                           } else if (key_exists('number', $data)&& key_exists($column, $data['number'])) {
                               echo "type='number' min=1 max=". $data['number'][$column];
                           } else if (key_exists('text', $data)&& key_exists($column, $data['text'])) {
                               echo "type='text' maxlength=". $data['text'][$column];
                           } ?>  >
                </div>
            <?php }
            endforeach; ?>
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
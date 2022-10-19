<?php
ob_start()
?>

<div>
    <?php echo $greeter ?>
</div>

<?php
$content = ob_get_clean();
require_once('../../templates/layout.php');

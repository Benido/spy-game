<?php
ob_start();
?>
<div>
    <p><?php echo($errorMessage) ?> </p>
</div>
<?php
$content = ob_get_clean();
require_once ('layout.php');


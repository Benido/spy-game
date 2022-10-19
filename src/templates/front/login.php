<?php
ob_start()
?>

<div>
    <form class="" action="" method="post">
        <h2>Connexion au panneau de gestion</h2>
        <label for="username">Votre nom d'utilisateur</label>
        <input type="text" class="" name="username" placeholder="nom d'utilisateur" required />
        <label for="password">Votre mot de passe</label>
        <input type="password" class="" name="password" placeholder="password" required>
        <input type="submit" name="submit" value="se connecter" class="">
        <p><?php echo($errorMessage) ?></p>
    </form>
</div>

<?php
$content= ob_get_clean();
require_once('../../templates/layout.php');


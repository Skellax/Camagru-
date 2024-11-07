<?php $title = 'Camagru' ?>

<?php 
    ob_start()
?>

<?php require_once('controllers/user.php') ?>

<h2>Inscription Reussi !</h2>

<div class="m-3">
    <p>Bienvenue <?= htmlspecialchars($_SESSION['username']) ?></p>
    <p>Un email vous à été envoyé !</p>
</div>

<?php $content = ob_get_clean() ?>

<?php require('templates/layout.php'); ?>
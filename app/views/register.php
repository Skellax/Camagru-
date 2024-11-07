<?php $title = "Camagru"; ?>
<?php
ob_start();
?>



<?php if (!empty($errors)): ?>
    <div class='alert alert-danger' role='alert'>
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container">
    <h2> Formulaire d'inscription</h2>
    <form action="index.php?action=register" method="POST">
        <div class = "mb-3">
            <label for="username" class="form-label">Pseudo</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class = "mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" placeholder="you@exemple.com" class="form-control">
        </div>
        <div class = "mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="minimum 8 caractères, 1 majuscule et 1 chiffre">
        </div>
        <button type="Submit" class="btn btn-primary"> S'inscrire </button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>

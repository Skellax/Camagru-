<?php $title = "Camagru" ?>

<?php
    ob_start()
?>


<?php if (!empty($errors)) : ?>
    <div class='alert alert-danger' role='alert'>
        <ul>
            <?php foreach($errors as $error): ?>
                <li> <?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container">
    <h2>Connexion</h2>
    <form action="index>php?action=sucess" method="Post">
        <div class="mb-3">
            <label for="username" class="form-label">Pseudo</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password"/>
        </div>
        <button type="Submit" class="btn btn-primary">Se connecter</button>       
    </form>
    <h3>Pas encore inscrit ?</h3>
    <a href="index.php?action=submit">Cliquer sur ce lien.</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php'); ?>


<?php
// $title = 'Les acteurs';
require 'partials/header.php';

// @todo A voir pour faire cela
// setTitle('Nos acteurs');
// addCss('assets/scss/acteurs.css');

// J'ai besoin de récupèrer les acteurs avec la bonne requête
global $db;
$query = $db->query('SELECT * FROM actor');
$actors = $query->fetchAll();
?>

<div class="container">
    <h1>Les acteurs</h1>

    <div class="row">
        <?php foreach ($actors as $actor) { ?>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center"><?= $actor['firstname'].' '.$actor['name']; ?></h2>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require 'partials/footer.php'; ?>

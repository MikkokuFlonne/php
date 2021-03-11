<?php
// On va inclure le header (le doctype et le menu) sur chaque page
// $title = 'Mon super site';
require 'partials/header.php'; ?>

<!-- Ici, entre les 2 require, on peut intégrer notre page HTML -->
<div class="container">
    <h1>Ma page d'accueil</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate assumenda consequatur perspiciatis tenetur? Excepturi quisquam, enim delectus, incidunt aliquid quis eaque perspiciatis eius temporibus quasi nulla officia aperiam fugit rem!</p>

    <?php
        // On va essayer de récupèrer les catégories de la base de données
        global $db; // Je fais ça pour activer l'autocomplétion
        // Je fais une requête SQL pour récupèrer mes catégories
        $query = $db->query('SELECT * FROM category');
        // Je récupère les résultats de la requête sous forme de tableau
        $categories = $query->fetchAll();
        // Autre solution pour écrire la requête
        // $categories = $db->query('SELECT * FROM category')->fetchAll();
        // var_dump($categories);
        // A vous de jouer : Afficher proprement les catégories en parcourant
        // le tableau. On va essayer d'avoir un affichage en "colonne", c'est-à-dire
        // afficher deux catégories par ligne. Soit vous utilisez les colonnes de
        // Bootstrap (ou un flex).

        // 1: Films de gangsters          2: Action
        // 3: Horreur                     4: Science-fiction
        // 5: Thriller

        $query = $db->query('SELECT * FROM movie ORDER BY released_at DESC LIMIT 9');
        $lastMovies = $query->fetchAll();

        $query = $db->query('SELECT * FROM movie ORDER BY RAND() LIMIT 4');
        $randMovies = $query->fetchAll();
        ?>

        <div class="carousel">
        <?php foreach ($lastMovies as $movie) { ?>
            <div class="carousel-item">
            </div>

        
        </div>
        
        <h2>Sélection de films aléatoires</h2>
        <div class="row">
            <?php foreach ($randMovies as $movie) { ?>
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <img class="card-img-top" src="uploads/movies/<?= $movie['cover']; ?>" />
                        <div class="card-body">
                            <h2 class="card-title"><?= $movie['title']; ?></h2>
                            <p class="card-text">
                                Sorti en <?= substr($movie['released_at'], 0, 4); ?>
                            </p>
                            <p class="card-text">
                                <?= $movie['description']; ?>
                            </p>

                            <div class="d-grid">
                                <a href="./film.php?id=<?= $movie['id']; ?>" class="btn btn-danger">Voir le film</a>
                            </div>
                        </div>

                        <div class="card-footer text-muted">
                            <?php
                            // Représente la note du film
                            $note = rand(0, 5);
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $note) {
                                    echo '★';
                                } else {
                                    echo '☆';
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

       
        <div class="row">
        <h2>Catégories</h2>
            <?php foreach ($categories as $category) { ?>
                <div class="col-6">
                    <?= $category['id']; ?> : <?= $category['name']; ?>
                </div>
            <?php } ?>
        </div>
</div>

<?php require 'partials/footer.php'; ?>

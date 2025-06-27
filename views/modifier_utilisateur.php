<?php
include "../src/repositories/utilisateur_repository.php";
$utilisateur = find_by_id($_GET['id']);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de modification</title>
</head>

<body>
    <h1>Page de modification</h1>
    <main class=container>
        <form action="../src/controllers/utilisateur_controller.php" method="post">
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <input class="form-control" type="hidden"  name=id value="<?= $utilisateur[0] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="username">Nom d'utilisateur</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id=username name=username value="<?= $utilisateur[1] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="password">Mot de passe</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id=password name=password value="<?= $utilisateur[2] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="nom">Nom complet</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id=nom name=nom  value="<?= $utilisateur[3] ?>">
                </div>
            </div>
            <div>
                <button class="btn btn-primary">
                    Enregistrer
                </button>
            </div>

        </form>
    </main>

</body>

</html>
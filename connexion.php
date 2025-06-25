<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Page de connexion</h1>
    <form action="./utilisateur_controller.php" method ="post">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="username">Nom d'utilisateur</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id=username autofocus name=username>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="password">Mot de passe</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" id=password name=password>
            </div>
        </div>
        <div>
            <button>
                Se connecter
            </button>
        </div>
    </form>
</body>
</html>
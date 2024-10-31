<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ajout & Modif de Personne</title>
</head>
<body>
    <nav>
        <div class="container">
            <h1 class="title">PROJET PERSONNE</h1>
            <ul class="menu">
                <li><a href="index.php?action=add">Ajouter une personne</a></li>
                <li><a href="index.php?action=list">Lister les personnes</a></li>
            </ul>
        </div>
    </nav>

    <div class="form-container">
        <h2><?php echo isset($personne) ? 'Modifier' : 'Ajouter'; ?> une Personne</h2>
        <form action="index.php?action=<?php echo isset($personne) ? 'edit' : 'add'; ?>" method="post">
            <div class="form-group">
                <div class="left">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $personne['prenom'] ?? ''; ?>" required>
                </div>
                <div class="right">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $personne['nom'] ?? ''; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="left">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="<?php echo $personne['adresse'] ?? ''; ?>" required>
                </div>
                <div class="right">
                    <label for="telephone">Téléphone</label>
                    <input type="tel" id="telephone" name="telephone" value="<?php echo $personne['telephone'] ?? ''; ?>" required>
                </div>
            </div>
            <div class="bouton">
                <button type="submit"><?php echo isset($personne) ? 'Modifier' : 'Ajouter'; ?></button>
            </div>

            
            <input type="hidden" name="id" value="<?php echo $personne['id']; ?>">
            
            
        </form>
    </div>
</body>
</html>

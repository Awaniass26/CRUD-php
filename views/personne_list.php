<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style2.css">
    <title>Liste des Personnes</title>
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

    <div class="list-container">
        <h2>Liste des Personnes</h2>
        <?php if (!empty($personnes)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personnes as $personne): ?>
                <tr>
                    <td><?php echo $personne['id']; ?></td>
                    <td><?php echo $personne['prenom']; ?></td>
                    <td><?php echo $personne['nom']; ?></td>
                    <td><?php echo $personne['adresse']; ?></td>
                    <td><?php echo $personne['telephone']; ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?php echo $personne['id']; ?>">Modifier</a>
                        <form action="index.php?action=delete" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $personne['id']; ?>">
                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>Aucune personne trouvée.</p>
        <?php endif; ?>
    </div>
</body>
</html>
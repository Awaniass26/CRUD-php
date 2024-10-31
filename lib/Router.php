<?php

require_once ROUTE_DIR . 'controller/PersonneController.php';

$personneController = new PersonneController();

$action = $_GET['action'] ?? 'list';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'add') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];

        $personneController->addPersonne(['nom' => $nom, 'prenom' => $prenom, 'adresse' => $adresse, 'telephone' => $telephone]);
        header('Location: index.php?action=list');
        exit;
        
    } elseif ($action === 'edit') {
        
        $id = $_POST['id'];
        $personneController->editPersonne($id, [
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse'],
            'telephone' => $_POST['telephone']
            
         ]);
         header('Location:index.php?action=list');
    } elseif ($action === 'delete') {
        $personneController->deletePersonne($_POST['id']);
        header('Location:index.php?action=list');

    }
}

if ($action === 'list') {
    $personnes = $personneController->listPersonnes();
    require '../views/personne_list.php';
} elseif ($action === 'add') {
    require '../views/personne_add.php';
} elseif ($action === 'edit') {
    $id = $_GET['id'];
    $personne = $personneController->getPersonneById($id);
    require '../views/personne_add.php';
}

?>

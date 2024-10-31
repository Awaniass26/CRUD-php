<?php

class PersonneController
{
    private $jsonFile = '../data/personnes.json';

    public function listPersonnes() {
        if (file_exists($this->jsonFile)) {
            $data = file_get_contents($this->jsonFile);
            return json_decode($data, true);
        }
        return []; 
    }

    public function addPersonne($personne) {
        $personnes = $this->listPersonnes();
        // Determine the next ID
        $nextId = count($personnes) > 0 ? max(array_column($personnes, 'id')) + 1 : 1;
        $personne['id'] = $nextId;
        $personnes[] = $personne;
        
        file_put_contents($this->jsonFile, json_encode($personnes, JSON_PRETTY_PRINT));
    }

    public function editPersonne($id, $updatedPersonne) {
        $personnes = $this->listPersonnes();
        foreach ($personnes as &$personne) {
            if ($personne['id'] == $id) {
                $personne = array_merge($personne, $updatedPersonne); // Update person data
                break;
            }
        }
        
        file_put_contents($this->jsonFile, json_encode($personnes, JSON_PRETTY_PRINT));
    }

    public function deletePersonne($id) {
        $personnes = $this->listPersonnes();
        $personnes = array_filter($personnes, function($personne) use ($id) {
            return $personne['id'] != $id;
        });
        
        file_put_contents($this->jsonFile, json_encode(array_values($personnes), JSON_PRETTY_PRINT));
    }

    public function getPersonneById($id) {
        $personnes = $this->listPersonnes();
        foreach ($personnes as $personne) {
            if ($personne['id'] == $id) {
                return $personne;
            }
        }
        return null;
    }
}
?>

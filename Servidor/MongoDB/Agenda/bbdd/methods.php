<?php

use MongoDB\Operation\InsertOne;

    function insertContact($database, $contact)
    {
        $agenda = $database->contacto;
        $agenda->insertOne($contact);
    }

    function getAllContacts($database)
    {
        $agenda = $database->contacto->find();
        foreach($agenda as $contact){
            $contacts[] = $contact;
        }
        return $contacts;
    }

    function searchContact($database, $type, $data)
    {
        $result = $database->contacto->find([$type => $data]);

        $contacts=[];
        foreach ($result as $r) {
            if ($r) {
                $contacts[] = new Contact(
                    $r->name,
                    $r->surname,
                    $r->tel
                );
            }
        }
        return $contacts;
    }
?>
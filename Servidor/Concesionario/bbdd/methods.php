<?php

use MongoDB\Operation\InsertOne;

    function insertCar($database, $car)
    {
        $concesionario = $database->coches;
        $concesionario->insertOne($car);
    }

    function insertUser($database, $user)
    {
        $concesionario = $database->usuarios;
        $concesionario->insertOne($user);
    }

    function getAllCars($database)
    {
        $concesionario = $database->coches->find();
        foreach($concesionario as $car){
            $cars[] = $car;
        }
        return $cars;
    }

    function findCarByBrand($cars, $brand) {
        foreach ($cars as $car) {
            if ($car->brand === $brand) {
                return $car;
            }
        }
        return null;
    }

    function deleteCar($database, $cars){
        $concesionario = $database->coches;
        $concesionario -> deleteOne(["brand" => $cars["brand"]]);
            
    }

    

    function getUserInfo($database, $username) {
        $userDocument = $database->usuarios->find(['username' => $username]);

        if ($userDocument) {

        }
    
        return null;
    }
    

    /*
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
    }*/
    
?>
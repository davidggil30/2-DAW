<?php

function insertUser($database, $user)
    {
        $usuario = $database->usuarios;
        $usuario->insertOne($user);
    }

function isUsernameTaken($database, $username) {
    $userCollection = $database->usuarios;
    $existingUser = $userCollection->findOne(["username" => $username]);

    return ($existingUser !== null);
}

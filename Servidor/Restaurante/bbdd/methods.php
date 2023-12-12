<?php
function insertUser($database, $user)
{
    $collectionUser = $database->users;
    $collectionUser->insertOne($user);
}

function insertPersonal($database, $user)
{
    $collectionUser = $database->users;

    $countPersonal = $collectionUser->count(['rol' => 'personal']);

    if ($countPersonal < 10) {
        $collectionUser->insertOne($user);
        echo "Usuario '$user->username' añadido correctamente.";
    } else {
        echo "No se permitió la adición. Ya hay 10 personas con el rol 'personal'.";
    }
}

function deletePersonal($database, $username)
{
    $collecionUser = $database->users;

    $countPersonal = $collecionUser->count(['rol' => 'personal']);

    if ($countPersonal > 1) {
        $collecionUser->deleteOne(['username' => $username]);
        echo "Eliminado correctamente";
    } else {
        echo "No se puede eliminar el usuario, tienes que tener como minimo 1";
    }
}

function insertMenu($database, $menu)
{
    $collectionMenu = $database->menu;
    $collectionMenu->insertOne($menu);
}

function getAllMenu($database)
{
    $collectionMenu = $database->menu->find();
    foreach ($collectionMenu as $menu) {
        $menus[] = $menu;
    }
    return $menus;
}

function getUsersByRole($database, $rol)
{
    $collectionUser = $database->users;
    $cursor = $collectionUser->find(['rol' => $rol]);

    $users = [];
    foreach ($cursor as $user) {
        $users[] = $user;
    }

    return $users;
}

function insertMesa($database, $mesa)
{
    $collectionMesa = $database->mesa;
    $collectionMesa->insertOne($mesa);
}

function updateAvailability($database, $user)
{
    $collectionUser = $database->users;
    $collectionUser->updateOne(
        ['username' => $user->username],
        ['$set' => ['available' => false]]
    );
}
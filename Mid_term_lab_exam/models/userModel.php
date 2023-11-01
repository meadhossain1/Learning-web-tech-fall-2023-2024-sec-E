<?php
require_once('db.php');

function login($id, $password)
{
    $con = getConnection();
    $sql = "select * from users where id='{$id}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
        $user = $users[0];
        print_r($user[0]);

        session_start();
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'type' => $user['user_type']];

        $_SESSION['auth'] = "true";
        if ($user['type'] == 'admin') {
            header('location: ../views/admin_home.php');
        } else {
            header('location: ../views/user_home.php');
        }
    } else {

        return false;
    }
}


function getUser($id)
{
    session_start();
    if (isset($_SESSION['author']) && $_SESSION['user']) {
        $id = $_SESSION['user']['id'];
    }
    $con = getConnection();
    $sql = "select * from users where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
        $user = $users[0];
        print_r($user[0]);

        session_start();
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'type' => $user['user_type']];

        $_SESSION['author'] = "true";
        if ($user['type'] == 'admin') {
            header('location: ../views/admin_home.php');
        } else {
            header('location: ../views/user_home.php');
        }
    } else {

        return false;
    }
}

function getAllUser()
{
    $con = getConnection();
    $sql = "select * from users";
    $result = mysqli_query($con, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($users, $row);
    }

    return $users;
}

function updateUser($user)
{
}

function deleteUser($id)
{
}
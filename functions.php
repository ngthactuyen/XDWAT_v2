<?php

// function __autoload($className) {
//     if(file_exists("models/" . $className. ".php")) include_once "models/" . $className. ".php";
//     if(file_exists("controllers/" . $className . ".php")) include_once "controllers/" . $className . ".php";
// }

spl_autoload_register(function ($className)
{
    if(file_exists("models/" . $className. ".php")) include_once "models/" . $className. ".php";
    if(file_exists("controllers/" . $className . ".php")) include_once "controllers/" . $className . ".php";
    if(file_exists("repositories/" . $className . ".php")) include_once "repositories/" . $className . ".php";
    if(file_exists("services/" . $className . ".php")) include_once "services/" . $className . ".php";
});

function viewSite($viewName, $data = '')
{
    if ($data) extract($data);
    require_once "views/site/$viewName.view.php";
}

function dd($data = '')
{
    echo '<pre>';
    var_dump($data);
    die();
}

function connect()
{
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'at130958_xdwat'
    );
    mysqli_set_charset($connection, 'utf8');
    return $connection;
}

function execute($sql)
{
    return mysqli_query(connect(), $sql);
}

function getOneData($sql)
{
    $resultSet = execute($sql);
    return mysqli_fetch_assoc($resultSet);
}

function getAllData($sql)
{
    $resultSet = execute($sql);
    $result = [];
    $row = mysqli_fetch_assoc($resultSet);
    while ($row != null)
    {
        $result[] = $row;
        $row = mysqli_fetch_assoc($resultSet);
    }
    return $result;
}

function setSuccessMessage($message)
{
    $_SESSION['success_message'] = $message;
}

function setErrorMessage($message)
{
    $_SESSION['error_message'] = $message;
}

function redirect($controller, $action = '')
{
    if (!$action) {
        //header("location:?controller=$controller");
        echo "<meta http-equiv='refresh' content=\"0; url=http://localhost:71/XDWAT_v2/?controller=$controller\">";
    } else {
        //header("location:?controller=$controller&action=$action");
        echo "<meta http-equiv='refresh' content=\"0; url=http://localhost:71/XDWAT_v2/?controller=$controller&action=$action\">";
    }
}
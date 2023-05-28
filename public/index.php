<?php

require("../vendor/autoload.php");

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Controllers\GenericController;
use Router\RouterHandler;

// Obtener la URL
$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

// incomes/1

// Intancia del router

$router = new RouterHandler();

switch ($resource) {

    case '/':

        break;

    case "incomes":

        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(IncomesController::class, $id);

        break;

    case "withdrawals":

        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(WithdrawalsController::class, $id);

        break;

    case "generic":

        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(GenericController::class, $id);

        break;

    default:
        echo "404 Not Found";
        break;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Console</title>
    <link rel="stylesheet" href="./css/console.css">
</head>

<body style="">
    <main>
        <div>BitLopez <span><i>PHP_SQL</i> V: <span style="font-size: 1.5em;">&alpha;</span> 0.0.0</span></div>
        <br /><br /><br />
        <div>
            <table width="80%">
                <tbody width="80%">
                    <tr width="80%">
                        <th> <span style="  float:left;"> PHPSQL\> &nbsp;</span>
                            <input type="text" placeholder="Escriba su comando" contenteditable="true" style="" />
                        </th>

                    </tr> &nbsp;


                </tbody>
            </table>


        </div>

    </main>
</body>

</html>
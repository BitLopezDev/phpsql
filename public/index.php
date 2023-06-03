<?php

require("../vendor/autoload.php");
use \Router\RouterHandler;

require("../router/RouterHandler.php");
use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Controllers\GenericController;





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

        <div id="historydiv">
            <table width="100%">
                <thead>
                    <th style="float:left; font-size:2em;">Comando</th>
                    <th style="float:right; font-size:2em; ">Estado</th>

                    </tr>
                </thead>

                <tbody width="100%" id="historytable">






                </tbody>
            </table>
            <br /><br /><br />
        </div>
        <div>
            <table width="100%">
                <tbody width="100%">
                    <tr width="100%">
                        <th> <span style="  float:left;"> PHPSQL\> &nbsp;</span>
                            <div id="datadiv"> <input id="userinput" type="text" placeholder="Escriba su comando"
                                    contenteditable="true" style="" /> </div>
                        </th>
                        <th style="  float:right; border-left: 3px solid green; width:300px;"
                            style="border: 2px solid blue;">
                            <div id="execdiv" style=""> <input id="execinput" type="text" placeholder="Exec || Stash"
                                    contenteditable="true" style="" width="40%" /> </div>
                        </th>
                    </tr>


                </tbody>
            </table>


        </div>

    </main>
</body>
<script src="scripts/console.js"></script>

</html>
<?php

namespace App\Controllers;

use Database\PDO\Connection;
use App\Errors\CustomException;

class IncomesController
{

    private $connection;


    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    /**
     * Muestra una lista de este recurso
     */

    public function index()
    {

        $stmt = $this->connection->prepare("SELECT * FROM $table");
        $stmt->execute();

        $results = $stmt->fetchAll();

        require("../resources/views/incomes/index.php");

    }


    /**
     * Muestra un formulario para crear un nuevo recurso
     */
    public function create()
    {
        require("../resources/views/incomes/create.php");

    }




    /**
     * Guarda un nuevo recurso en la base de datos
     */
    public function store($data)
    {




        //print_r("INSERT INTO $table ($coltitles) VALUES ($colinteriors)"); 
        // $stmt = $this->connection->prepare("INSERT INTO $table ($colinteriors) VALUES ($coltitles)");


        // for ($i = 0; $i < count($columnheads); $i++) {

        //     $stmt->bindValue("$columncontent[$i]", $data["$columnheads[$i]"]);
        // }
        // $stmt->execute();
        // print_r($data);
        // header("location: incomes");

    }


    /**
     * Muestra un único recurso especificado
     */
    public function show($id)
    {

        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=:id;");
        $stmt->execute([
            ":id" => $id
        ]);

    }

    /**
     * Muestra el formulario para editar un recurso
     */
    public function edit()
    {
    }

    /**
     * Actualiza un recurso específico en la base de datos
     */
    public function update($data, $id)
    {

        $stmt = $this->connection->prepare("UPDATE incomes SET 
            payment_method = :payment_method, 
            type = :type, 
            date = :date, 
            amount = :amount, 
            description = :description
        WHERE id=:id;");

        $stmt->execute([
            ":id" => $id,
            ":payment_method" => $data["payment_method"],
            ":type" => $data["type"],
            ":date" => $data["date"],
            ":amount" => $data["amount"],
            ":description" => $data["description"],
        ]);

    }

    /**
     * Elimina un recurso específico de la base de datos
     */
    public function destroy($id)
    {

        $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute([
            ":id" => $id
        ]);

    }

}


/*

index - Display a listing of the resource.
create - Show the form for creating a new resource.
store - Store a newly created resource in storage.
show - Display the specified resource.
edit - Show the form for editing the specified resource.
update - Update the specified resource in storage.
destroy - Remove the specified resource from storage.

*/
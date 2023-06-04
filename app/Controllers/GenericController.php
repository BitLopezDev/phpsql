<?php

namespace App\Controllers;

use Database\PDO\Connection;
use App\Errors\CustomException;

class GenericController {

    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    /**
     * Muestra una lista de este recurso
     */
    public function index(string $table)
    {

        $stmt = $this->connection->prepare("SELECT * FROM $table");
        $stmt->execute();

        $results = $stmt->fetchAll();

        require("../resources/views/generic/index.php");

    }

    /**
     * Muestra un formulario para crear un nuevo recurso
     */
    public function create()
    {
        require("../resources/views/generic/create.php");
    }

    /**
     * Guarda un nuevo recurso en la base de datos
     */
    public function store($data, string $table = "incomes", /*array $columnheads, */)
    {
        array_pop($data);
        $columnheads = [];
        foreach ($data as $item => $value) {
            array_push($columnheads, $item);
        }
        
        $stmt = $this->connection->prepare("INSERT INTO $table (" . implode(', ', $columnheads) . ") VALUES (:" . implode(', :', $columnheads) . ")\n");

        

        foreach ($data as $item => $value) {
         
            $stmt->bindValue($item, $data["$item"]);

        }

        

       
        $stmt->execute();
      

    }

    /**
     * Muestra un único recurso especificado
     */
    public function show($id = 1)
    {

        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=:id;");
        $stmt->execute([
            ":id" => $id
        ]);

    }

    /**
     * Muestra el formulario para editar un recurso
     */
    public function edit($data, string $table, array $columnheads, array $columncontent, string $coltitles, string $colinteriors, $id)
    {
    }

    /**
     * Actualiza un recurso específico en la base de datos
     */
    public function update($data, string $table, array $columnheads, array $columncontent, string $coltitles, string $colinteriors, $id)
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
    public function destroy($data, string $table, array $columnheads, array $columncontent, string $coltitles, string $colinteriors, $id)
    {
        if ($id != '') {
            $stmt = $this->connection->prepare("DELETE FROM $table WHERE id = :$id");
            $stmt->execute([
                ":id" => $id
            ]);
        } else {
            //new Exception ( int $severity, string $message, basename($_SERVER['PHP_SELF']), __LINE__,);
            new CustomException(5, "You cannot delete items without id for security. Contact Sstem administrator", basename($_SERVER['PHP_SELF']), __LINE__, );
        }


    }
    protected function sql1($data, string $table, array $columnheads, array $columncontent, $callback)
    {
        //  $columnheads=['id','Name', 'owner_id'];
        //  $columncontent=['1', 'Kai', '1'];



        // print_r($columnheads);


        if (count($columnheads) === count($columncontent)) {
            $coltitles = implode(', ', $columnheads);

            $colinteriors = implode(', ', $columncontent);

            $callback($data, $table, $columnheads, $columncontent, $coltitles, $colinteriors);

        } else {
            new CustomException(1, "Amount of columns and number of data blocks passed do not match", basename($_SERVER['PHP_SELF']), __LINE__, );


            //new Exception ( int $severity, string $message, string $filename, int $lineno);
            return;
        }

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
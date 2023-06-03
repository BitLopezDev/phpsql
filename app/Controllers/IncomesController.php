<?php

namespace App\Controllers;

use Database\PDO\Connection;
use App\Errors\CustomException;

class IncomesController
{

    private $connection;

<<<<<<< HEAD
    public function __construct()
=======
    protected function __construct()
>>>>>>> 8ad25e8bddb6be949e54b1671fdc090bdf9f09b9
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    /**
     * Muestra una lista de este recurso
     */
<<<<<<< HEAD
    public function index()
=======
    protected function index(string $table)
>>>>>>> 8ad25e8bddb6be949e54b1671fdc090bdf9f09b9
    {

        $stmt = $this->connection->prepare("SELECT * FROM $table");
        $stmt->execute();

        $results = $stmt->fetchAll();

        require("../resources/views/incomes/index.php");

    }

<<<<<<< HEAD
    /**
     * Muestra un formulario para crear un nuevo recurso
     */
    public function create()
    {
        require("../resources/views/incomes/create.php");
=======
    protected function sql1 ($data, string $table, array $columnheads, array $columncontent, $callback){
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
        
>>>>>>> 8ad25e8bddb6be949e54b1671fdc090bdf9f09b9
    }
    
    

<<<<<<< HEAD
    /**
     * Guarda un nuevo recurso en la base de datos
     */
    public function store($data)
    {
=======
   
    protected function store($data, string $table, array $columnheads, array $columncontent, string $coltitles, string $colinteriors,){
       
>>>>>>> 8ad25e8bddb6be949e54b1671fdc090bdf9f09b9



        //print_r("INSERT INTO $table ($coltitles) VALUES ($colinteriors)"); 
        $stmt = $this->connection->prepare("INSERT INTO $table ($colinteriors) VALUES ($coltitles)");

       
        for ($i = 0; $i < count($columnheads); $i++) {
            
            $stmt->bindValue("$columncontent[$i]", $data["$columnheads[$i]"]);
        }
        $stmt->execute();
        print_r($data);
        // header("location: incomes");

    }

<<<<<<< HEAD
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
=======
    
   //More comming later

>>>>>>> 8ad25e8bddb6be949e54b1671fdc090bdf9f09b9

/*

index - Display a listing of the resource.
create - Show the form for creating a new resource.
store - Store a newly created resource in storage.
show - Display the specified resource.
edit - Show the form for editing the specified resource.
update - Update the specified resource in storage.
destroy - Remove the specified resource from storage.

*/
}
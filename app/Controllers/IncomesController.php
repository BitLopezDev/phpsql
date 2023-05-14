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
    public function index(string $table)
    {

        $stmt = $this->connection->prepare("SELECT * FROM $table");
        $stmt->execute();

        $results = $stmt->fetchAll();

        require("../resources/views/incomes/index.php");

    }

    public static function sql1 ($data, string $table, array $columnheads, array $columncontent, $callback){
        // $columnheads=['id','Name', 'owner_id'];
        // $columncontent=['1', 'Kai', '1'];
        $table='animals';
        $coltitles = "";
        $colinteriors = "";
        if (count($columnheads) === count($columncontent)) {
            for ($i = 0; $i < count($columnheads); $i++) {
                $coltitles .= "$columnheads[$i], ";
                $colinteriors .=":$columncontent[$i], ";
    
            }
       
        } else {
           new CustomException(1, "Amount of columns and number of data blocks passed do not match", basename($_SERVER['PHP_SELF']), __LINE__, );
          
          print_r('Todo mal');
            //new Exception ( int $severity, string $message, string $filename, int $lineno);
            return;
        }
        $callback($data, $table, $columnheads, $columncontent, $colinteriors, $coltitles);
    }
    
    public function create()
    {
        require("../resources/views/incomes/create.php");
    }

    /**
     * Guarda un nuevo recurso en la base de datos
     */
    public function store($data, string $table, array $columnheads, array $columncontent, string $colinteriors, string $coltitles){
       



        //print_r("INSERT INTO $table ($coltitles) VALUES ($colinteriors)"); 
        $stmt = $this->connection->prepare("INSERT INTO $table ($colinteriors) VALUES ($coltitles)");

       
        for ($i = 0; $i < count($columnheads); $i++) {
            
            $stmt->bindValue("$colinteriors[$i]", $data["$columnheads[$i]"]);
        }
        $stmt->execute();

        header("location: incomes");

    }

    /**
     * Muestra un único recurso especificado
     */
   //More comming later


/*

index - Display a listing of the resource.
create - Show the form for creating a new resource.
store - Store a newly created resource in storage.
show - Display the specified resource.
edit - Show the form for editing the specified resource.
update - Update the specified resource in storage.
destroy - Remove the specified resource from storage.

*/
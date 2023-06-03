<?php

namespace Database\PDO;

final class Connection
{

    private static $instance;
    private $connection;

    public function __construct()
    {
        $this->make_connection();
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self)
            self::$instance = new self();

        return self::$instance;
    }

    public function get_database_instance()
    {
        return $this->connection;
    }

    private function make_connection()
    {
        $server = getenv('SERVER_NAME');
        $database = 'finanzas_personales';
        $username = "retaxmaster";
        $password = '123';
        print_r(getenv('DB_PASSWORD'));
        $conexion = new \PDO("mysql:host=$server;dbname=$database", $username, $password);

        $setnames = $conexion->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $conexion;
    }

}
new Connection;
?>
<html>

</html>
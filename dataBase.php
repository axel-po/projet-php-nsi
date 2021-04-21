<?php
class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "mediatheque";
    private static $dbUsername = "root";
    private static $dbUserpassword = "root"; //retirer le mdp 'root' si il y'a erreur lors de la conexion à la base de donnée.
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }

}
?>
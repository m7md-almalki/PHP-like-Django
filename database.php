<?php



class Database{
    protected $db_engine = "mysql";
    protected $db_host = "localhost";
    protected $db_port = 3306;
    protected $db_username = "root";
    protected $db_password = "";
    protected $db_name = "TEST";
    public $database_connection;

    function __construct(){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        $dsn = "{$this->db_engine}:host={$this->db_host};port={$this->db_port};dbname={$this->db_name}";

        try{
            $this->database_connection = new PDO($dsn=$dsn, $username=$this->db_username,$password=$this->db_password, $options=$options);
        }catch(Exception $error){
            global $we_are_in_development;
            if($we_are_in_development){
                echo $error;
            }
        }
    }



    function query($query, $values=[]){
        try{
            $statement = $this->database_connection->prepare($query);

            foreach($values as $key => $value){
                $statement->bindValue(":{$key}" , $value);
            }

            $statement->execute();
            return $statement;
        }
        catch(Exception $error){

            global $we_are_in_development;

            if($we_are_in_development){
                echo $error;
                return false;
            }
            else{
                return false;
            }
        }
    }
}




?>

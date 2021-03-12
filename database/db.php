<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "food";
	private $conn;

    function __construct() {
        $this->conn = $this->connectDB();
	}	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

    function runQuery($query) {
                $result = mysqli_query($this->conn,$query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }		
                if(!empty($resultset))
                return $resultset;
    }

    // public function plat_of_day($plat1, $plat2) {
    //     $plat_of_day_query = mysqli_query($this->conn, "SELECT * FROM plats WHERE($plat1, $plat2) LIMIT 2");
    //     return $plat_of_day_query;
    // }

    public function user_command($prénom, $nom, $telephone, $zone_de_livration) {
        $user_command_query = mysqli_query($this->conn, "INSERT INTO users_commands(prénom, nom, telephone, zone_de_livration, date) values ('$prénom', '$nom', '$telephone', '$zone_de_livration', NOW() )");
        return $user_command_query;
    }
}

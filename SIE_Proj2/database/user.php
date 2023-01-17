<?php
	
	function emailIsAvailable($email) {
		global $conn;
		
		$query = "SELECT  utilizador.email
				  FROM 	  utilizador
                  WHERE   email='$email'";

		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
        
        if (!$result) {
            echo "Error\n";
            return false;
        }

        if( pg_num_rows($result) > 0){
            //There is already an account with this email!
            return false;
        }

        //This email can be registered
        return true;		
	}

    function insertNewUser($email, $password, $name, $address, $cp, $phone, $nif){
		global $conn;
		
		$query = "INSERT INTO utilizador (email, password, nome, morada, cp, telemovel, nif, funcionario)
				  VALUES ('$email', 
                          '$password', 
                          '$name', 
                          '$address', 
                          '$cp', 
                          '$phone', 
                          '$nif',
                          false)";

        $result = pg_exec($conn, $query);

        if(!$result){
            echo "Error inserting new user\n";
            return false;
        }
        
        return true;
    }

    function getIdFromEmail($email){
		global $conn;
		
		$query = "SELECT  utilizador.id
				  FROM 	  utilizador
                  WHERE   email='$email'";

		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);

        if (!$result) {
            echo "Error\n";
            return -1;
        }
        $row = pg_fetch_assoc($result);
        return $row['id']; 
    }
		

?>
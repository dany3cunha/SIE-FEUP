<?php

function emailIsAvailable($email) {
    global $conn;
    
    $query = "  SELECT  utilizador.email
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
    
    $query = "  INSERT INTO utilizador (email, password, nome, morada, cp, telemovel, nif, funcionario)
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

function updateUser($id, $email, $password, $name, $address, $cp, $phone, $nif){
    global $conn;
    		        
    $query = "  UPDATE utilizador
                SET email       = '" . $email ."', 
                    password    = '". $password ."', 
                    nome        = '" . $name ."', 
                    morada      = '". $address ."', 
                    cp          = '". $cp ."', 
                    telemovel   = '". $phone ."', 
                    nif         = '". $nif ."' 
                WHERE id        ="  . $id .";";

    $result = pg_exec($conn, $query);

    if(!$result){
        echo "Error inserting new user\n";
        return false;
    }
    
    return true;
}

function getIdFromEmail($email){
    global $conn;
    
    $query = "  SELECT  utilizador.id
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

function getNameFromId($id){
    global $conn;
    
    $query = "  SELECT  utilizador.nome
                FROM 	  utilizador
                WHERE   id='$id'";

    $result = pg_exec($conn, $query);

    if (!$result) {
        echo "Error\n";
        return -1;
    }
    $row = pg_fetch_assoc($result);
    return $row['nome']; 
}

function getUserInfo($id){
    global $conn;
    
    $query = "  SELECT  utilizador.email        AS email,
                        utilizador.password     AS password,
                        utilizador.nome         AS nome,
                        utilizador.morada       AS morada,
                        utilizador.cp           AS cp,
                        utilizador.telemovel    AS telemovel,
                        utilizador.nif          AS nif,
                        utilizador.funcionario  AS funcionario 
                FROM    utilizador
                WHERE   id='$id'";

    $result = pg_exec($conn, $query);

    if (!$result) {
        echo "Error\n";
        return -1;
    }
    
    //variable $row contains the database records
    $row  = pg_fetch_assoc($result); 
    return $row; 
}

/**
* verifyLogin
* @param string $email Email that will be verified
* @param string $password Hashed password that will be verified
* @return boolean Returns user id or -1 if credentials weren't valid
*/
function verifyLogin($email, $password){
    global $conn;
    
    $query = "  SELECT  utilizador.id
                FROM 	utilizador
                WHERE   utilizador.email='$email' AND 
                        utilizador.password='$password'";

    //echo "DEBUG query: " . $query;

    $result = pg_exec($conn, $query);
    //echo "DEBUG num_rows: " . pg_num_rows($result);

    if( !$result or pg_num_rows($result) == 0){
        //No match found
        return -1;
    }

    $row = pg_fetch_assoc($result);
    return $row['id']; 
}
		

?>
<?PHP
	
	function getAllDepartments() {
		global $conn;
		
		$query = "select  departments.id 	As   department_id, 
						  departments.name 	As   department_name 
				  from 	  departments";
		//echo "DEBUG query: " . $query;
	
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
		
		return $result;
		//exit();		
	}
		
	function getDepartmentById($id) {
		global $conn;
		
		$query = "select  departments.id 	As   department_id, 
						  departments.name 	As   department_name 
				  from departments
				  where departments.id =" . $id . ";";
		//echo "DEBUG query: " . $query;
		
		$result = pg_exec($conn, $query);
		//echo "DEBUG num_rows: " . pg_num_rows($result);
				
		return $result;
		//exit();		
	}

?>
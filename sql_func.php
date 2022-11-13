<?php

try {

	// function to show tables in database using sqli
	function show_tables($sql)
	{
		// connect to database
		$conn = new mysqli("localhost", "root", "", "Iron-Will");
		// check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		// execute query
		$result = $conn->query($sql);
		// check if query executed successfully
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				echo "Table: " . $row["Tables_in_Trainer"] . "<br>";
			}
		} else {
			echo "0 results";
		}
		// close connection
		$conn->close();
	}


	function create_sql_table($conn, $table_name)
	{
		$sql = "CREATE TABLE $table_name (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			email VARCHAR(50),
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
		if ($conn->query($sql) === TRUE) {
			echo "Table $table_name created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
	}

	function display_sql_table($sql)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<table border='1'><tr>";
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				foreach ($row as $key => $value) {
					echo "<th>" . $key . "</th>";
				}
				echo "</tr>";
				break;
			}
			do {
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>" . $value . "</td>";
				}
				echo "</tr>";
			} while ($row = $result->fetch_assoc());
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
	}

	//get name of user from email
	function get_name($email)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$sql = "SELECT * FROM User WHERE email like '$email'";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				return $row["name"];
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}

	// check user hashed password from User table
	function check_password_match($email, $password)
	{
		$servername = "localhost";
		$username = "root";
		$dbpass = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT password FROM User WHERE email = '$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				$hashedPassword = $row["password"];
			}
		} else {
			echo "0 results";
		}
		$conn->close();
		return password_verify($password, $hashedPassword);
	}


	// check if user does not exist
	function user_exists($email)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM User WHERE email = '$email'";
		$result = $conn->query($sql);
		$conn->close();
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	function insert_into_table($sql)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$conn->query($sql);
		$conn->close();
	}

	// check if id already exists in User table
	function id_exists($id)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM User WHERE id = '$id'";
		$result = $conn->query($sql);
		$conn->close();
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	// get uid from email from User table
	function get_uid($email)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$sql = "SELECT * FROM User WHERE email like '$email'";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				return $row["id"];
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}

	// function to get Center location from center id	
	function get_center_location($center_id)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM Center WHERE id = '$center_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				return $row["location"];
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}
	function describe_table($sql)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<table border='1'><tr>";
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				foreach ($row as $key => $value) {
					echo "<th>" . $key . "</th>";
				}
				echo "</tr>";
				break;
			}
			do {
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>" . $value . "</td>";
				}
				echo "</tr>";
			} while ($row = $result->fetch_assoc());
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
	}

	function query_table($sql)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		$conn->close();
		if ($result->num_rows > 0) {
			return $result;
		}
		return NULL;
	}

	// function that returns the trainer ids of all trainer in the center id
	function get_trainer_ids($center_id)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM Trainer WHERE c_id = '$center_id'";
		$result = $conn->query($sql);
		$conn->close();
		if ($result->num_rows > 0) {
			// output data of each row
			$trainer_ids = array();
			while ($row = $result->fetch_assoc()) {
				array_push($trainer_ids, $row["id"]);
			}
			return $trainer_ids;
		} 
		return NULL;
	}
	
	// given a trainer id get all the details
	function get_trainer_details($trainer_id)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Iron-Will";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM Trainer WHERE id = '$trainer_id'";
		$result = $conn->query($sql);
		$conn->close();
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				return $row;
			}
		} 
		return NULL;
	}
	// given an array of trainer ids get all details in a associative array
	function get_all_trainer_details($trainer_ids)
	{
		$all_trainer_details = array();
		foreach ($trainer_ids as $trainer_id) {
			$trainer_details = get_trainer_details($trainer_id);
			array_push($all_trainer_details, $trainer_details);
		}
		return $all_trainer_details;
	}
	// given a center id, get all trainer details in a associative array
	function get_all_trainer_details_from_center($center_id)
	{
		$trainer_ids = get_trainer_ids($center_id);
		if ($trainer_ids == NULL) {
			return NULL;
		}
		$all_trainer_details = get_all_trainer_details($trainer_ids);
		return $all_trainer_details;
	}

} catch (Exception $e) {
	echo "error!!" . "<br>";
	echo "Error: " . $e->getMessage();
}
?>
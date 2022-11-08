<?php

	try
	{

	// function to show tables in database using sqli
	function show_tables($sql)
	{
		// connect to database
		$conn = new mysqli("localhost", "root", "", "Trainer");
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
		$dbname = "Trainer";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<table border='1'><tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				foreach($row as $key => $value)
				{
					echo "<th>".$key."</th>";
				}
				echo "</tr>";
				break;
			}
			do {
				echo "<tr>";
				foreach($row as $key => $value)
				{
					echo "<td>".$value."</td>";
				}
				echo "</tr>";
			} while($row = $result->fetch_assoc());
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
        $dbname = "Trainer";
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
            while($row = $result->fetch_assoc()) {
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
        $dbname = "Trainer";
        $conn = new mysqli($servername, $username, $dbpass, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT password FROM User WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
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
        $dbname = "Trainer";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM User WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }

	function insert_into_table($sql)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Trainer";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}

    // check if id already exists in User table
    function id_exists($id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Trainer";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM User WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }

	function describe_table($sql)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Trainer";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<table border='1'><tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				foreach($row as $key => $value)
				{
					echo "<th>".$key."</th>";
				}
				echo "</tr>";
				break;
			}
			do {
				echo "<tr>";
				foreach($row as $key => $value)
				{
					echo "<td>".$value."</td>";
				}
				echo "</tr>";
			} while($row = $result->fetch_assoc());
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
		$dbname = "Trainer";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<table border='1'><tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				foreach($row as $key => $value)
				{
					echo "<th>".$key."</th>";
				}
				echo "</tr>";
				break;
			}
			do {
				echo "<tr>";
				foreach($row as $key => $value)
				{
					echo "<td>".$value."</td>";
				}
				echo "</tr>";
			} while($row = $result->fetch_assoc());
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
	}

	}
	catch(Exception $e)
	{
		echo "error!!"."<br>";
		echo "Error: " . $e->getMessage();
	}


?>
<?php
// $servername = "localhost";
// $username = "root";
// $password = "780952@Drb";
// $database = "Test";

// $conn = new mysqli($servername, $username, $password, $database);

// if ($conn->connect_error) {
//     die("Connection failed:" . $conn->connect_error);
// } else {
//     echo "Connected successfully";
// }
// $sql = "INSERT INTO Users( Prefix,LastName,FirstName,Email,Age,State,Gender) VALUES(1,'Das','Akash','akdash@gmail.com',22,'odisha','male')";
// if ($conn->query($sql) == TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error:" . $sql . "<br />" . $conn->eror;
// }
class Singleton
{
	private static $instance = null;

	private function __construct()
	{
	}
	public static function getInstance()
	{
		if (self::$instance == null) {
			self::$instance = new Singleton();
		}
		return self::$instance;
	}
}

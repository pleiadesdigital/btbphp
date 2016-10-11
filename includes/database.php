<?php
require_once(LIB_PATH.DS."config.php");

class MySQLDatabase {

  private $connection;

//  OPEN CONNECTION
  function __construct() {
    $this->open_connection();
  }
  public function open_connection() {
    $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
      die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    } //mysqli_connect_errno()
  } //open_connection()

//  CLOSE CONNECTION
  public function close_connection() {
    if (isset($this->connection)) {
      mysqli_close($this->connection);
      unset($this->connection);
    } //isset($this->connection)
  } //close_connection()

//  QUERY
  
  public function query($sql) {
    $result = mysqli_query($this->connection, $sql);
    $this->confirm_query($result);
    return $result;
  } //query($sql)

  private function confirm_query($result) {
    if(!$result) {
      die("Database query failed.");
    } //!$result
  } //confirm_query($result)

  function escape_value($string) {
    $escaped_string = mysqli_real_escape_string($this->connection, $string);
    return $escaped_string;
  } //escape_value($string)

  // Database neutral (agnostic) functions
  
  public function fetch_array($result_set) {
    return mysqli_fetch_array($result_set);
  } //fetch_array($result_set)

  public function num_rows($result_set) {
    return mysqli_num_rows($result_set);
  } //num_rows($result_set)

  public function insert_id() {
    return mysqli_insert_id($this->connection);
  } //insert_id()

  public function affected_rows() {
    return mysqli_affected_rows($this->connection);
  } //affected_rows()

} //class MySQLDatabase

$database = new MySQLDatabase();
$db =& $database;










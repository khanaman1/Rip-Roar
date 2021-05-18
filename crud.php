<?php
     include_once "db.php";

  
     //include_once('DbConnection.php');
      
     class CrudOperation extends DbConnection{
        public $array;
         public function __construct(){
      
             parent::__construct();
         }
      
         public function check_login($username, $password){
      
             $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

             $query = $this->connection->query($sql);
      
             if($query->num_rows > 0){
                 $row = $query->fetch_array();
                 return $row['user_id'];
             }
             else{
                 return false;
             }
         }
      
         public function details($sql){
      
             $query = $this->connection->query($sql);
      
             $row = $query->fetch_array();
      
             return $row;       
         }
      
         public function escape_string($value){
      
             return $this->connection->real_escape_string($value);
         }

         public function register_user($name, $username, $email, $password, $country, $age) {
            $sql = "INSERT INTO users (name, email, username, password, age, country, role, status) VALUES ('$name', '$email', '$username', '$password', '$age', '$country', 0, 1)";
            //$query = $this->connection->query($sql);
            return $this->connection->query($sql);
         }

         public function fetch_data_with_id($table_name, $column_name, $id) {

            $sql = "SELECT * FROM $table_name WHERE $column_name = '$id'";

            $query = $this->connection->query($sql);
            if($query){
                $row = $query->fetch_array();
                return $row;
            }
            else 
            echo "Invalid sql ".$sql;

      
         }


         public function fetch_all_table_data($table_name) {
            $array = [];
            $sql = "SELECT * FROM $table_name";
            $query = $this->connection->query($sql);
      
            while($row = mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
     
         }

       

         public function fetch_datas_with_column($table_name, $column_name, $id) {
            $array = [];

            $sql = "SELECT * FROM $table_name WHERE $column_name = '$id'";
            $query = $this->connection->query($sql);
      
         
            while($row = mysqli_fetch_assoc($query)){
                if($row != null) $array[] = $row;
            }
            return $array;

         }


         public function insert_booking($user_id, $sport_detail_id, $booking_date, $price, $quantity) {
            $sql = "INSERT INTO booking ( user_id, sport_detail_id, booking_date, price, quantity) VALUES ('$user_id', '$sport_detail_id', '$booking_date', '$price', '$quantity')";
            //$query = $this->connection->query($sql);
            //return $this->connection->query($sql);
           // echo "<br>booking DATA: userID:". $user_id.", sportDetailID: ".$sport_detail_id.", bookingDate: ".$booking_date.", price: ".$price.", quantity: ".$quantity;
           // echo "<br>SQL: ".$sql;
            $this->connection->query($sql);
            return $this->connection->insert_id;
         }

         public function insert_slot($start_time, $end_time, $number_of_people, $slot_date) {
            $sql = "INSERT INTO slot (start_time, end_time, number_of_people, slot_date) VALUES ('$start_time', '$end_time', '$number_of_people', '$slot_date')";
            //$query = $this->connection->query($sql);
            //return $this->connection->query($sql);
            $this->connection->query($sql);
            return $this->connection->insert_id;
         }
         public function insert_booked_slot($booking_id, $slot_id) {
            $sql = "INSERT INTO booked_slot (slot_id, booking_id) VALUES ( '$slot_id','$booking_id' )";
            //$query = $this->connection->query($sql);
            return $this->connection->query($sql);
            //$this->connection->query($sql);
           // return $this->connection->insert_id();
         }
         
         public function update_numPeople_slot($slot_id, $updatedNumPeople) {
             $sql = "UPDATE slot SET number_of_people = '$updatedNumPeople' WHERE slot_id = '$slot_id'";
             return $this->connection->query($sql);
         }
         
         public function edit_table_info($table, $column, $data, $key, $value) {
            $sql = "UPDATE $table SET ";
            $sql .= "$column= '". $data;
            $sql .= "' WHERE $key = ". $value;

            return $this->connection->query($sql);
         }
         public function fetch_data_from_booking_detail($sport_detail_id, $start_time){
            $array = [];

            $sql = "SELECT * FROM booking_detail WHERE sport_detail_id = '$sport_detail_id' AND start_time = '$start_time'";
            $query = $this->connection->query($sql);
      
         
            while($row = mysqli_fetch_assoc($query)){
                if($row != null) $array[] = $row;
            }
            return $array;

            // $query = $this->connection->query($sql);
            // if($query){
            //     $row = $query->fetch_array();
            //     return $row;
            // }
            // else 
            //    { return false;
            // echo "Invalid sql ".$sql; }

         }

     }

     
     $crud = new CrudOperation;



?>
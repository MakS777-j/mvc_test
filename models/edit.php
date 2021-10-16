<?php
    class edit{

        function action($id){
            $conn = new mysqli('localhost', 'root', '', 'testdb');

            if($conn->connect_error){
                die("Connection error, " . $conn->connect_error);
            }

            $sql = "SELECT * FROM user_data WHERE id='$id' ;";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();

            return $result;
        }

    }
?>
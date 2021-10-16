<?php
    class delete{

        function action($id){
            $conn = new mysqli('localhost', 'root', '', 'testdb');

            if($conn->connect_error){
                die("Connection error, " . $conn->connect_error);
            }

            $id = $_POST['delete'];

            $sql = "SELECT image FROM user_data WHERE id = '$id';";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();
            $image = $result['image'];
            unlink($image);

            $sql = "SELECT max(id) FROM user_data;";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();
            $last_id = $result['max(id)']; 

            if($last_id != $id){                // если это не последняя запись

                $sql = "SELECT position FROM user_data WHERE id = '$id' ";
                $result = $conn->query($sql);
                $result = $result->fetch_assoc();
                $position = $result['position'];

                $sql = "DELETE FROM user_data WHERE id = '$id';";
                $conn->query($sql);

                $sql = "SELECT * FROM user_data WHERE id > '$id';";
                $result = $conn->query($sql);
                $next_elem_pos = $position + 1;

                while($entry = $result->fetch_assoc()){
                    
                    $sql = "UPDATE user_data SET position='$position' WHERE position = '$next_elem_pos'; ";
                    $conn->query($sql);
                    $position++;
                    $next_elem_pos++;
                }
            }
            $sql = "DELETE FROM user_data WHERE id = '$id';";
            $conn->query($sql);

            header("Location:main.php");
        }
    }
?>
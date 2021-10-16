<?php
    //model

    class system{

        function add($user, $user_file){ 
            $conn = new mysqli('localhost', 'root', '', 'testdb');
    
            if($conn->connect_error){
                die("Connection error, " . $conn->connect_error);
            }
    
            $sql = "SELECT position FROM user_data WHERE id = (SELECT max(id) FROM user_data);";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();
    
            $position = $result['position'];
            $position++;
    
            $name = $user['name'];
            $last_name = $user['last_name'];
            $num_phone = $user['num_phone'];
            $age = $user['age'];

            $file_name = $user_file['image']['name'];
            $file_size = $$user_file['image']['size'];
            $file_tmp = $user_file['image']['tmp_name'];
            $file_type = $user_file['image']['type'];
        
            $file_type = end(explode("/", $file_type));
            
            move_uploaded_file($file_tmp, "images/" . $file_name);// move file at our directory

            $path = 'images/' . $file_name;

            $sql = "INSERT INTO user_data(name, last_name, number, age, image, position)
                VALUES('$name', '$last_name', '$num_phone', '$age', '$path', '$position');";
    
            $conn->query($sql); 
            $conn->close();
            
        }

        function update($user){

            $conn = new mysqli('localhost', 'root', '', 'testdb');
    
            if($conn->connect_error){
                die("Connection error, " . $conn->connect_error);
            }
            $id = $user['id'];
            $name = $user['name'];
            $last_name = $user['last_name'];
            $num_phone = $user['num_phone'];
            $age = $user['age'];
            $path = 'tmp';

            $sql = "UPDATE user_data SET name='$name', last_name='$last_name', number='$num_phone', age='$age', image='$path' WHERE id='$id' ;";
            $conn->query($sql);     
            $conn->close();
        }

        static function get_data(){

            $conn = new mysqli('localhost', 'root', '', 'testdb');  //connect database
            $sql = "SELECT * FROM user_data;";                      
    
            $result = $conn->query($sql);
            $conn->close();

            return $result;
        }

    }
?>
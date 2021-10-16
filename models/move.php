<?php
    class move{

        function up($id){
            $conn = new mysqli('localhost', 'root', '', 'testdb');

            if($conn->connect_error){
                die("Connection error, " . $conn->connect_error);
            }

            $id = $_POST['move_up'];
            $sql = "SELECT * FROM user_data WHERE id='$id' ";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();
            
            $name = $result['name']; // данные пользователя которые надо переместить выше
            $last_name = $result['last_name'];
            $num_phone = $result['number'];
            $age = $result['age'];
            $image = $result['image']; 

            $position = $result['position']; 
            $position--;                    // позиция элемента выше

            $sql = "SELECT * FROM user_data WHERE position = '$position'; "; //даные которые надо переместить ниже
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();

            $replace_name = $result['name'];
            $replace_last_name = $result['last_name'];
            $replace_num = $result['number'];
            $replace_age = $result['age'];
            $replace_image = $result['image'];
            $replace_position = $result['position']; 
            $replace_position++; //позиция элемента ниже

            // перемещение данных выше
            $sql = "UPDATE user_data SET 
                    name='$name', 
                    last_name='$last_name', 
                    number='$num_phone', 
                    age='$age', 
                    image='$image' WHERE position = '$position';";
            $conn->query($sql); 

            //перемещение данных ниже
            $sql = "UPDATE user_data SET 
                    name='$replace_name', 
                    last_name='$replace_last_name', 
                    number='$replace_num', 
                    age='$replace_age', 
                    image='$replace_image' WHERE position = '$replace_position';";
            $conn->query($sql);
            $conn->close();
            header("Location: main.php");    
        }

        function down($id){
            $conn = new mysqli('localhost', 'root', '', 'testdb');

            if($conn->connect_error){
                die("Connection error, " . $conn->connect_error);
            }

            $id = $_POST['move_down'];
            $sql = "SELECT * FROM user_data WHERE id='$id' ";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc(); 
            
            $name = $result['name']; // данные пользователя которые надо переместить ниже
            $last_name = $result['last_name'];
            $num_phone = $result['number'];
            $age = $result['age'];
            $image = $result['image']; 
    
            $position = $result['position']; 
            $position++;            //позиция элемента ниже
    
            $sql = "SELECT * FROM user_data WHERE position = '$position'; "; //даные которые надо переместить выше
            $result = $conn->query($sql);
            $result = $result->fetch_assoc(); 
    
            $replace_name = $result['name'];
            $replace_last_name = $result['last_name'];
            $replace_num = $result['number'];
            $replace_age = $result['age'];
            $replace_image = $result['image'];
            $replace_position = $result['position']; 
            $replace_position--; //позиция элемента выше 
    
            // перемещение данных ниже
            $sql = "UPDATE user_data SET 
                    name='$name', 
                    last_name='$last_name', 
                    number='$num_phone', 
                    age='$age', 
                    image='$image' WHERE position = '$position';";
            $conn->query($sql); 
    
            //перемещение данных выше
            $sql = "UPDATE user_data SET 
                    name='$replace_name', 
                    last_name='$replace_last_name', 
                    number='$replace_num', 
                    age='$replace_age', 
                    image='$replace_image' WHERE position = '$replace_position';";
            $conn->query($sql);
            
            header("Location: main.php");
            $conn->close();
        }

    }
?>

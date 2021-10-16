
<?php
 
class show{
      
    function generate($data, $data_edit){

        include_once "template.php";
        edit_fields($data_edit);

        $submit_in_table = array('edit', 'delete', 'move_up', 'move_down');

        while($person = $data->fetch_assoc()){ //show table
            $id  = $person['id'];
            echo "<tr>";
        echo "<td>";
            foreach($submit_in_table as $key=>$value){
                echo "<form id='b', action='main.php', method='POST'>";
                echo "<input type='hidden', name='$value', value='$id'/>";
                echo "<input id='key_table', type='submit', value='$value'/>";
                echo "</form>";
            }
                echo "</td>";
                foreach($person as $key=>$value){
                    if($key == "image"){
                        echo "<td><img src='$value'>" . "</td>";
                    }
                    elseif($key == "id" or $key == "position"){
                        continue;
                    }
                    else{
                        echo "<td>" . $value ."</td>";
                    }
                }
            echo "</tr>";
            }
    }
}
?>
</table>

</section>
</body>
</html>
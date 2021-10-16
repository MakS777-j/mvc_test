<?php
    //controller 

    require "models/system.php";
    include "views/show.php";
    require "models/delete.php";
    require "models/move.php";
    require "models/edit.php";
        

    if(isset($_POST['edit'])){
        $submit  = new edit();
        $fields = $submit->action($_POST['edit']);
    }

    if(isset($_POST['delete'])){
        $submit = new delete();
        $submit->action($_POST['delete']);
    }

    if(isset($_POST['move_up'])){
        $submit = new move();
        $submit->up($_POST['move_up']);
    }

    if(isset($_POST['move_down'])){
        $submit = new move();
        $submit->down($_POST['move_down']);
    }


    if(isset($_POST['add'])){
        $submit = new system(); 

        if($_POST['id'] != ''){
            $submit->update($_POST);
        }
        else{
            $submit->add($_POST, $_FILES);
        }
    }

    $data = system::get_data(); // select data for view
    
    $show = new show();
    $show->generate($data, $fields);

?>
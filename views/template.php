<?php 
    function edit_fields($data_edit){
        return $data_edit;
    };
?>
<!DOCTYPE html>

<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <h1 align='center'>Sign in</h1>
    <section>

        <form action="main.php", enctype="multipart/form-data", method="POST">

            <input name='id', type='hidden', value="<?php echo $data_edit['id']; ?>"/>

            <p>Name: <br/>
            <input name="name", type="text", value="<?php echo $data_edit['name'];?>", autocomplete="off", placeholder="Enter your name"/></p><br/>
            <p>Last name: <br/>
            <input name="last_name", type="text", value="<?php echo $data_edit['last_name'];?>", autocomplete="off", placeholder="Enter your last name"/></p><br/>
            <p>Number phone: <br/>
            <input name="num_phone", type="text", value="<?php echo $data_edit['number'];?>", autocomplete="off", placeholder="Your number phone"/></p><br/>
            <p>Age: <br/>
            <input name="age", type="text", type="text", value="<?php echo $data_edit['age'];?>", autocomplete="off", placeholder="Your age"/></p><br/>
            <p>Add photo: <br/> 
            <input name="image", type="file", accept="image/*"/></p>

            <input type="submit", name="add", value="Сохранить"/> 
        </form>

    <table align='center'>
        <tr>
            <td></td>
            <td>Name</td>
            <td>Last name</td>
            <td>Phone</td>
            <td>Age</td>
            <td>Image</td>
        </tr>
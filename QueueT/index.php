<?php require 'Database_Controler.php';
$Q = new Queue();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">

        <label>ID</label>
        <input type="text" name="name" id="">
        <br>
        <select name="Choose">
            <option value="A">Table_A</option><br>
            <option value="B">Table_B</option><br>
            <option value="C">Table_C</option><br>
        </select>
        <br>
        <input type="submit" name="ADD" value="ADD"><br>
    </form>

    <?php

    if (isset($_POST['ADD']) & isset($_POST['name']) & isset($_POST['Choose']))
        $Q->Add_customer($_POST['name'], $_POST['Choose']);

    ?>




    <!--<form action="index.php" method="post">
        
        <label>ID</label>
        <input type="text" name="name" id="">
        <br>
        <input type="text" name="id" id="">
        <br>
        <input type="submit" name="Update" value="Update"><br>
    </form>-->

    <?php

    /*if(isset($_POST['Update'])&isset($_POST['id'])&isset($_POST['name']))
        $Q->Update_customer($_POST['id'],$_POST['name']);*/

    ?>


    <!--A-->
    <form action="index.php" method="post">

        <br>
        <input type="submit" name="Show--A" value="Show(A)"><br>
    </form>

    <?php
    if (isset($_POST['Show--A'])) {
        $res = $Q->POP_customer("A");
        if ($res != 0) {
            echo "ID = " . $res["id"] . "<br>";
            echo "Name  is : " . " " . $res["name"];
        }

        $row = $Q->Select_All("A");

        for ($i = 0; $i < 3; $i++) {
            if (!empty($row[$i])) {
                echo "<br>" . $row[$i]["id"] . "/" . $row[$i]["name"] . "<br>";
            }
        }
    }
    ?>

    <hr>

    <!--B-->
    <form action="index.php" method="post">

        <br>
        <input type="submit" name="Show--B" value="Show(B)"><br>
    </form>

    <?php
    if (isset($_POST['Show--B'])) {
        $res = $Q->POP_customer("B");
        if ($res != 0) {
            echo "ID = " . $res["id"] . "<br>";
            echo "Name  is : " . " " . $res["name"];
        }

        $row = $Q->Select_All("B");

        for ($i = 0; $i < 3; $i++) {
            if (!empty($row[$i])) {
                echo "<br>" . $row[$i]["id"] . "/" . $row[$i]["name"] . "<br>";
            }
        }
    }
    ?>

    <hr>

    <!--C-->
    <form action="index.php" method="post">

        <br>
        <input type="submit" name="Show--C" value="Show(C)"><br>
    </form>

    <?php
    if (isset($_POST['Show--C'])) {
        $res = $Q->POP_customer("C");
        if ($res != 0) {
            echo "ID = " . $res["id"] . "<br>";
            echo "Name  is : " . " " . $res["name"];
        }

        $row = $Q->Select_All("C");

        for ($i = 0; $i < 3; $i++) {
            if (!empty($row[$i])) {
                echo "<br>" . $row[$i]["id"] . "/" . $row[$i]["name"] . "<br>";
            }
        }
    }
    ?>



</body>

</html>
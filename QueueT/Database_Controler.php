<?php

class Queue
{

    private $con;

    public function __construct()
    {
        #----------CONNECTION MYSQLI AND CREATE DATABASE----------#

        $con = new mysqli("localhost", "root", "");

        if ($con->connect_error) {
            echo "Could not Connect ";
        }

        if ($con->query("CREATE DATABASE IF NOT EXISTS Queue;") === False) {

            echo "Error creating database: " . $con->error;
        }


        #----------CONNECTION DATABASE AND CREATE TABLE----------#

        $con = mysqli_connect("localhost", "root", "", "queue");


        #----------CREATE TABLE_A----------#
        $sql = "CREATE TABLE IF NOT EXISTS Table_A(
                id int AUTO_INCREMENT,
                name varchar(255) NOT NULL,  
                PRIMARY KEY(id)
                );";

        if ($con->query($sql) === False) {

            echo "Error creating Table: " . $con->error;
        }

        #----------CREATE TABLE_B----------#
        $sql = "CREATE TABLE IF NOT EXISTS Table_B(
                id int AUTO_INCREMENT,
                name varchar(255) NOT NULL,  
                PRIMARY KEY(id)
                );";

        if ($con->query($sql) === False) {

            echo "Error creating Table: " . $con->error;
        }


        #----------CREATE TABLE_C----------#
        $sql = "CREATE TABLE IF NOT EXISTS Table_C(
                id int AUTO_INCREMENT,
                name varchar(255) NOT NULL,  
                PRIMARY KEY(id)
                );";

        if ($con->query($sql) === False) {

            echo "Error creating Table: " . $con->error;
        }



        $con->close();
    }


    #----------ADD_CUSTOMER----------#

    public function Add_customer($name, $Table)
    {
        $con = mysqli_connect("localhost", "root", "", "queue");


        #**********RETURN ID TO ZERO IF DATA IS NOT FOUND**********#

        $table_name = "Table_" . $Table;
        $result = mysqli_query($con, "SELECT * FROM $table_name");

        if (mysqli_num_rows($result) == 0) {

            $con->query("ALTER TABLE $table_name AUTO_INCREMENT = 1 ;");
        }
        #**********************************************************#


        $con->query("INSERT INTO $table_name SET name='$name';");

        $con->close();
    }


    #----------Delete_CUSTOMER----------#

    public function Delete_customer($id, $Table)
    {
        $table_name = "Table_" . $Table;
        $con = mysqli_connect("localhost", "root", "", "queue");

        $con->query("DELETE FROM $table_name WHERE ID = '$id';");

        $con->close();
    }




    #----------Update_CUSTOMER----------#

    public function Update_customer($id, $name, $Table)
    {
        $table_name = "Table_" . $Table;

        $con = mysqli_connect("localhost", "root", "", "queue");

        $con->query("UPDATE $table_name SET NAME = '$name'  WHERE ID = '$id';");

        $con->close();
    }





    #----------POP_CUSTOMER----------#

    public function POP_customer($Table)
    {

        $con = mysqli_connect("localhost", "root", "", "queue");


        #**********Error Massage IF QUEUE IS EMPTY**********#
        $table_name = "Table_" . $Table;

        $result = mysqli_query($con, "SELECT * FROM $table_name");

        if (mysqli_num_rows($result) == 0) {


            return 0;
        }
        #**********************************************************#
        else {

            #**********RETURN ID  AND  NAME OF CUSTOMER  AND DELETE CUSTOMER OF THE DATABASE**********#

            $ret = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table_name"));

            $this->Delete_customer($ret["id"], $Table);

            $con->close();

            return $ret;
        }
    }


    #----------SELECT_ALL_CUSTOMER----------#
    public function Select_All($Table)
    {

        $con = mysqli_connect("localhost", "root", "", "queue");


        $table_name = "Table_" . $Table;

        $result = mysqli_query($con, "SELECT * FROM $table_name");


        #**********************************************************#


        #**********RETURN ID  AND  NAME OF ALL CUSTOMER IN QUEUE **********#
        $arr = array();
        $sql = mysqli_query($con, "SELECT * FROM $table_name");

        while ($ret = mysqli_fetch_assoc($sql)) {
            array_push($arr, $ret);
        }



        $con->close();

        return $arr;
    }
}

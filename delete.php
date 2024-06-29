<?php
include("config.php");

$id=$_GET['id'];

$del_qry=$conn->query("delete from appointment1 where id='$id'");

if($del_qry)
{
    header("Location:deletedsuccess.html");
}

?>
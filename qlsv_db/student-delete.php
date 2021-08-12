<?php
require './libs/students.php';
 
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    delete_student($id);
}
 
header("location: student-list.php");
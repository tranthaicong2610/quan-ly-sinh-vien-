<?php
global $conn;
function connect_db()
{
    global $conn;
    if(!$conn)
    {
        $conn=mysqli_connect('localhost','root','','qlsv_db') or die ('Can not not connect to database');
        mysqli_set_charset($conn,'utf8');


    }

}
function disconnect_db()
{
    global $conn;
    if($conn)
    {
        mysqli_close($conn);

    }
}
function get_all_students()
{
    global $conn;
    connect_db();
    $sql="select * from tb_sinhvien";
    $query=mysqli_query($conn,$sql);
    $result=array();
    if($query)
    {
        while($row=mysqli_fetch_assoc($query))
        {
            $result[]=$row;
        }
    }
    return $result;
}
function get_student($student_id)
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from tb_sinhvien where sv_id = {$student_id}";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
     
    return $result;
}
function add_student($student_name, $student_sex, $student_birthday)
{
    global $conn;
     
    connect_db();
     
    // Chống SQL Injection
    $student_name = addslashes($student_name);
    $student_sex = addslashes($student_sex);
    $student_birthday = addslashes($student_birthday);
     
    $sql = "
            INSERT INTO tb_sinhvien(sv_name, sv_sex, sv_birthday) VALUES
            ('$student_name','$student_sex','$student_birthday')
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
function edit_student($student_id, $student_name, $student_sex, $student_birthday)
{
    global $conn;
     
    connect_db();
     
    // Chống SQL Injection
    $student_name       = addslashes($student_name);
    $student_sex        = addslashes($student_sex);
    $student_birthday   = addslashes($student_birthday);
     
    $sql = "
            UPDATE tb_sinhvien SET
            sv_name = '$student_name',
            sv_sex = '$student_sex',
            sv_birthday = '$student_birthday'
            WHERE sv_id = $student_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
function delete_student($student_id)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            DELETE FROM tb_sinhvien
            WHERE sv_id = $student_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
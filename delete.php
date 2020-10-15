<?php
   $severname='localhost';
   $username ='root';
   $password = '';
   $dbname = 'thuchanh1';
   $user ="";
   $password="";
   $conn = new mysqli($severname,$username,$password,$dbname);
   if($conn->connect_error){
      die("Connection faile : ".$conn->connect_error);
   }
  if(isset($_GET['id'])){
  	$delete_id ='';
  	$delete_id =$_GET['id'];
   	$sql = "DELETE FROM task WHERE id ='$delete_id'";
   	$result = $conn->query($sql);
    header('location:http://localhost:8081/bai1/home.php');
    }
 
?>
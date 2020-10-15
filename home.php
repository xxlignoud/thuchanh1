<!DOCTYPE html>
<html>
<head>
   <title></title>
   <style type="text/css">
    h3 {
    border: solid;
    border-color: #CCCCCC;
    background: #CCCCCC;
    }
    h1 {
    border: solid;
    border-color: #99FFFF;
    background: #99FFFF;
     
   </style>
</head>
<body>
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <h1> Task </h1>

   <h3 align="right"><button type="submid" name="dangxuat"> Đăng Xuất </button></h3>
   <input type="text" name="text"> 
   <br>
   <br>
   <button  type="submid" name="add" style="color: blue "> Add Task </button>
   <br>
   <h1>Hiển thị các task </h1>
   <br>
     <table bgcolor="pink" border="3px">
      <tr>
         <th> STT</th>
         <th> TASK </th>
         <th> CHỨC NĂNG</th>
      </tr>
   <?php
   $user ="";
   $password=""; 
   $conn = mysqli_connect("localhost","root","","thuchanh1");
   if($conn->connect_error){
      die("Connection faile : ".$conn->connect_error);
   }
  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   }
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST["add"])){
       $text = test_input($_POST["text"]);
       $sql = "INSERT INTO task(textt) VALUES('$text')";   
      if($conn->query($sql)==true){             
       }
       else{
       echo "error".$sql."<br>".$conn->error;
        }  
   }
   }
  $sql = "SELECT*FROM task";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $i=0;
    while($row = $result->fetch_assoc()){
       $i++;
       echo
       "
       </tr>
             <td> ".$i." </td>
             <td> ".$row["textt"]." </td>
             <td> <a href='http://localhost:8081/bai1/delete.php?id=".$row["id"]."' > Xóa </td>    
       </tr>";
    }
  } 
  if(isset($_POST['dangxuat'])){
    header('location:http://localhost:8081/bai1/login.php');
     }
   ?>
   </table>
   </form>
</body>
</html>
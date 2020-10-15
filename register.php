 <!DOCTYPE HTML>
<html>
<head>
  <title>Bài 1</title>
  <style type="text/css">
    form {
        box-sizing: border-box;
        width: 260px;
        margin: 100px auto 0;
        box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
        padding-bottom: 40px;
        border-radius: 3px;
      }
    form h1 {
      box-sizing: border-box;
      padding: 20px;
    }
     
    input {
      margin: 40px 25px;
      width: 200px;
      display: block;
      border: none;
      padding: 10px 0;
      border-bottom: solid 1px #1abc9c;
      transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
      background-position: -200px 0;
      background-size: 200px 100%;
      background-repeat: no-repeat;
      color: #0e6252;
    }
    input:focus, input:valid {
      box-shadow: none;
      outline: none;
      background-position: 0 0;
    }
    input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
      color: #1abc9c;
      font-size: 11px;
      transform: translateY(-20px);
      visibility: visible !important;
    }
     
    button {
      border: none;
      background: #1abc9c;
      cursor: pointer;
      border-radius: 3px;
      padding: 6px;
      width: 200px;
      color: white;
      margin-left: 25px;
      box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
    }
    button:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>Đăng Ký Tài Khoản</h1>
    <input placeholder="Username" type="text" required="" name="user">
    <input placeholder="Password" type="password" required="" name ="password">  
    <input placeholder="Re-password" type="password" required="" name ="repassword">
    <button type="submit" name="dangky"> Đăng Ký</button>
    </form>
 <?php
  $user ="";
  $password="";
  $repassword="";
  $conn = mysqli_connect("localhost","root","","thuchanh1");
	if($conn->connect_error){
		die("Connection faile : ".$conn->connect_error);
	}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["dangky"])){
          $user = test_input($_POST["user"]);
          $password = test_input($_POST["password"]);
          $repassword=test_input($_POST["repassword"]);
          if($password == $repassword){
          $sql = "INSERT INTO taikhoan(user,password) VALUES('$user','$password')";     
          if($conn->query($sql)==true){ 
           header('location:http://localhost:8081/bai1/login.php');
        
            exit();
         
          }else{
          echo "error".$sql."<br>".$conn->error;
           }
          }
          else{
            echo "<h5> Đăng ký không thành công ! </h5> ";
          }
       } 
       }   
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
   
    ?>
</body>
</html>

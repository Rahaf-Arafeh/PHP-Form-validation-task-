<?php 
session_start();
        
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php 
      
        $msg="";
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username1=$_POST['username1'];
            $email1=$_POST['email1'];
            $password1=$_POST['password1'];
                   try{
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        if(empty($email1) || empty($password1) || empty($username1)){
                            $msg="<label>All Field Required!!</label>";
                        }
                        else{
                            $query="SELECT * FROM users WHERE password='$password1' AND email='$email1'";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $count=$stmt->rowCount();
                            if($count>0){
                                    $_SESSION['username']=$username1;
                                    header("Location:http://localhost/FORM-PROJECT/Landing.php");
                                  }
                            else {
                                $msg="<label>Username or password are wrong!!</label>";
                            }
                        }
                  } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                  }
         
            
        }
   
      
        ?>
<div class="container px-5 my-5">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <?php
             if(isset($msg))
              echo '<label class="form-label text-danger">'.$msg.'</label>';
             ?>
             <div class="mb-3">
            <label class="form-label" for="emailAddress">Username </label>
            <input class="form-control" id="username" name='username1' type="text" placeholder="username" data-sb-validations="required" 
            required/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailAddress">Email Address</label>
            <input class="form-control" id="emailAddress" name='email1' type="email" placeholder="Email Address" data-sb-validations="required,email" 
            required/>
            <span id="email_err"></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" id="password" type="password" name='password1' placeholder="Password" data-sb-validations="required" 
            required/>
            <span id="pass_err"></span>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Sign In</button>
            <p>you don't have account <a href="Signup.php">Sign Up</a></p>
        </div>
    </form>
</div>

</body>
</html>
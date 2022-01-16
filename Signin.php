<?php 
        
        session_start();
        $flag=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              echo "rrrrrrrr";
            if(!empty($_POST['email1']) && !empty($_POST['password1'])){
               $flag=true;
            }
           
            if ($flag){
                foreach($_SESSION['users'] as $user){
                  if ($user['email']==$_POST['email1'] && $user['password']==$_POST['password1'])
                    header("Location:Landing.php");
                }
            }
            
        }
   
      
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
<div class="container px-5 my-5">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="Landing.php" method="POST">
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
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Sign In</button>
            <p>you don't have account <a href="Signup.php">Sign Up</a></p>
        </div>
    </form>
</div>
<!-- <script>
       let email=document.getElementById('emailAddress');
      let password=document.getElementById('password');
  function emailValidation(){
      let email_err=document.getElementById('email_err');
      let email_regx="[a-z0-9]+@[a-z]+.[a-z]{2,3}";
      if(email.value.match(email_regx)){
          email_err.innerText="Valid";
          email_err.style.color="green";
      }
      else{
        email_err.innerText=" Not Valid";
          email_err.style.color="red";
      }
  }
  function passwordValidation(){
      let pass_err=document.getElementById('pass_err');
      if(password.value.length<8){
        pass_err.innerText=" Not Valid";
          pass_err.style.color="red";
      }
      else{
        pass_err.innerText=" Valid";
          pass_err.style.color="green";
      }
  }
</script> -->
<!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
</body>
</html>
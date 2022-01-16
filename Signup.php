<?php 
        session_start();
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
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $email_regx= "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
            $flag=0;
            echo "khkjhkhjkhk";
        
            if(!empty($_POST['email']) && preg_match($email_regx,$_POST['email'])){
                $flag++;
                echo "one";
            }
            echo "222222222222";
            if(!empty($_POST['password']) && strlen($_POST['password'])>=8){
                $flag++;
                echo "two";
            }
            if(!empty($_POST['cofirm_password']) && $_POST['password']==$_POST['cofirm_password']){
                $flag++;
                echo "three";
            }
            if ($flag==3){
               $_SESSION['users'][] = ['email'=>$_POST['email'],'password'=>$_POST['password']];
               header('Location:http://localhost/FORM-PROJECT/Signin.php'); 

            }
            // else if($flag>=3 && issest($_SESSION['users'])){
            //     $_SESSION['users'][]= ['email'=>$_POST['email'],'password'=>$_POST['password']];
            //     header('Location:http://localhost/FORM-PROJECT/Signin.php'); 
            // }
           
        }
        else echo "ffffffffffffff";
        echo $_POST['email'];
        var_dump($_SESSION['users']);
        
       
    ?>
<div class="container px-5 my-5">
    <form id="contactForm"   action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label" for="emailAddress">Email Address</label>
            <p><?php echo $_POST['email']; ?></p>
            <input class="form-control" id="emailAddress" type="email" name="email" placeholder="Email Address"  data-sb-validations="required,email"
             onchange="emailValidation()" required/>
            <span id="email_err"></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password" data-sb-validations="required"
            onchange="passwordValidation()" required/>
            <span id="pass_err"></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirmPassword">Confirm Password</label>
            <input class="form-control" id="confirmPassword" type="password" name="cofirm_password" placeholder="Confirm Password" data-sb-validations="required"
            onchange="confirmPassValidation()" required/>
            <span id="conf_password_err"></span>
        </div>
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
            <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Sign Up</button>
        </div>
        <p>you already have account <a href="Signin.php">Sign In</a></p>
    </form>
</div>
<script> 

      let email=document.getElementById('emailAddress');
      let password=document.getElementById('password');
      let confPassword=document.getElementById('confirmPassword');
      function validation(){
          if(emailValidation() && passwordValidation() && confirmPassValidation()){
              return true;
          }
          else {
              return false;
          }
      }
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
  function confirmPassValidation(){
      let conf_password_err=document.getElementById('conf_password_err');
      if(confPassword.value == password.value){
        conf_password_err.innerText=" Valid";
        conf_password_err.style.color="green";
      }
      else{
        conf_password_err.innerText="Not Valid";
        conf_password_err.style.color="red";
      }
  }
      
</script>
</body>
</html>
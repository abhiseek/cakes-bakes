<?php require('../config/autoload.php'); ?>
<?php
$dao=new DataAccess();


//if(isset($_SESSION['name']))
   // header('location:student/index.php');



$elements=array("email"=>"","password"=>"");
$form=new FormAssist($elements,$_POST);
$rules=array(
    'email'=>array('required'=>true),
    'password'=>array('required'=>true),
);
$validator=new FormValidator($rules);

if(isset($_POST['email']))
{
    if($validator->validate($_POST))
    {
        $data=array('uemail'=>$_POST['email'],'upassword'=>$_POST['password']);
        if($info=$dao->login($data,'users'))
        { 
          echo '<div class="c-welcome">Welcome aboard!</div>';
            $_SESSION['email']=$info['uemail'];
$a=$_SESSION['email'];

	echo "<script> alert('$a');</script> ";	
		
   echo"<script> location.replace('../displaycategory.php'); </script>";
			
           // header('location:student/index.html');
       


 }
        else{
            $msg="invalid username or password";
			
				echo "<script> alert('Invalid username or password');</script> ";
        }
    }

    
}
?>

<html >
  <head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <input class="c-checkbox" type="checkbox" id="start">
<input class="c-checkbox" type="checkbox" id="progress2">
<input name="login" value="login" class="c-checkbox" type="checkbox" id="finish">

<div class="c-form__progress" ></div>


<div class="c-formContainer">
  <div class="c-welcome">Welcome aboard!</div>
  <form method="POST" class="c-form" id="myForm">
    
    <!--<div class="c-form__group">
      <label class="c-form__label" for="username">
                    <input
                        type="text"
                        id="username"
                        class="c-form__input"
                        placeholder=" "
                        pattern="[^\s]+"
                        required>
                    <label class="c-form__next" for="progress2" role="button">
                        <span class="c-form__nextIcon"></span>
                    </label>
      <span class="c-form__groupLabel">Create your username.</span>
      <b class="c-form__border"></b>
      </label>
    </div> -->

    <div class="c-form__group">
      <label class="c-form__label" for="email">
                    <input
                    name="email"
                        type="email"
                        id="email"
                        class="c-form__input"
                        placeholder=" "
                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                        required>

                    <label class="c-form__next" for="progress2" role="button">
                        <span class="c-form__nextIcon"></span>
                    </label>

      <span class="c-form__groupLabel">Enter your email.</span>
      <b class="c-form__border"></b>
      </label>
    </div>

    <div class="c-form__group">
      <label class="c-form__label" for="password">
                    <input
                    name="password"
                        type="password"
                        id="password"
                        class="c-form__input"
                        placeholder=" "
                        required>

                    <label id="submitButton" class="c-form__next" for="finish" role="button">
                        <span class="c-form__nextIcon"></span>
                    </label>

      <span class="c-form__groupLabel">Enter your password.</span>
      <b class="c-form__border"></b>
      </label>
    </div>
<script>
  const form = document.getElementById('myForm');
const submitButton = document.getElementById('submitButton');

// Add a click event listener to the button
submitButton.addEventListener('click', function (e) {
  e.preventDefault(); // Prevent the default form submission

  // Trigger the form's submit event
  form.submit();
});
  </script>
    <label class="c-form__toggle" for="start">Login<span class="c-form__toggleIcon"></span></label>
  </form>
</div>



<html >
  <head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- <style> 
                         c-formContainer {
                      width: 180px;
                      height: 65px;
                      z-index: 1;
                      display: flex;
                      justify-content: center;
                    }
                    c-welcome {
                      position: absolute;
                      width: max-content;
                      height: inherit;
                      font-size: 40px;
                      color: #ffffff;
                      opacity: 0;
                      transition: 0.3s;
                    }
                    </style> -->
  </head>
  <?php
//session_start(); // Start the session

require('../../config/autoload.php');

$dao = new DataAccess();

$elements = ["username" => "", "password" => ""];
$form = new FormAssist($elements, $_POST);
$rules = [
    'username' => ['required' => true],
    'password' => ['required' => true],
];
$validator = new FormValidator($rules);

if (isset($_POST['username'])) {
    if ($validator->validate($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === "abhishek" && $password === "admin123") {
            $_SESSION['username'] = $username; // Store the username in a session variable

            echo '<div style="font-size: 30px; color: white; font-weight: bold;">Welcome aboard, '. $username .'!</div>';
echo '<script>
    setTimeout(function(){
      window.location.href = "../header.php";
    }, 1000);
</script>';
            exit;
        } else {
            $msg = "Invalid username or password";
            echo "<script>alert('Invalid username or password');</script>";
        }
    }
}
?>



  <input class="c-checkbox" type="checkbox" id="start">
<input class="c-checkbox" type="checkbox" id="progress2">
<input name="login" value="login" class="c-checkbox" type="checkbox" id="finish">

<div class="c-form__progress" ></div>


<div class="c-formContainer">
  <!-- <div class="c-welcome">Welcome aboard!</div> -->
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
      <label class="c-form__label" for="username">
                    <input
                    name="username"
                        type="username"
                        id="username"
                        class="c-form__input"
                        placeholder=" "
                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                        required>

                    <label class="c-form__next" for="progress2" role="button">
                        <span class="c-form__nextIcon"></span>
                    </label>

      <span class="c-form__groupLabel">Enter your username.</span>
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


 <?php 
 /**
  * This file contains php for all the forms in the website.
  */

  session_start();
  include_once 'crud.php';
  $msg = null;
  $register_errors = ['password'=> null, 'confirm_password'=>null];

  /**
   * LOGIN FORM PROCESSING.
   */

  if(isset($_POST['btnLoginSubmit'])){
    $username = $crud->escape_string($_POST['username']);
    $password = $crud->escape_string($_POST['password']);

    $auth = $crud->check_login($username, md5($password));
        if(!$auth){
            $_SESSION['loginErrorMessage'] = 'Invalid username or password';
        // header('location:index.php');
        //header("location:login.php");
        // echo 'asfsdf';
        }
        else{
            $_SESSION['user'] = $auth;
            unset($_SESSION['message']);
            header('location:profile.php');
        }
    }

// /**
//  * REGISTER FORM PROCESSING.
//  */

if(isset($_POST['btnRegisteSubmit'])){

    $username = $crud->escape_string($_POST['username']);
    $password = $crud->escape_string($_POST['password']);
    if(strlen($password) >= 6) {
        if($password == $_POST['confirmPassword']) {

            $registration = $crud->register_user($_POST['name'], $_POST['username'], $_POST['email'],md5($_POST['password']), $_POST['country'], $_POST['age']);

            if($registration) {
                $auth = $crud->check_login($username, md5($password));
                if($auth){
                    $_SESSION['user'] = $auth;
                    header('location:profile.php');
                }
            }
            else {
                $msg = "Registration failed!";
            }
        }
        else $register_errors['confirm_password'] = "Password and confirm-password don't match!";

    }
    else $register_errors['password'] = "Password must be atleast 6 letter long";
    // $auth = $user->check_login($username, $password);



}

//destroying the session when logout is pressed
if(isset($_GET['logout'])) {
    session_destroy();
    header('location: index.php');

}

if(isset($_POST['user_edit'])) {
    $user_info = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);

    if(!empty($_POST['name'])) {
        $crud->edit_table_info('users', 'name', $_POST['name'], 'user_id', $_SESSION['user']);
        $msg="User info edited!";
    }
    if(!empty($_POST['username'])) {
      $crud->edit_table_info('users', 'username', $_POST['username'], 'user_id', $_SESSION['user']);
      $msg="User info edited!";
    }
    if(!empty($_POST['pass1']) and !empty($_POST['pass2'])) {
        if($pass1 == $pass2) {
          $crud->edit_table_info('users', 'password', md5($_POST['pass1']), 'user_id', $_SESSION['user']);
        }
        $msg="User info edited!";
    }
    if(!empty($_POST['age'])) {
      
        $crud->edit_table_info('users', 'age', $_POST['age'], 'user_id', $_SESSION['user']);
        $msg="User info edited!";
  }
}

if(isset($_GET['deactivate']) && isset($_GET['user'])) {
    $crud->edit_table_info('users', 'status', '0', 'user_id', $_GET['user']);
    $msg="User Deactivated!";
}

if(isset($_GET['activate']) && isset($_GET['user'])) {
    $crud->edit_table_info('users', 'status', '1', 'user_id', $_GET['user']);
    $msg="User Activated!";
}


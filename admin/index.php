<?php include "layouts/login-header.php"; ?>
<?php 


   if(isset($_POST["doLogin"])){
      $csrf        =  $_POST["csrf"];
      $username    =  trim($_POST["username"]);
      $password    =  trim($_POST["password"]);
      
      if(empty($csrf)){
         $errorMsg   =  "Token missing";
         $code = 1;
      }else if($csrf != '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
         $errorMsg   =  "Not a valid token";
         $code = 1;
      }else{
         if($username == ""){
            $errorMsg   =  "You didn't enter your username";
            $code = 2;
         }else if($password == ""){
            $errorMsg   =  "You didn't enter your password";
            $code = 3;
         }else{
            $query      =  "SELECT * FROM tbl_admin_login WHERE username = '$username'";
            $runQuery   =  $connect->query($query);
            if(mysqli_num_rows($runQuery) > 0){
               $dataObj    =  $runQuery->fetch_object();
               if($password == $dataObj->password){
                  $userdata   =  array(
                     "admin_id_pk"  =>    $dataObj->admin_id_pk,
                     "username"     =>    $dataObj->username
                  );
                  $_SESSION['userdata']   =  $userdata;
                  header("Location:dashboard/");
                  exit();
               }else{
                  $errorMsg   =  "Incorrect Password";
                  $code = 3;
               }
            }else{
               $errorMsg   =  "Your account not registered.";
               $code = 1;
            }

         }
      }

   }
?>
<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 14px;
   font-style: normal;}
</style>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
            <?php if(isset($errorMsg) && $code ==1): ?>
               <div class="alert alert-danger text-center" role="alert"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo" style="text-align:center;">
                  <img src="../img/Welcomelogo.png" style="width:25%;">
                </div>
                <h4 style="text-align:center;">Hello! let's get started</h4>
                <h6 class="font-weight-light" style="text-align:center;">Sign in to continue.</h6>
                <form class="pt-3" method="POST">
                  <input type="hidden" name="csrf" value="<?php echo "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; ?>">
                  <div class="form-group">
                    <input type="text"  class="form-control form-control-lg <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" placeholder="Username" name="username" value="<?php if(isset($username)){echo $username;} ?>">
                     <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="password" placeholder="Password"  value="<?php if(isset($password)){echo $password;} ?>">
                  <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="doLogin">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                 <!--  <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-facebook mr-2"></i>Connect using facebook </button>
                  </div> -->
                 <!--  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
<?php include "layouts/login-footer.php"; ?>
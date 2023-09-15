<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Admin Login</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/plugins/feather/feather.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head> 

<body class="app app-login p-0">    	

<div class="spinner-wrapper">
<img src="../assets/3D/divineloader.gif"  alt="../assets/3D/divineSeal3d.gif">
  
</div>

	
<div class="main-wrapper login-body">
<div class="container-fluid px-0">
<div class="row">
   <style>
            /* Custom CSS to remove border and cover the background */
            .login-wrap {
				border: none;
              border-radius: 0; 
        
            }
          </style>
<div class="col-lg-16 login-wrap">
<div class="login-sec">
<style>



.spinner-wrapper {
      background-color: #F5F6FE;
      position: fixed;
      top: 0;
      left: 0; 
      width: 100%;
      height: 100%;
      z-index: 9999;
      display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.2s;
    }

    .spinner-wrapper img{
      width: 20%;
      height: 20%;
    }

    .text-primary {
      color: #2E37A4!important;
    }


    .log-img {
      margin-top: 650px;
      width: 810px;
      height: 350px;
      background-image: url('../assets/img/gege.gif');
      background-size: cover; /* Adjust the sizing of the background image */
      mix-blend-mode: overlay; /* Add position relative to position child elements */
    }

	.overlay-img img {
  width: 650px; /* Adjust the width to make the image smaller or larger */
  height: auto; /* Maintain the image's aspect ratio */
  margin-top: -1800px;
  animation: floatAnimation 12s ease-in-out infinite; /* Add the animation */

}

                        @keyframes floatAnimation {
                          0%, 100% {
                            transform: translateY(0);
                          }
                          50% {
                            transform: translateY(-20px);
                          }
                        }


                        .spinner-wrapper:before,
                        .spinner-wrapper:after {
                            content: "";
                            position: absolute;
                            height: 100px;
                            width: 100px;
                            background-color: #3330ca;
                            border-radius: 80%;
                            z-index: -1;
                            opacity: 0.7;
							
                        }

                        .spinner-wrapper:before {
                            animation: pulse 2s ease-out infinite;
                        }

                        .spinner-wrapper:after {
                            animation: pulse 2s 1s ease-out infinite;
                        }

                        @keyframes pulse {
                            100% {
                                transform: scale(2.6);
                                opacity: 0;
                            }
                        }


.spinner-wrapper:before,
                        .spinner-wrapper:after {
                            content: "";
                            position: absolute;
                            height: 100px;
                            width: 100px;
                            background-color: #3330ca;
                            border-radius: 80%;
                            z-index: -1;
                            opacity: 0.7;
							
                        }

                        .spinner-wrapper:before {
                            animation: pulse 2s ease-out infinite;
                        }

                        .spinner-wrapper:after {
                            animation: pulse 2s 1s ease-out infinite;
                        }

                        @keyframes pulse {
                            100% {
                                transform: scale(2.6);
                                opacity: 0;
                            }
                        }



  </style>
 <div class="log-img">
    <!-- Background Image -->
  </div>
  <div class="overlay-img">
    <img src="../assets/img/adminside.png" alt="Overlay Image">
  </div>
</div>
</div>

<style>
            /* Custom CSS to remove border and cover the background */
            .login-wrapper {
			margin-left:-400px;
        
            }
          </style>
	<div class="col-lg-6 login-wrap-bg">
		<div class="login-wrapper">
			<div class="loginbox">
				<div class="login-right">
					<div class="login-right-wrap">

	
		
<h2>Admin Login</h2>
<form class="auth-form login-form" action="function/funct.php" method="POST">         
						<div class="email mb-3">
								<label class="sr-only" for="signup-email">Username</label>
								<input id="signup-name" name="username" type="text" class="form-control signup-name" placeholder="Username" required="required">
							</div>
							<?php
								if(isset($_SESSION['failed'])){
									echo $_SESSION['failed'];
									unset($_SESSION['failed']);
								}
							?>
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<?php
									if(isset($_SESSION['failed'])){
										echo $_SESSION['failed'];
										unset($_SESSION['failed']);
									}
								?>
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group login-btn">
								<button name="login" type="submit" class="btn btn-primary btn-block">Log In</button>
							</div>
						</form>


						<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.php" >here</a>.</div>
</div>
</div>
</div>
</div>
</div>

<script> 
const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

window.addEventListener('load', () => {
  spinnerWrapperEl.style.opacity = '1';

  setTimeout(() => {
    spinnerWrapperEl.style.display = 'none';
  }, 2500);
})
</script>

	<script src="../assets/js/jquery-3.6.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/feather.min.js"></script>

<script src="../assets/js/app.js"></script>
</body>
</html> 


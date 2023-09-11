<?php
	session_start();
	include '../db.php';
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Admin Signup</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

	<link rel="stylesheet" href="../assets/plugins/feather/feather.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" type="text/css" href="../assets/css/style.css">


</head> 





<body class="app app-signup p-0">    	
    <div class="row g-0 main-wrapper">
	    <div class="col-12 col-md-7 col-lg-6">
		    <div>
			    <div class="login-wrap-form col-md-7 col-lg-6">	
				<div class="login-wrapper">
        <div class="loginbox">
            <div class="login-right">
                <div class="login-right-wrap">

				<style>

					a.app-link {
						color: green;
					}

					
					a.text-link {
						color: #15a362;
					}


					.login-wrap-form {
						position: absolute;
						/* margin-left: 130px; */
						/* padding: 15px 90px 15px; */
						height: 100%;	
					}

					.app-btn-primary {
						padding: 10px 15px!important;
						font-size: 16px;
						border-radius: 12px;
						font-weight: 100;
					}


					.login-wrapper .loginbox {
						width: fit-content!important;
					}

					.login-wrapper .loginbox .login-right {
						height: fit-content!important;
						width: fit-content!important;
						padding: 50px 50px 50px 50px;
						
					}


					
					
					.app-signup .auth-background-holder {
						/* position: fixed;
  						top: 0;
						right: 0;
						bottom: 0;
						left: 700px; */
						border-radius: 0px 65px 65px 0px!important;
						transform: scaleX(-1);
						z-index: -1;
						height: 100vh!important;
						
						}


					.auth-background-mask {
						border-radius: 0px 65px 65px 0px!important;
						transform: scaleX(-1);
					}			
					.ton {
						
    					box-shadow: 0px 80px 80px rgba(46, 55, 164, 0.03);
    					border-radius: 24px;
   						display: flex;
    					max-width: 830px;
    					width: 100%;
					}

					.account-logo {
							margin-top:-75px;
                            height: 150px;
                            width: 150px;
                            /* background: linear-gradient(
                                #8a82fb,
                                #407ed7
                            ); */
                            position: absolute;
                            /* margin: auto;
                            left: 0;
                            right: 0;
                            top: 0;
                            bottom: 0; */
                            /* border-radius: 50%; */
                            display: grid;
                            place-items: center;
                            font-size: 50px;
                            /* color: #ffffff; */
                            z-index: 1; /* Adjust the z-index to place it in front of other elements */
                        }

                        .account-logo:before,
                        .account-logo:after {
                            content: "";
                            position: absolute;
                            height: 25px;
                            width: 25px;
                            background-color: #3330ca;
                            border-radius: 80%;
                            z-index: -1;
                            opacity: 0.7;
							margin-left: -115px;
							margin-top: 4px;
                        }

                        .account-logo:before {
                            animation: pulse 2s ease-out infinite;
                        }

                        .account-logo:after {
                            animation: pulse 2s 1s ease-out infinite;
                        }

                        @keyframes pulse {
                            100% {
                                transform: scale(2.6);
                                opacity: 0;
                            }
                        }

						

					
				</style>
				    <div class="account-logo">
                        <a href="index.html"><img src="../assets/img/login-logo.png" alt></a>
                    </div>
					<br><br>
					<h2>Sign up to Portal</h2>					
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" action="function/funct.php" method="POST">         
						<div class="email mb-3">
								<label class="sr-only" for="signup-email">Username</label>
								<input id="signup-name" name="username" type="text" class="form-control signup-name" placeholder="Username" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="School Email" required="required">
							</div>
							<?php
								if(isset($_SESSION['failed'])){
									echo $_SESSION['failed'];
									unset($_SESSION['failed']);
								}
							?>
							<div class="email mb-3">
							<label class="sr-only" for="signup-email">Role</label>
							<select id="role" name="role" class="form-control role" required="required">
								<option value="" selected disabled>Select your role</option>
								<option value="1">Nurse in GS and JHS</option>
								<option value="2">Nurse in SHS</option>
								<option value="3">Nurse in College</option>
								<option value="4">Dentist in GS, JHS & SHS</option>
								<option value="5">Dentist in College</option>
								<option value="6">Physician in GS, JHS & SHS</option>
								<option value="7">Physician in College</option>
								
								<!-- Add more options for different email types if needed -->
							</select>
							</div>

							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
							<div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" required id="RememberPassword">
									<label class="form-check-label" for="RememberPassword">
									I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
									</label>
								</div>
							</div><!--//extra-->
							<div class="text-center">
								<input type="text" name="type" value="1" style="display: none;">
								<button name="signup" type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
							</div>
						</form><!--//auth-form-->
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login.php" >Log in</a></div>
					</div><!--//auth-form-container-->	
			    </div><!--//auth-body-->
		    </div>   
	    </div>
				</div>
				</div>
			</div>
		</div>
	    <div class="col-12 col-md-7 col-lg-6 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		
			    
	    </div>
    
    </div><!--//row-->


</body>
</html> 


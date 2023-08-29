<?php
	session_start();
	include '../db.php';
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>User Signup</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo"><img class="logo-icon me-2" src="assets/images/dwcl.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>					
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" action="function/funct.php" method="POST">         
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Name</label>
								<input id="signup-name" name="fullname" type="text" class="form-control signup-name" placeholder="Full name" required="required">
							</div>
							<div class="email mb-3">
							<label class="sr-only" for="signup-email">Level of Education</label>
							<select id="signup-name" name="leveleduc" class="form-control signup-role" required="required">
								<option value="" selected disabled>--Select--</option>
								<option value="1">Grade School/Junior High School</option>
								<option value="2">Senior High School</option>
								<option value="3">College</option>
							</select>
							</div>
							<?php
								if(isset($_SESSION['failed'])){
									echo $_SESSION['failed'];
									unset($_SESSION['failed']);
								}
							?>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your ID Number</label>
								<input id="signup-name" name="idnumber" type="text" class="form-control signup-idnumber" placeholder="ID Number" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="School Email" required="required">
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
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				</div>
		    </div>
	    </div>
    
    </div><!--//row-->


</body>
</html> 


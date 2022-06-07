<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/img/logo.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-register100">
				<span class="register100-form-title">
					Registration
				</span>
				<div class="register100-pic js-tilt" data-tilt>
					<img src="assets/img/register.png" alt="IMG">
				</div>

				<form class="register100-form validate-form">
					<div class="wrap-input100 validate-input" data-validate="Valid name is required: ex@abc.xyz">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid studentid is required: ex@abc.xyz">
						<input class="input100" type="text" name="studentid" placeholder="Student ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid dateofbirth is required: ex@abc.xyz">
						<input class="input100" type="date" name="dateofbirth" placeholder="Date of Birth">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid profile is required: ex@abc.xyz">
						<input class="input100 file100" type="file" name="profilepic">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-camera" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid address is required: ex@abc.xyz">
						<input class="input100" type="text" name="address" placeholder="Address">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-book" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid gender is required: ex@abc.xyz">
						<input class="input100" type="text" name="gender" placeholder="Gender">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-venus-mars" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid username is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid idcard is required: ex@abc.xyz">
						<input class="input100 file100" type="file" name="idcard" placeholder="ID Card">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-credit-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-register100-form-btn">
						<button class="register100-form-btn">
							Sign Up
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Already have Account?
						</span>
						<a class="txt2" href="/login">
							Login here
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>
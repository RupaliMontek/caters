<!doctype html>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url('uploads/css/style.css') ?>">
 <link rel="shortcut icon" href="<?php echo base_url('template/images/favicon.png')?>" />
  <link rel="stylesheet" href="<?php echo base_url('template/css/Mystyle.css')?>">
	</head>
	<body class="forloginpagebodyy">
	<section class="loginsectionn">
		<div class="container">
			<div class="row loginsectionnInn">
				<div class="col-md-5 col-lg-5 col-12 loginimgg">
						<!-- <div class="img" style="background-image: <?php echo base_url('images/bg-1.jpg'); ?>"> -->
                        <!-- <div class="img" style="background-image: url('<?php echo base_url('uploads/images/login-dish.jpg'); ?>');"> -->
<img src="<?php echo base_url('uploads/images/login-dish.jpg'); ?>" width="100%" height="auto">
                    </div>
						<div class="col-md-7 col-lg-7 col-12">
			      			<h3 class="mb-4">Sign In</h3>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
					<form action="<?php echo base_url('home/check_login') ?>" method= "POST" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" name="name" id="name" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group loginbuttonss">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
<button type="button" class="forgotpwbtnnn" data-bs-toggle="modal" data-bs-target="#forgotpww">
  Forgot Password
</button>
<!-- Modal -->
<div class="modal fade loginforgotpww" id="forgotpww" tabindex="-1" aria-labelledby="forgotpwwLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
		  <button type="button" class="close modalclosebtnnn" data-bs-dismiss="modal">×</button>
		    <div class="modal-body">
		        <h4 class="">Forgot Password ?</h4>
		          <p>Please enter your email address and we will send you an email about how to reset your password</p>
		          <form class="form-horizontal" method="post" name="forgot_pass_check_register_email" id="forgot_pass_check_register_email" action="" onsubmit=""> 
			          <div class="row">
					          <div class="col-md-12 col-xs-12 col-sm-12">
					            <input type="text" class="form-control" placeholder="Email">
					          </div>
					          <div class="col-md-12 col-xs-12 col-sm-12">
					            <button type="submit" class="btn btn-primary">Reset Password</button>
					          </div>
			          </div>
		          </form>
		    </div>
      </div>
    </div>
</div>

		            </div>
		          </form>
		          <!-- <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p> -->
		        </div>
				</div>
			</div>
		</div>
	</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('js/popper.js') ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('js/main.js') ?>"></script>

	</body>
</html>


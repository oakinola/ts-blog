<!--START register/register.php -->
<?php 
	$responseMessage = '';
	$showMessage = false;
	$messageType = '';
	//var_dump($_REQUEST);
	
	$course_name = "NO COURSE SELECTED";
	if (isset($_REQUEST['course_name'])) {
		$course_name = $_REQUEST['course_name'];
	}	

	if (isset($_REQUEST['oak_errors'])) {
	 	if (isset($oak_errors['empty_firstname'][0])) {
	 		$empty_firstname = $oak_errors['empty_firstname'][0];
		 }
		 
		 if (isset($oak_errors['empty_surname'][0])) {
			$empty_surname = $oak_errors['empty_surname'][0];
		}

		if (isset($oak_errors['invalid_email'][0])) {
			$invalid_email = $oak_errors['invalid_email'][0];
		}

		if (isset($oak_errors['invalid_mobile'][0])) {
			$invalid_mobile = $oak_errors['invalid_mobile'][0];
		}
	} else if (isset($_REQUEST['error_message'])) {
		$showMessage = true;
		$messageType = 'Error';
		$responseMessage = $_REQUEST['error_message'];
	} else if (isset($_REQUEST['success_message'])) {
		$showMessage = true;
		$messageType = 'Success';
		$responseMessage = $_REQUEST['success_message'];
	} 
?>

<section class="registration ptb-150">
	<div class="container ">
		<div class="text-center text-lg-left dark-grey-text">
  			<div class="row d-flex justify-content-center">
				<div class="col-md-6">

					<form class="text-center" action="<?= admin_url('admin-post.php') ?>" method="post">
            			<input type="hidden" name="action" value="registration_form">
						<input type="hidden" name="registration_form_nonce" value="<?php echo wp_create_nonce('registration-form-nonce'); ?>"/>

						<h1 class="h3-display mb-5">Register for: <?php echo $course_name ?></h1>

						<?php if ($showMessage)  { ?>
							<div class="alert mb-5 <?php echo ($messageType === 'Success') ? 'alert-success' : 'alert-danger'?>" role="alert">
								<h4 class="alert-heading"><?php echo ($messageType === 'Success') ? 'Success!' : 'Error!'?></h4>
								<p><?= $responseMessage ?></p>
							</div>
						<?php } ?>

						<input type="text" name="course_name" id="form-registration-coursename" class="form-control mb-4" value="<?php echo $course_name ?>" readonly>
						
						<div class="form-row mb-4">
							<div class="col">
								<input type="text" name="firstname" id="form-registration-first-name" class="form-control <?php echo (!empty($empty_firstname)) ? 'is-invalid': "" ?>" value="" aria-describedby="firstNameFeedback" placeholder="First name" required/>
								<?php if (!empty($empty_firstname)) { ?> 
									<div id="firstNameFeedback" class="invalid-feedback">
										<?php echo $empty_firstname; ?>
									</div>
								<?php } ?>
							</div>
							<div class="col">
								<input type="text" name="surname" id="form-registration-surname" class="form-control <?php echo (!empty($empty_surname)) ? 'is-invalid': "" ?>" value="" aria-describedby="surnameFeedback" placeholder="Surname" required/>
								<?php if (!empty($empty_surname)) { ?> 
									<div id="surnameFeedback" class="invalid-feedback">
										<?php echo $empty_surname; ?>
									</div>
								<?php } ?>
							</div>
						</div>
						
						<input type="email" name="email" id="form-registration-email" class="form-control mb-4 <?php echo (!empty($invalid_email)) ? 'is-invalid': "" ?>" value="" aria-describedby="emailFeedback" placeholder="E-mail" required/> 
						<?php if (!empty($invalid_email)) { ?> 
							<div id="emailFeedback" class="invalid-feedback">
								<?php echo $invalid_email; ?>
							</div>
						<?php } ?>

						<!-- Phone number -->
						<input type="tel" pattern="[0-9]{11}" name="mobile" id="form-registration-mobile" class="form-control mb-4 <?php echo (!empty($invalid_mobile)) ? 'is-invalid': "" ?>" value="" aria-describedby="mobileFeedback" placeholder="Mobile Phone"/> 
						<?php if (!empty($invalid_mobile)) { ?> 
							<div id="mobileFeedback" class="invalid-feedback">
								<?php echo $invalid_mobile; ?>
							</div>
						<?php } ?>
						<small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
							Optional - So I can get in touch with you
						</small>

						<button type="submit" class="btn jad-btn-filled btn-md my-4 btn-block" type="submit">Register</button>
						<input type="hidden" name="submitted" value="true">

						<hr>

						<p>By clicking <em>Sign up</em> you agree to our <a href="" target="_blank">terms of service</a> </p>
					</form>
				</div>
  			</div>
		</div>
	</div>
</section>
<!--END register/register.php -->
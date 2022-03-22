<!-- START contact/subscribe.php -->
<section class="subscribe jad-bg-dark ptb-100">
	

	<?php 
		$responseMessage = '';
		$showMessage = false;
		$messageType = '';
		//var_dump($_REQUEST['oak_errors']);
		if (isset($_REQUEST['subscribe_oak_errors'])) {
			$oak_errors = $_REQUEST['subscribe_oak_errors'];
			
			if (isset($oak_errors['invalid_email'][0])) {
				$invalid_email = $oak_errors['invalid_email'][0];
			}

		} else if (isset($_REQUEST['subscribe_error_message'])) {
			var_dump($_REQUEST['subscribe_error_message']);
			$showMessage = true;
			$messageType = 'Error';
			$responseMessage = $_REQUEST['subscribe_error_message'];
			//echo '<span class="success"><strong>' . __('Success') . '</strong>: ' . $_REQUEST['success_message'] . '</span><br/>';
			//echo '</div>';
		} else if (isset($_REQUEST['subscribe_success_message'])) {
			$showMessage = true;
			$messageType = 'Success';
			$responseMessage = $_REQUEST['subscribe_success_message'];
		} 
	?>

	<div class="container py-5 z-depth-1">
		<div class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 text-center">
					<h4 class="font-weight-bold mb-4 white-text">Subscribe</h4>
					<form action="<?= admin_url('admin-post.php') ?>" method="post">					
						<div class="input-group mb-4">						
							<input type="hidden" name="action" value="subscribe_form">
							<input type="hidden" name="subscribe_form_nonce" value="<?php echo wp_create_nonce('subscribe-form-nonce'); ?>"/>

							<?php if ($showMessage)  { ?>
								<div class="alert <?php echo ($messageType === 'Success') ? 'alert-success' : 'alert-danger'?>" role="alert">
									<h4 class="alert-heading"><?php echo ($messageType === 'Success') ? 'Success!' : 'Error!'?></h4>
									<p><?= $responseMessage ?></p>
								</div>
							<?php } ?> 

							<input type="email" name="email" class="form-control <?php echo (!empty($invalid_email)) ? 'is-invalid': "" ?>" value="" aria-describedby="emailFeedback" required placeholder="Enter your email address" aria-label="Enter your email address" id="form-contact-email"/>
							<?php if (!empty($invalid_email)) { ?> 
								<div id="emailFeedback" class="invalid-feedback">
									<?php echo $invalid_email; ?>
								</div>
							<?php } ?>
							<div class="input-group-append">
								<button class="btn jad-btn-filled  m-0 px-3 py-2 z-depth-0 waves-effect" type="submit" id="emailFeedback">Submit</button>
							</div>						
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END contact/subscribe.php --> 
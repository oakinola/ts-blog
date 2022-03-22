<!-- START contact/contact.php -->
<section class="contact-section ptb-150-100" style="opacity: 0.8; background-image: url(<?php echo content_url();?>/uploads/jenavi-original-2.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<div class="container">
	<?php 
		$responseMessage = '';
		$showMessage = false;
		$messageType = '';
		//var_dump($_REQUEST['oak_errors']);
		if (isset($_REQUEST['oak_errors'])) {
			$oak_errors = $_REQUEST['oak_errors'];

			if (isset($oak_errors['empty_fullname'][0])) {
				$empty_fullname = $oak_errors['empty_fullname'][0];
			}

			if (isset($oak_errors['invalid_email'][0])) {
				$invalid_email = $oak_errors['invalid_email'][0];
			}

			if (isset($oak_errors['invalid_reason'][0])) {
				$invalid_reason = $oak_errors['invalid_reason'][0];
			}

			if (isset($oak_errors['empty_mobile'][0])) {
				$empty_mobile = $oak_errors['empty_mobile'][0];
			}

			if (isset($oak_errors['empty_message'][0])) {
				$empty_message = $oak_errors['empty_message'][0];
			}

			if (isset($oak_errors['invalid_date'][0])) {
				$invalid_date = $oak_errors['invalid_date'][0];
			}

		} else if (isset($_REQUEST['error_message'])) {
			$showMessage = true;
			$messageType = 'Error';
			$responseMessage = $_REQUEST['error_message'];
	  	} else if (isset($_REQUEST['success_message'])) {
			$showMessage = true;
			$messageType = 'Success';
			$responseMessage = $_REQUEST['success_message'];
		} ?>

   		<div class="row d-flex justify-content-end">
   			<div class="col-12 col-md-6">
  				<form class="card mx-md-5" action="<?= admin_url('admin-post.php') ?>" method="post">
            		<input type="hidden" name="action" value="contact_form">
					<input type="hidden" name="contact_form_nonce" value="<?php echo wp_create_nonce('contact-form-nonce'); ?>"/>

				<?php if ($showMessage)  { ?>
					<div class="alert <?php echo ($messageType === 'Success') ? 'alert-success' : 'alert-danger'?>" role="alert">
						<h4 class="alert-heading"><?php echo ($messageType === 'Success') ? 'Success!' : 'Error!'?></h4>
						<p><?= $responseMessage ?></p>
					</div>
				<?php } ?>

        			<div class="card-body form">
          				<h2 class="mt-4 text-center"><i class="fas fa-envelope pr-2"></i>Contact Me</h2>
						<div class="md-form mb-0">
							<select required name="reason" id="form-contact-reason" class="mdb-select md-form <?php echo (!empty($invalid_reason)) ? 'is-invalid': "" ?>" aria-describedby="reasonFeedback">
								<option value="0" disabled selected>Please Select A Reason</option>
								<option value="1">Book Me</option>
								<option value="2">Book A Lesson</option>
								<option value="3">Give a Feedback</option>
								<option value="4">Other Reason</option>
							</select>
							<label for="form-contact-reason" class=""></label>
							<?php if (!empty($invalid_reason)) { ?> 
								<div id="reasonFeedback" class="invalid-feedback">
									<?php echo $invalid_reason; ?>
								</div>
							<?php } ?>
						</div>
						<div class="md-form mb-0 md-outline input-with-post-icon datepicker">
							<input type="text" name="eventdate" placeholder="Event Date" id="form-contact-eventdate" class="form-control <?php echo (!empty($invalid_date)) ? 'is-invalid': "" ?>" value="" aria-describedby="eventdateFeedback">
							<label for="form-contact-eventdate">When is your event?</label>
							<?php if (!empty($invalid_date)) { ?> 
								<div id="eventdateFeedback" class="invalid-feedback">
									<?php echo $invalid_date; ?>
								</div>
							<?php } ?>
							<i class="fas fa-calendar input-prefix" tabindex=0></i>
						</div>
						<div class="md-form mb-0">
							<input type="text" name="fullname" id="form-contact-name" class="form-control <?php echo (!empty($empty_fullname)) ? 'is-invalid': "" ?>" value="" aria-describedby="fullnameFeedback" required/>
							<label for="form-contact-name" class="">Your full name</label>
							<?php if (!empty($empty_fullname)) { ?> 
								<div id="fullnameFeedback" class="invalid-feedback">
									<?php echo $empty_fullname; ?>
								</div>
							<?php } ?>
						</div>
						<div class="md-form mb-0">
							<input type="email" name="email" id="form-contact-email" class="form-control <?php echo (!empty($invalid_email)) ? 'is-invalid': "" ?>" value="" aria-describedby="emailFeedback" required/> 
							<label for="form-contact-email" class="">Your Email Address</label>
							<?php if (!empty($invalid_email)) { ?> 
								<div id="emailFeedback" class="invalid-feedback">
									<?php echo $invalid_email; ?>
								</div>
							<?php } ?>
						</div>
						<div class="md-form mb-0">
							<input type="text" name="mobile" id="form-contact-phone" class="form-control <?php echo (!empty($empty_mobile)) ? 'is-invalid': "" ?>" value="" aria-describedby="mobileFeedback" required/>
							<label for="form-contact-phone" class="">Your Mobile Phone</label>
							<?php if (!empty($empty_mobile)) { ?> 
								<div id="mobileFeedback" class="invalid-feedback">
									<?php echo $empty_mobile; ?>
								</div>
							<?php } ?>
						</div>						
						<div class="md-form mb-4">
							<textarea name="message" id="form-contact-message" class="form-control md-textarea <?php echo (!empty($empty_message)) ? 'is-invalid': "" ?>" rows="5" aria-describedby="messageFeedback" required></textarea>
							<label for="form-contact-message">Your message</label>
							<?php if (!empty($empty_message)) { ?> 
								<div id="messageFeedback" class="invalid-feedback">
									<?php echo $empty_message; ?>
								</div>
							<?php } ?>
							</a>
						</div>
						<button type="submit" class="btn jad-btn-filled btn-md btn-block ml-0 mb-0" aria-label="Submit">Submit</button>
						<input type="hidden" name="submitted" value="true">
					</div>
				</form>
			</div>
    	</div>
	</div>
</section>
<!-- END contact/contact.php -->
<?php
/*
Template Name: Contact
*/
?>

<?php
	global $data;
	$site_name = $data['ab_contact_from_name_str'];
	$email_address = $data['ab_contact_email_address_str'];
	$email_subject = $data['ab_contact_form_subject_str'];
	$name_text = $data['ab_contact_name_field_str'];
	$email_text = $data['ab_contact_email_field_str'];
	$message_text = $data['ab_contact_message_field_str'];

	//If the form is submitted
	if(isset($_POST['submitted'])) {
		
		$name = trim($_POST['contactName']);
		$email = trim($_POST['email']);
	
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
		
		$emailTo = $email_address;
		$subject = $email_subject;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "$name_text: $name \n\n$email_text: $email \n\n$message_text: $comments";
		$headers = 'From: '.$site_name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		
		mail($emailTo, $subject, $body, $headers);

		$emailSent = true;

	}
?>

<?php get_header(); ?>

<!-- OPEN #contact -->
<section class="section clearfix" id="contact">

	<div class="section-heading clearfix">
		<div class="container">
			<div class="section-heading-content sixteen columns">
				<h1><?php echo do_shortcode(stripslashes($data['ab_contact_title_str'])); ?></h1>
				<div class="sub-heading">
					<span class="section-desc"><?php echo do_shortcode(stripslashes($data['ab_contact_tag_str'])); ?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="section-content container">

		<div class="contact-wrap sixteen columns">

			<!-- /////// CONTACT FORM /////// -->

			<div class="eleven columns page-text alpha">

				<div class="contact-intro-text">
					<p><?php echo do_shortcode(stripslashes($data['ab_contact_text_str'])); ?></p>
				</div>

				<p class="thanks"><?php echo do_shortcode(stripslashes($data['ab_contact_success_text_str'])); ?></p>
			
				<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
			
					<ul class="forms">
						<li>
							<label for="contactName"><?php echo do_shortcode(stripslashes($data['ab_contact_name_field_str'])); ?></label>
							<input type="text" name="contactName" id="contactName" value="" class="requiredField" />
						</li>
						
						<li>
							<label for="email"><?php echo do_shortcode(stripslashes($data['ab_contact_email_field_str'])); ?></label>
							<input type="text" name="email" id="email" value="" class="email-input requiredField email" />
						</li>
						
						<li class="textarea"><label for="commentsText"><?php echo do_shortcode(stripslashes($data['ab_contact_message_field_str'])); ?></label>
							<textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField"></textarea>
						</li>
						<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit"><?php echo do_shortcode(stripslashes($data['ab_contact_send_btn_str'])); ?></button></li>
					</ul>

				</form>

			</div>

			<!-- /////// CONTACT SIDEBAR /////// -->

			<?php get_sidebar('contact'); ?>

		</div>

	</div>
	
<!-- CLOSE #contact -->
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>
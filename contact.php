<?php require_once 'header.php'; ?>
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<h1>Contact Us</h1>
			<form id="contact-form" method="post" action="http://localhost/assignment-8/inc/send-mail.php">
				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>
				<div class="mb-3">
					<label for="subject" class="form-label">Subject</label>
					<input type="text" class="form-control" id="subject" name="subject" required>
				</div>
				<div class="mb-3">
					<label for="message" class="form-label">Message</label>
					<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Send Message</button>
			</form>
		</div>
	</div>
</div>
<?php require_once 'footer.php'; ?>
	<?php require_once 'app/views/templates/headerPublic.php' ?>

	<main role="main" class="container">
			<div class="page-header text-center mb-4" id="banner">
					<div class="row">
							<div class="col-lg-12">
									<h1 class="display-4">You are not logged in</h1>
							</div>
					</div>
			</div>

			<div class="row justify-content-center">
					<div class="col-sm-6 col-md-4">
							<?php
							session_start();
							if (isset($_SESSION['lockout_message'])) {
									echo '<div class="alert alert-danger" role="alert">' . $_SESSION['lockout_message'] . '</div>';
									unset($_SESSION['lockout_message']); // Clear the message after displaying it
							}
							?>
							<div class="card">
									<div class="card-body">
											<form action="/login/verify" method="post">
													<fieldset>
															<div class="form-group">
																	<label for="username">Username</label>
																	<input required type="text" class="form-control" name="username" placeholder="Enter your username">
															</div>
															<div class="form-group">
																	<label for="password">Password</label>
																	<input required type="password" class="form-control" name="password" placeholder="Enter your password">
															</div>
															<br>
															<button type="submit" class="btn btn-primary btn-block">Login</button>
															<a href="/signup" class="btn btn-secondary btn-block">Sign Up</a>
													</fieldset>
											</form>
									</div>
							</div>
					</div>
			</div>
	</main>

	<?php require_once 'app/views/templates/footer.php' ?>

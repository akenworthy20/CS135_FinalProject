<?php
	class PagesController {
		public function home() {
			require_once('view/pages/home.php');
		}
		public function aboutUs() {
			require_once('view/pages/aboutUs.php');
		}
		public function studentRegister() {
			require_once('view/pages/studentRegister.php');
			//check if form is complete, validate
			if (isset($_POST['submit'])) {
				if (empty($_POST['name'])) {
					echo "<alert> Name is required </alert>";
				} else {
					$name = sanitize($_POST['name']);
					if (!preg_match("/^[a-zA-Z]*$/",$name)) {
						echo "<alert> Please use only letters and white space </alert>";
					}
				}

				if (empty($_POST['email'])) {
					echo "<alert> E-mail is required </alert>";
				}
				$email = sanitize($_POST['email']);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo "<alert> Please enter a valid e-mail </alert>";
				}

				if (empty($_POST["phone"])) {
		        echo "<alert> Please input full, valid US phone number </alert>";
		    } else {
		      $phone = test_input($_POST["phone"]);
		      // check phone number syntax to ensure it is 10 digits long, exactly
		      if (!preg_match("/[\d{3}]-?[\d{3}]-?[\d{4}]/",$phone)) {
		        echo "<alert> Please input full, valid US phone number </alert>";
		      }
			}
			//call model to submit data
			require_once('model/formSubmit.php');
		}
		public function tutorRegister() {
			require_once('view/pages/tutorRegister.php');
		}
		public function error() {
			require_once('view/pages/error.php');
		}
		public function sanitize($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
		}
	}
?>

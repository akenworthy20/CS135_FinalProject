<?php
	class PagesController {
		public function home() {
			require_once('view/pages/home.php');
			require_once('model/loginCheck.php');
		}
		public function aboutUs() {
			require_once('view/pages/aboutUs.php');
		}
		public function studentRegister() {
			require_once('view/pages/studentRegister.php');

			//call model to submit data
			require_once('model/formSubmit.php');

		}
		public function tutorRegister() {
			require_once('view/pages/tutorRegister.php');
			require_once('model/formSubmit.php');
		}
		public function error() {
			require_once('view/pages/error.php');
		}

	}
?>

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
		}
		public function tutorRegister() {
			require_once('view/pages/tutorRegister.php');
		}
		public function error() {
			require_once('view/pages/error.php');
		}
	}
?>

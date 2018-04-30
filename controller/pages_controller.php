<?php
	class PagesController { 
		public function home() { 
			require_once('view/pages/home.php');
		}
		public function register() { 
			require_once('view/pages/registration.php');
		}
		public function error() { 
			require_once('view/pages/error.php');
		}
	}
?>

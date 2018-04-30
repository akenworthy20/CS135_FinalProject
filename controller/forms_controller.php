<?php
  class FormsController {
    public function validateForm() {
      require_once('validateForm.php');
      if(isset($_POST['Submit'])) {
        
        if() {
            echo "<h2>Registratoin Success!</h2>";
        } else {
            echo "<B>Validation Errors</B>";
        }
      }
    }
  }
?>

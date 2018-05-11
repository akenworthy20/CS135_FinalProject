<?php
  function call($controller, $action) {
    //require the file that controller requests
    require_once('controller/' . $controller . '_controller.php');

    //create a new instance of a controller
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
    }

    //call the action
    $controller->{ $action }();
  }

  //create a list of all the controllers that are defined
  $controllers = array('pages' => ['home','aboutUs','studentRegister','tutorRegister','error','studentHome','tutorHome']);

  //check to see if requested controller is in $controllers
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages','error');
    }
  } else {
    call('pages','error');
  }
?>

<!DOCTYPE html>

<html>
  <head>
    <title>TutorMatch</title>
    <meta name="homepage" content="width=600px" />
    <!--bootstrap CSS-->
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--bootstrap jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--bootstrap JS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Our CSS-->
    <link rel = "ourStylesheet" href="view/layout.css"></script>
  </head>
  <div id = "page">
    <div id = "logo">
      <h1 id = "title" align = "center">TutorMatch</h1>
    </div>
    <hr>
    <nav id = "tabs">
      <ul align = "center">
        <a href = '?controller=pages&action=home'> Home </a> |
        <a href = '?controller=pages&action=studentRegister'>Register as Student</a> |
        <a href = '?controller=pages&action=tutorRegister'>Register as Tutor</a> |
        <a href = '?controller=pages&action=aboutUs'> About Us </a>
      </ul>
    </nav>
    <hr>
    <?php require_once('routes.php'); ?>
  </div>
</html>

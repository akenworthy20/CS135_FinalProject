<?php
<html>

   <head>
      <title>Login Page</title>

      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form id = 'login' action = '?controller=pages&action=home' method = "post">
                  <label>E-mail  :</label><input type = "text" name = "email" id = "email" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" id = "password" class = "box" /><br/><br />
                  <input type = "submit" name = 'submit' value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

            </div>

         </div>

      </div>

   </body>
</html>
?>

<form id='register' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post'
    accept-charset='UTF-8'>
    <fieldset >
      <legend>Register</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <label for='name' >Your Full Name*: </label>
        <input type='text' name='name' id='name' maxlength="50" />
        <label for='email' >Email Address*:</label>
        <input type='text' name='email' id='email' maxlength="50" />

        <label for='phone' >Phone Number*:</label>
        <input type='text' name='phone' id='phone' maxlength="10" />

        <label for='password' >Password*:</label>
        <input type='password' name='password' id='password' maxlength="50" />
        <input type='submit' name='Submit' value='Submit' />

  </fieldset>
</form>

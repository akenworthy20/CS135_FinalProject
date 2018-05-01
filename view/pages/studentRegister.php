<form id='register' action='?controller=pages&action=studentRegister' method='post'
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

        <label for='major'> Major*:</label>
        <input type='text' name'major' id='major' maxlength="50" />

        <fieldset>
          <legend>Days available for tutoring:*</legend>
          <div>
            <input type="checkbox" id="monday" name="monday" value="monday">
            <label for="monday">Monday</label>
          </div>
          <div>
            <input type="checkbox" id="tuesday" name="tuesday" value="tuesday">
            <label for="tuesday">Tuesday</label>
          </div>
          <div>
            <input type="checkbox" id="wednesday" name="wednesday" value="wednesday">
            <label for="wednesday">Wednesday</label>
          </div>
          <div>
            <input type="checkbox" id="thursday" name="thursday" value="thursday">
            <label for="thursday">Thursday</label>
          </div>
          <div>
            <input type="checkbox" id="friday" name="friday" value="friday">
            <label for="monday">Friday</label>
          </div>
          <div>
            <input type="checkbox" id="saturday" name="saturday" value="saturday">
            <label for="monday">Saturday</label>
          </div>
          <div>
            <input type="checkbox" id="sunday" name="sunday" value="sunday">
            <label for="monday">Sunday</label>
          </div>
        </fieldset>

        <input type='submit' name='submit' value='submit' />

  </fieldset>
</form>

<head> <link rel = "stylesheet" href = "view/layout.css"> </head>
<form id='register' action='?controller=pages&action=tutorRegister' method='post'
    accept-charset='UTF-8'>
    <fieldset >
      <legend>Your info:</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>

        <label for='name' >Full Name*: </label>
        <input type='text' name='name' id='name' maxlength="50" />

        <label for='email' >Email Address*:</label>
        <input type='text' name='email' id='email' maxlength="50" />

        <label for='phone' >Phone Number*:</label>
        <input type='text' name='phone' id='phone' maxlength="10" />

        <label for='password' >Password*:</label>
        <input type='password' name='password' id='password' maxlength="50" />

        <label for='major'> Major*:</label>
        <input type='text' name='major' id='major' maxlength="50" />

        <label for='year'> Year*:</label>
        <input type='text' name='year' id='year' maxlength="50" />

        <fieldset align = "center">
          <legend align = "left">Days available for tutoring:*</legend>
          <div>
            <input type="checkbox" id="monday" name="monday" value="monday">
            <label for="monday">Monday</label>

            <input type="checkbox" id="tuesday" name="tuesday" value="tuesday">
            <label for="tuesday">Tuesday</label>

            <input type="checkbox" id="wednesday" name="wednesday" value="wednesday">
            <label for="wednesday">Wednesday</label>

            <input type="checkbox" id="thursday" name="thursday" value="thursday">
            <label for="thursday">Thursday</label>

            <input type="checkbox" id="friday" name="friday" value="friday">
            <label for="friday">Friday</label>

            <input type="checkbox" id="saturday" name="saturday" value="saturday">
            <label for="saturday">Saturday</label>

            <input type="checkbox" id="sunday" name="sunday" value="sunday">
            <label for="sunday">Sunday</label>
          </div>
        </fieldset>
        <fieldset>
          <span class>You don't have to answer these questions, but they will make it easier for students to find you and make you seem more appealing!</span>
        </br>
          <legend>Academic Info: </legend>

          <label for='gpa' >Major GPA(4 point scale): </label>
          <input type='number' step='0.01' name='gpa' id='gpa' maxlength="10" />
        </br>
          <label for='bio'>Describe yourself in a tweet: </label>
          <input type='text' name='bio'id = 'bio' maxlenght="240" size = "100"/>

        </fieldset>
      <input type='submit' name='submit' value='Submit' />
  </fieldset>
</form>

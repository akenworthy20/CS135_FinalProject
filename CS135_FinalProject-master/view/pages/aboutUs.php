<div align="center">
  <h1> About Us </h1>

  <script>
    $(document).on('change', '.dropdown', function() {
      var target = $(this).data('target');
      var show = $("option:selected", this).data('show');
      $(target).children().addClass('hide');
      $(show).removeClass('hide');
    });
    $(document).ready(function(){
    	$('.dropdown').trigger('change');
    });
  </script>

  <select class="dropdown" data-target=".my-info-1">
    <option value="alex" data-show=".alex">Alexander Dominick Kenworthy</option>
    <option value="bean" data-show=".bean">Conor Hogan</option>
    <option value="avi" data-show=".avi">Avinash Vemuri</option>
  </select>

  <div class="my-info-1">
    <div class="alex hide"> </br>
      <strong>Alex hails from Chicago, IL!  He loves playing soccer, lacrosse, and fortnite</strong> </br>
      <img src="https://i.imgur.com/W4iTdRU.jpg" style="width:500px">
    </div>
    <div class="bean hide">
      <strong>Conor Hogan is a brilliant junior at Claremont McKenna College.  In his free time, he enjoys being a softboy.  He has small pecs :( </strong></br>
      <img src="https://i.imgur.com/O2rMjRF.jpg" style="width:500px">
    </div>
    <div class="avi hide">
      <strong>Avi is an exceptional tennis player who consistently leads his team.  Equipped with poise, finesse, and dogs, he is ready to take on the world! </strong></br>
      <img src="https://i.imgur.com/ozRTpGh.jpg" style="width:500px">
    </div>
  </div>
</div>

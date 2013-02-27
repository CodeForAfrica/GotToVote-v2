<div class="jumbotron" id="jumbotron">
	<h1>Kenya Decides!</h1>
	<p class="lead">The Kenya General Elections are on March 4th 2013.</p>
	
	<div class="clock">
		<!-- Days -->
		<div class="clock_days">
		    <div class="bgLayer">
		        <canvas id="canvas_days" width="122" height="122">
		            Your browser does not support the HTML5 canvas tag.
		        </canvas>
		        <p class="val">0</p>
		        <p class="type_days">Days</p>
		    </div>
		</div>
		<!-- /Days -->
		<!-- Hours -->
		<div class="clock_hours">
			<div class="bgLayer">
				<canvas id="canvas_hours" width="122" height="122">
					Your browser does not support the HTML5 canvas tag.
				</canvas>
				<p class="val">0</p>
				<p class="type_hours">Hours</p>
			</div>
		</div>
		<!-- /Hours -->
		<!-- Minutes -->
		<div class="clock_minutes">
		    <div class="bgLayer">
		        <canvas id="canvas_minutes" width="122" height="122">
		            Your browser does not support the HTML5 canvas tag.
		        </canvas>
		        <div class="text">
		            <p class="val">0</p>
		            <p class="type_minutes">Minutes</p>
		        </div>
		    </div>
		</div>
		<!-- /Minutes -->
		<!-- Seconds -->
		<div class="clock_seconds">
		    <div class="bgLayer">
		        <canvas id="canvas_seconds" width="122" height="122">
		            Your browser does not support the HTML5 canvas tag.
		        </canvas>
		        <p class="val">0</p>
		        <p class="type_seconds">Seconds</p>
		    </div>
		</div>
		<!-- /Seconds -->
	</div>
	<div class="clearfix"></div>
	<p class="lead"></p>
	
	<a class="btn btn-large btn-success" href="#" id="findlink" onclick="$('#find').scrollTop();">Confirm Registration</a>
	<a class="btn btn-large btn-inverse" href="http://nimeregister.com" target="_blank">
		<img src="<?php echo base_url(); ?>assets/img/logos/nimeregister.png" style="height: 20px; margin-top: -5px;" /> Nimeregister</a>
</div>

<hr />
<div class="row-fluid marketing">
	<div class="span6">
		<h4>What is voter registration?</h4>
		<p>Voter registration is the process of entering details of qualified persons including their National Identity Card or Passport numbers in a register or list of voters.</p>
		
		<h4>Who qualifies to register as a voter?</h4>
		<p>In order to qualify as a voter, one must:</p>
		<ul>
			<li><p>Be a Kenyan citizen</p></li>
			<li><p>Be 18 years old and above</p></li>
		</ul>
		
		<h4>Can a person transfer as a voter to another registration centre or constituency?</h4>
		<p>YES! A person may transfer as a voter to another registration centre within the constituency or outside the constituency. The person is required to present himself/ herself to the particular registration centre or constituency if he/she meets the requirements.</p>
		
	</div>
	<div class="span6">
		<h4>Why register as a voter?</h4>
		<p>Registering as a voter will give you the opportunity to elect leaders for your country at the national and county levels. You can only participate in elections if you are a registered voter. It is your right and duty as a responsible citizen to elect your leaders.</p>
		
		<h4>Where can you register as a voter?</h4>
		<p>You can register as a voter at any designated voter registration within the county assembly ward or the constituency where you wish to vote.</p>
		
		<h4>What is the role of a voter in ensuring the register is accurate?</h4>
		<p>It is the responsibility of each registered voter to inspect the register and inform the registration officers of any corrections they wish made in the register of voters on their particulars.</p>
	</div>
</div>

<!--
   	<table align="center"><tr><td>
   		<ul class="nav nav-pills" style="display: inline-block;">
   			<li><a href="#" id="see_more">See more...</a></li>
   		</ul>
   	</td></tr></table>-->



<hr />


<div id="find-reg" style="text-align: center;">
	<h2>Find Your Registration Centre!</h2>

	<div class="row-fluid marketing" style="margin-top: 20px; margin-bottom: 10px;">
		<div class="span4">
			<div>
				<p class="lead">County</p>
				<select id="county_select">
				
				
					<option value="0">Select a County</option>
					<option value="30">Baringo</option>
					<option value="36">Bomet</option>
					<option value="39">Bungoma</option>
					<option value="40">Busia</option>
					<option value="28">Elgeyo/Marakwet</option>
					<option value="14">Embu</option>
					<option value="7">Garissa</option>
					<option value="43">Homa Bay</option>
					<option value="11">Isiolo</option>
					<option value="34">Kajiado</option>
					<option value="37">Kakamega</option>
					<option value="35">Kericho</option>
					<option value="22">Kiambu</option>
					<option value="3">Kilifi</option>
					<option value="20">Kirinyaga</option>
					<option value="45">Kisii</option>
					<option value="42">Kisumu</option>
					<option value="15">Kitui</option>
					<option value="2">Kwale</option>
					<option value="31">Laikipia</option>
					<option value="5">Lamu</option>
					<option value="16">Machakos</option>
					<option value="17">Makueni</option>
					<option value="9">Mandera</option>
					<option value="10">Marsabit</option>
					<option value="12">Meru</option>
					<option value="44">Migori</option>
					<option value="1">Mombasa</option>
					<option value="21">Murang'a</option>
					<option value="47">Nairobi</option>
					<option value="32">Nakuru</option>
					<option value="29">Nandi</option>
					<option value="33">Narok</option>
					<option value="46">Nyamira</option>
					<option value="18">Nyandarua</option>
					<option value="19">Nyeri</option>
					<option value="25">Samburu</option>
					<option value="41">Siaya</option>
					<option value="6">Taita Taveta</option>
					<option value="4">Tana River</option>
					<option value="13">Tharaka - Nithi</option>
					<option value="26">Trans Nzoia</option>
					<option value="23">Turkana</option>
					<option value="27">Uasin Gishu</option>
					<option value="38">Vihiga</option>
					<option value="8">Wajir</option>
					<option value="24">West Pokot</option>
				</select>
			</div>
		</div>
		<div class="span4">
			<div style="text-align: center;">
				<p class="lead">Constituency</p>
				<select id="const_select">
					<option value="0">- Select a County First -</option>
				</select>
			</div>
		</div>
		<div class="span4">
			<div style="text-align: center;">
				<p class="lead">Ward</p>
				<select id="ward_select">
					<option value="0">- Select a County First -</option>
				</select>
			</div>
		</div>
	</div>
	
	<div id="found-reg" style="display: none;">
		<table class="table table-hover" style="margin-bottom: 0;">
			<thead><tr><td>
				<h4>Registration Centres in <span id="header-name"> County</span></h4>
			</td></tr></thead>
			<tbody id="reg-centres">
				<tr><td>
					<p><img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" />
						Finding registration centres...
					</p>
				</td></tr>
			</tbody>
		</table>
	</div>
	
</div>

<a name="find" id="find"></a>
<hr style="margin: 60px 0;" />

<div style="text-align: center;">
	<!--<h2>Confirm Registration <small><a href="http://vote.iebc.or.ke" target="_blank">IEBC</a></small></h2>-->
	
	<iframe src="http://vote.iebc.or.ke/confirm/mobile/" width="100%" height="552" frameborder="0" scrolling="Yes" rightmargin="0" bottommargin="0" topmargin="0" leftmargin="0" marginwidth="0" allowtransparency="allowtransparency" border="0" marginheight="0"></iframe>
	
	<!--<p id="iebcMap"><a href="javascript:showMap();" class="btn btn-large" style="margin-top: 10px;">
		<i class="icon-globe" style="margin-top: 4px;"></i>
		Show Map <i class="icon-globe" style="margin-top: 4px;"></i></a></p>-->
</div>

<hr style="margin-top: 90px;"/>

<div class="social-icons">
	<h3>Share GotToVote.co.ke</h3>
	<p> 
	<a href="javascript:void(0);" name="Share_TW" title="Share on Twitter | GotToVote! Ke"
	onClick='window.open("http://twitter.com/intent/tweet?text=Register+as+a+voter+today%21+Find+your+registration+center+on+http%3A%2F%2Fgottovote.co.ke+%23GotToVote","GotToVote","width=550,height=270");'><img src="<?php echo base_url(); ?>assets/img/social/twitter.png" alt="Share on Twitter" /></a>
	<a href="javascript:void(0);" name="Share_FB" title="Share on FB | GotToVote! Ke"
	onClick='window.open("http://www.facebook.com/sharer.php?u=http%3A%2F%2Fgottovote.co.ke%2F&t=Register+as+a+voter+today!+Find+a+registration+center+on+GotToVote.","GotToVote","width=550,height=270");'><img src="<?php echo base_url(); ?>assets/img/social/facebook.png" alt="Share on Facebook" /></a>
	<a href="https://plus.google.com/share?url=gottovote.co.ke" onclick="javascript:window.open(this.href,
	  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo base_url(); ?>assets/img/social/googleplus.png" alt="Share on Google Plus" /></a>
	</p>
</div>

<table align="center" style="text-align: center; width: 90%;"><tr><td>
	<a class="twitter-timeline" href="https://twitter.com/search?q=%23GotToVote" data-widget-id="280061031194181635">Tweets about "#GotToVote"</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</td></tr></table>


<!-- Scripts -->

<!-- Countdown Timer -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jbclock.js"></script>
<script type="text/javascript">
	var startD = Date.parse("Dec 18 2012 18:00:00 GMT+0300 (EAT)")/1000;
	var endD = Date.parse("Mar 4 2013 08:00:00 GMT+0300 (EAT)")/1000;
	
	var nowD = Date.parse(new Date())/1000;
	var testD = new Date();
	
	$(document).ready(function(){
	    JBCountDown({
	        secondsColor : "#FFF",
	        secondsGlow  : "none",
	        
	        minutesColor : "#39b54a",
	        minutesGlow  : "none",
	        
	        hoursColor   : "#ec3535",
	        hoursGlow    : "none",
	        
	        daysColor    : "#333",
	        daysGlow     : "none",
	        
	        startDate   : startD,
	        endDate     : endD,
	        now         : nowD,
	        seconds     : "00"
	    });
	});
</script>


<!-- Find Registration Centre -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script type="text/javascript">
 	function showMap() {
 		$('#iebcMap').fadeOut('slow');
 		$('#iebcMap').html('<iframe src="http://vote.iebc.or.ke/gadget/" width="100%" height="552" frameborder="0" scrolling="No" rightmargin="0" bottommargin="0" topmargin="0" leftmargin="0" marginwidth="0" allowtransparency="allowtransparency" border="0" marginheight="0"></iframe>');
 		$('#iebcMap').fadeIn('slow');
 	}
</script>
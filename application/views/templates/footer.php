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
<!-- SMS script -->
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<? echo base_url(); ?>assets/js/sms.js" type="text/javascript"></script>
<!-- Scroll -->
<script type="text/javascript">
	function goToByScroll(id){
	      // Remove "link" from the ID
	    id = id.replace("link", "");
	      // Scroll
	    $('html,body').animate({
	        scrollTop: $("#"+id).offset().top},
	        'slow');
	}
	
	$("#findlink").click(function(e) { 
	      // Prevent a page reload when a link is pressed
	    e.preventDefault(); 
	      // Call the scroll function
	    goToByScroll($(this).attr("id"));           
	});
	$("#smslink").click(function(e) { 
	      // Prevent a page reload when a link is pressed
	    e.preventDefault(); 
	      // Call the scroll function
	    goToByScroll($(this).attr("id"));           
	});
</script>
<!-- Find Registration Centre -->
<script type="text/javascript">
 	function showMap() {
 		$('#iebcMap').fadeOut('slow');
 		$('#iebcMap').html('<iframe src="http://vote.iebc.or.ke/gadget/" width="100%" height="552" frameborder="0" scrolling="No" rightmargin="0" bottommargin="0" topmargin="0" leftmargin="0" marginwidth="0" allowtransparency="allowtransparency" border="0" marginheight="0"></iframe>');
 		$('#iebcMap').fadeIn('slow');
 	}
</script>

<div class="container">
	<hr style="margin: 50px 0;"/>

	<div class="social-icons">
		<h3>Share GotToVote.co.ke</h3>
		<p> 
		<a href="javascript:void(0);" name="Share_TW" title="Share on Twitter | GotToVote! Ke"
		onClick='window.open("http://twitter.com/intent/tweet?text=Kenya+decides%21+Share+the+peace+message+and+find+your+candidates+on+http%3A%2F%2Fgottovote.co.ke+%23GotToVote","GotToVote","width=550,height=270");'><img src="<?php echo base_url(); ?>assets/img/social/twitter.png" alt="Share on Twitter" /></a>
		<a href="javascript:void(0);" name="Share_FB" title="Share on FB | GotToVote! Ke"
		onClick='window.open("http://www.facebook.com/sharer.php?u=http%3A%2F%2Fgottovote.co.ke%2F&t=Kenya+decides%21+Share+the+peace+message+and+find+your+candidates+on+GotToVote.","GotToVote","width=550,height=270");'><img src="<?php echo base_url(); ?>assets/img/social/facebook.png" alt="Share on Facebook" /></a>
		<a href="https://plus.google.com/share?url=gottovote.co.ke" onclick="javascript:window.open(this.href,
		  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo base_url(); ?>assets/img/social/googleplus.png" alt="Share on Google Plus" /></a>
		</p>
	</div>
	
	<table align="center" style="text-align: center; width: 90%;"><tr><td>
		<a class="twitter-timeline" href="https://twitter.com/search?q=%23GotToVote" data-widget-id="280061031194181635">Tweets about "#GotToVote"</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</td></tr></table>
	
	<hr style="margin: 50px 0 30px;"/>
	
	<div class="home-logos">
		<p style="vertical-align: middle;margin-top: 10px;text-align:center">
			<a href="http://code4kenya.org" target="_blank"><img src="<?php echo base_url(); ?>assets/img/logos/c4k_logo.png" style="width: 250px;margin-right:50px;" alt="Code4Kenya"/></a>
			<br /><br /><span style="margin: 0; color: #777;font-weight: bold">Partners</span><br />
			<a href="http://www.hivos.org/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/logos/hivos.jpg" style="width: 100px;" alt="Hivos" /><a>	
			<a href="http://www.africanmediainitiative.org/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/logos/ami.png" style="width: 120px;" alt="AMI" /></a>
			<a href="http://www.nybakenya.org/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/logos/nyba.png" style="width: 150px;" alt="NYBA" /></a>
			<br />	
		</p>
		<div style="text-align: center;">
			<p style="margin: 0; color: #777;font-weight: bold">Implementing Partner</p>
			<a href="http://openinstitute.com"><img src="<?php echo base_url(); ?>assets/img/logos/oi.png" style="width: 140px;" alt="Open Institute" /></a>
			
		</div>
	</div>

	</div>
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-34157316-5'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>

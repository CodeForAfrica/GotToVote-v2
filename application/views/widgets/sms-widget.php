<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GotToVote | <?php echo $title; ?></title>
        <meta name="description" content="Kenya Decides! Find your candidates and share the peace message.">
        <meta name="keywords" content="Kenya, elections, 2013, candidates, president, Got To Vote, governor, county, senator, women representative, kenyan elections, SMS Peace" />
        <meta name="author" content="Open Institute" />
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jbclock.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.9.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
        
    </head>
    <body style="padding: 10px;width: 540px;">
    	<!--[if lt IE 7]>
    		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    	<![endif]-->
    		
    		<h3 style="margin: 0;"><img src="<?php echo base_url(); ?>assets/img/logo_3.png" alt="" style="width: 50px;" /> Share Peace Message via SMS!</h3>
    		<p>Fill the form here and share the peace message via SMS for FREE!</p>
    		

			<div style="text-align: center;" style="margin: 0 auto;">
				
				<div>
					<div class="btn-group" data-toggle="buttons-radio" style="display: inline-block;">
						<button type="button" class="btn active" onclick="javascript:$('#smsCarousel').carousel(0);">
							<i class="icon-list-alt"></i> <b>SMS Details</b></button>
						<button type="button" class="btn" onclick="javascript:$('#smsCarousel').carousel(1);">
							<i class="icon-unlock"></i> <b>Confirmation Code</b></button>
					</div>
				</div>
				
				<div id="smsCarousel" class="carousel slide" style="text-align: left; margin-top: 10px;">
					
					<!-- Carousel items -->
					<div class="carousel-inner">
						<div class="active item">
							<div class="row">
								<div class="span7">
									<form>
										<fieldset>
											<legend>SMS Details</legend>
											<div class="row">
												<div class="span4" id="senderDetails">
													<p><b>Your Details:</b></p>
													<input class="span4" type="text" id="senderName" placeholder="Name" required onkeyup="editMsgRT();"><br />
													<input class="span4" type="email" id="senderEmail" placeholder="Email" required><br />
													<div>
														<div class="input-prepend" style="float: right;" id="senderMob">
														  	<span class="add-on">+254</span>
															<input class="span2" id="prependedInput" type="text" placeholder="722722722" required onkeyup="editMsgRT();">
														</div>
													</div>
													<div class="clearfix"></div>
													<span class="help-block" style="text-align: right;">*All fields are required.</span>
													<p><b>Peace Message:</b></p>
													<textarea rows="4" class="span4" id="disabledInput" name="msgTextArea" disabled placeholder="I choose peace this coming Kenya General Elections. You can too on GotToVote http://bit.ly/gtvke - [Name] [0722722722]"></textarea>
												</div>
												<div class="span3">
													<div style="text-align: right;">
														<p><b>RECIPIENTS</b></p>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input class="span2" id="prependedInput" type="text" placeholder="722722722" >
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input class="span2" id="prependedInput" type="text" placeholder="722722722" >
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input class="span2" id="prependedInput" type="text" placeholder="722722722" >
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input class="span2" id="prependedInput" type="text" placeholder="722722722" >
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input class="span2" id="prependedInput" type="text" placeholder="722722722" >
														</div>
														<div class="clearfix"></div>
														<br />
														<a href="javascript:sendSMS();" class="btn btn-large btn-info"><i class="icon-envelope-alt"></i> Send SMS</a>
													</div>
												</div>
											</div>
									  	</fieldset>
									</form>
								</div>
							</div>
						</div>
						<div class="item">
							<form>
								<fieldset>
									<legend>Confirmation Code</legend>
									<table align="center" style="text-align: center; height: 292px;"><tr><td>
										<div style="padding: 0 100px;">
											<p class="lead" style="font-weight: 500; font-size: 40px;">Thank You</p>
											<p class="lead" style="font-size: 17px; line-height: 20px;">Enter the confirmation code sent to you by SMS and your peace message will be on its merry way.</p>
											<input type="text" name="confirmCode" style="text-align: center;"/><br />
											<a href="#" class="btn btn-large btn-info">Confirm</a>
										</div>
									</td></tr></table>
							  	</fieldset>
							</form>
							
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- SMS scripts -->
			<script type="text/javascript">
				$('#smsCarousel').carousel({
				  interval: false
				})
			</script>
			<script type="text/javascript">
				
				function editMsgRT() {
					var theMsg = "I choose peace this coming Kenya General Elections. You can too on GotToVote http://bit.ly/gtvke - ";
					var senderName = $('#senderName').val().split(" ");
					var senderMob = $('#senderMob input').val();
					if ($('#senderName').val()=='') {
						senderName = '[Name]';
					}
					if ($('#senderMob input').val()=='') {
						senderMob = '[722722722]';
					}
					var fullMsg = theMsg + senderName[0] + ' ' + senderMob;
					$('#senderDetails textarea').attr('placeholder', fullMsg);
				}
				
				function checkRequired() {
					if ($('#senderName').val()==''||$('#senderEmail').val()==''||$('#senderMob input').val()==''){
						alert('Please enter all your details.');
						return false;
					}
					return true;
				}
				
				function sendSMS() {
					if (!checkRequired()){
						return;
					}
					
					alert('Success');
				}
				
			</script>
			<script src="<? echo base_url(); ?>assets/js/sms.js" type="text/javascript"></script>
    	
    </body>
</html>
     
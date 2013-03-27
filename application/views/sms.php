			<div style="text-align: right; padding-top: 30px;" class="span7">
				
				<div>
					<div class="btn-group" data-toggle="buttons-radio" style="display: inline-block;">
						<button id="btnItemSmsDetails" type="button" class="btn active" onclick="javascript:$('#smsCarousel').carousel(0);">
							<i class="icon-list-alt"></i> <b>SMS Details</b></button>
						<button id="btnItemSmsConfirm" type="button" class="btn" onclick="javascript:$('#smsCarousel').carousel(1);">
							<i class="icon-unlock"></i> <b>Confirmation Code</b></button>
					</div>
				</div>
				
				<div id="smsCarousel" class="carousel slide" style="text-align: left; margin-top: 10px;">
					
					<!-- Carousel items -->
					<div class="carousel-inner">
						<div class="active item">
							<div class="row">
								<div class="span7">
									<form id="smsDetailsForm">
										<fieldset>
											<legend>SMS Details</legend>
											<div class="row">
												<div class="span4" id="senderDetails">
													<p><b>Your Details:</b></p>
													<input class="span4" type="text" name="name" id="senderName" placeholder="Name" required onkeyup="editMsgRT();"><br />
													<input class="span4" type="email" name="email" id="senderEmail" placeholder="Email" required><br />
													<div>
														<div class="input-prepend" style="float: right;" id="senderMob">
														  	<span class="add-on">+254</span>
															<input class="span2" name="sendernumber" id="prependedInput" type="text" placeholder="722722722" required onkeyup="editMsgRT();" maxlength="9">
														</div>
													</div>
													<div class="clearfix"></div>
													<span class="help-block" style="text-align: right;">*All fields are required.</span>
													<p><b>Peace Message:</b></p>
													<textarea rows="4" class="span4" id="disabledInput" name="msgTextArea" disabled placeholder="Hi. Thank you for keeping the peace & making history along with thousands of Kenyans like you. Send this SMS free at http://bit.ly/gtvke From: [0722722722]"></textarea>
												</div>
												<div class="span3">
													<div style="text-align: right;">
														<p><b>RECIPIENTS</b></p>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient1" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722723" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient2" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722724" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient3" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722725" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient4" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722726" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient5" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722727" maxlength="9">
														</div>
														<div class="clearfix"></div>
														<br />
														<a id="btnSendSMS" href="javascript:sendSMS();" class="btn btn-large btn-info" ><i class="icon-spinner icon-spin" style="display: none;"></i><i class="icon-envelope-alt"></i> Send SMS</a>
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
											<div id="divConfirmCode">
												<p class="lead" style="font-size: 17px; line-height: 20px;">Enter the confirmation code sent to you by SMS and your peace message will be on its merry way.</p>
												<input type="text" name="confirmCode" id="confirmCode" style="text-align: center;"/><br />
												<a href="javascript:confirmCode();" class="btn btn-large btn-info" id="btnConfirm"><i class="icon-spinner icon-spin" style="display: none;"></i> Confirm</a>
											</div>
											<div id="divShareSocial" style="display: none;">
												<p class="lead" style="font-size: 17px; line-height: 20px;">Success! You are amazing! You can now share the peace message on Facebook &amp; Twitter.</p>
												<p class="lead">
													<a href="javascript:void(0);" name="Share_FB" title="Share on FB | GotToVote! Ke"
													onClick='window.open("http://www.facebook.com/sharer.php?u=http%3A%2F%2Fgottovote.co.ke%2F&t=Hi.+Join+me+in+voting+peacefully+in+this+historic+elections.+Send+the+SMS+free+to+your+friends+on+http://bit.ly/gtvke","GotToVote","width=550,height=270");'><i class="icon-facebook icon-2x icon-border"></i></a>
													
													<a href="javascript:void(0);" name="Share_TW" title="Share on Twitter | GotToVote! Ke"
													onClick='window.open("http://twitter.com/intent/tweet?text=Hi.+Join+me+in+voting+peacefully+in+this+historic+elections.+Send+the+SMS+free+to+your+friends+on+http://bit.ly/gtvke+%23GotToVote", "GotToVote", "width=550,height=270");'><i class="icon-twitter icon-2x icon-border"></i></a>
													
												</p>
											</div>
										</div>
									</td></tr></table>
							  	</fieldset>
							</form>
							
							
						</div>
					</div>
					
				</div>
				
				<p style="text-align: left;">Add this SMS gadget to your website by copying the code below: <pre style="text-align: left; padding: 5px 10px;" class="prettyprint">&lt;iframe src="http://gottovote.co.ke/smswidget" height="523px" width="560px"&gt;&lt;/iframe&gt;</pre></p>
			</div>
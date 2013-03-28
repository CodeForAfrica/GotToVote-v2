<div style="border-bottom: 1px solid #e5e5e5; padding: 30px 0 20px; background-color: #fafafa; margin-bottom: 60px;">
	<div class="container">
		<div class="row">
			<div class="span5">
				<br />
				<h1 style="font-weight: 500;">Share the Message!</h1>
				<p class="lead">Fill the form and share this peace message with your friends free!</p>
				<br />
				<ul style='list-style:none;padding:0;margin-left:0;'>
					<li style='margin-bottom:10px;'>
						<a class="btn btn-large btn-success homebtn" href="#" id="findlink" onclick="$('#find').scrollTop();"><i class="icon-group icon-white"></i> See The Candidates</a>
					</li>
					<li style='margin-bottom:10px;' class="dropdown"><a class="btn btn-large btn-success homebtn dropdown" href="#" class="dropdown-toggle" id="drop_report" role="button" data-toggle="dropdown" target='_blank'><i class="icon-bullhorn icon-white"></i> Make a Report</a>
						<ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop_report">
		                  <li role="presentation"><a target="_blank" role="menuitem" tabindex="-1" href="https://uchaguzi.co.ke/reports/submit">Uchaguzi</a></li>
		                <li role="presentation"><a target="_blank" role="menuitem" tabindex="-1" href="http://ushahidi.voiceofmathare.org/index.php/reports/submit">Voice of Mathare</a></li>
		                <li role="presentation"><a target="_blank" role="menuitem" tabindex="-1" href="http://www.nscpeace.go.ke/108/report.php">Amani Kenya @ 108</a></li>
		                <li role="presentation"><a target="_blank" role="menuitem" tabindex="-1" href="http://www.iebc.or.ke/report-to-us/">IEBC Whistle Blowing Portal</a></li>
		                <li role="presentation"><a target="_blank" role="menuitem" tabindex="-1" href="http://www.sisiniamani.org/">Sisi ni Amani</a></li>
		                <li role="presentation"><a target="_blank" role="menuitem" tabindex="-1" href="http://www.kenyapolice.go.ke/report_a_crime.asp">Kenya Police</a></li>
		                <li role="presentation"><a target="_blank" role="menuitem" tabindex="-1" href="http://www.knchr-idp.org/">KNHRC</a></li>
		            </ul>	
	                </li>
	                <li style='margin-bottom:10px;'>
						<a class="btn btn-large btn-success homebtn" href="<?php echo base_url()?>reg_centers"><i class="icon-search icon-white"></i> Registration Centers</a>
					</li>
				</ul>
			</div>
			<?php $this->load->view('sms');?>
		</div>
	</div>
</div>
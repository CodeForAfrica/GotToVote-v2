<h2><?php echo $countyinfo['county_name']; ?> COUNTY 
	<small> <?php echo number_format($countyinfo['registered_voters']); ?> Registered Voters</small></h2>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li><a href="#tab1" data-toggle="tab"><h4 style="margin: 0;">Governor Candidates</h4></a></li>
		<li class="active"><a href="#tab2" data-toggle="tab"><h4 style="margin: 0;">Governor Candidates</h4></a></li>
		<li><a href="#tab3" data-toggle="tab"><h4 style="margin: 0;">Senator Candidates</h4></a></li>
		<li><a href="#tab4" data-toggle="tab"><h4 style="margin: 0;">Women Rep Candidates</h4></a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane" id="tab1">
			<div class="row">
					<?php
						$i = 1; 
						foreach($presidential_aspirants as $candidate){ ?>
						<div class="span4">
							<p><b><?php echo $candidate['surname']." ".$candidate['other_name']; ?></b></p>
							<small><?php echo $candidate['name']; ?></small>
							<p><b>Running Mate: </b> <?php echo $candidate['running_mate']; ?></p>
						
					<?php 
							if ($i==3 || $i==6) {
								echo '<hr /></div>';
								echo '</div><div class="row" style="display: inline-block;">';
							} else {
								if ($i==8) {
									echo '</div>';
								} else {
									echo '<hr /></div>';
								}
							}
							$i++;
						} ?>
			</div>
		</div>
		<div class="tab-pane active" id="tab2">
			<div class="row">
				<?php foreach($gurbernatorial_aspirants as $candidate){ ?>
					<div class="span4">
						<p><b><?php echo $candidate['surname']." ".$candidate['other_name']; ?></b></p>
						<p><?php echo $candidate['name']; ?></p>
						<p><b>Running mate: </b> <?php echo $candidate['running_mate']; ?></p>
						<hr />
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="tab-pane" id="tab3">
			<div class="row">
				<?php foreach($senatorial_aspirants as $candidate){ ?>
					<div class="span4">
						<p><b><?php echo $candidate['surname']." ".$candidate['other_name']; ?></b></p>
						<p><?php echo $candidate['name']; ?></p>
						<hr />
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="tab-pane" id="tab4">
			<div class="row">
				<?php foreach($womenrep_aspirants as $candidate){ ?>
					<div class="span4">
						<p><b><?php echo $candidate['surname']." ".$candidate['other_name']; ?></b></p>
						<p><?php echo $candidate['name']; ?></p>
						<hr />
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>



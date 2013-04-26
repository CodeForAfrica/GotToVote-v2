<?php if(isset($POST)){ print"<h3>Modules saved!</h3>"; }?>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("admin/activate_modules"); ?>
<table class="table table-striped">
<thead>
<tr>
<th>Module</th><th>Active</th><th></th>
</tr>
</thead>
<tbody>
<tr><td>SMS</td><td><input id="sms" name="modules[]" value="sms" type="checkbox"<?php if(($installed['sms'])=='1')print" checked";?>></td><td></td></tr>
<tr><td>Voter Turnout</td><td><input id="voter_turnout" name="modules[]" value="voter_turnout" type="checkbox"<?php if(($installed['voter_turnout'])=='1')print" checked";?>></td><td><a name='install_voter_turnout' class="btn btn-info" onclick="sampleData('turnout')">Install sample voter turnout data</a></td></tr>
<tr><td>Registration Centers</td><td><input id="reg_centers" name="modules[]" value="reg_centers" type="checkbox"<?php if(($installed['reg_centers'])=='1')print" checked";?>></td><td></td></tr>
<tr><td>Aspirants</td><td><input id="aspirants" name="modules[]" value="aspirants" type="checkbox"<?php if(($installed['aspirants'])=='1')print" checked";?>></td><td><a name='install_voter_turnout' class="btn btn-info" onclick="sampleData('aspirants')">Install sample aspirants data</a></td></tr>
<tr><td></td><td><input type="submit" value="Save" class="btn btn-primary"/></td><td></td></tr>
 <?php echo form_close(); ?>
</tbody>
</table>

<div id="context" style="width:300px;margin:0 auto;">

</div>
        <script src="<?php echo base_url()?>assets/js/jquery17.min.js"></script>
        <script>                          
                function sampleData(module) {
                    var request = $.ajax({
                        url: "<?php echo base_url()?>sampledata",
                        type: "GET",
						data: "module="+module,
                        dataType: "html"
                    });
 
                    request.done(function(msg) {
                        $("#context").html(msg);          
                    });
 
                    request.fail(function(jqXHR, textStatus) {
                        alert( "Request failed: " + textStatus );
                    });
                }
             
        </script>
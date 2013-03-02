$('#smsCarousel').carousel({
  interval: false
})

function editMsgRT() {
	var theMsg = "I choose peace this coming Kenya General Elections. You can too on GotToVote http://bit.ly/gtvke - ";
	var senderName = $('#senderName').val().split(" ");
	var senderMob = '0'+$('#senderMob input').val();
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
	if (!validateEmail($('#senderEmail').val())) {
		alert('Please enter a valid email address.');
		return false;
	}
	if ($('#senderMob input').val().length!=9||isNaN($('#senderMob input').val())) {
		alert('Please enter a valid mobile phone number.');
		return false;
	}
	return true;
}

function sendSMS() {
	$('#btnSendSMS .icon-envelope-alt').hide();
	$('#btnSendSMS .icon-spinner').show();
	
	if (!checkRequired()){
		$('#btnSendSMS .icon-envelope-alt').show();
		$('#btnSendSMS .icon-spinner').hide();
		return;
	}
	
	var sendSMSform = $('#smsDetailsForm');
	$.ajax( {
		type: "POST",
		url: base_url+"sms/senderActivate",
		data: sendSMSform.serialize(),
		success: function( response ) {
			console.log( response );
			$('#btnSendSMS .icon-envelope-alt').show();
			$('#btnSendSMS .icon-spinner').hide();
			$('#smsCarousel').carousel(1);
			$('#btnItemSmsConfirm').button('toggle');
		}
	} );
	
}

function confirmCode() {
	var confirmationCode = $('#confirmCode').val();
	$('#btnConfirm .icon-spinner').show();
	
	if (confirmationCode == '' || confirmationCode.length != 4) {
		alert('Please enter a valid confirmation code.');
		$('#btnConfirm .icon-spinner').hide();
		return;
	}
	
	$.ajax( {
		type: "POST",
		url: base_url+"sms/confirmCode",
		data: { 'confirmcode' : confirmationCode },
		success: function( response ) {
		
			console.log( response );
			if (response == "No confirm") {
				alert('We are unable to confirm with that code. Please check to make sure it is correct.')
			} else {
				
			}
			
			$('#btnConfirm .icon-spinner').hide();
			
		}
	} );
	
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 



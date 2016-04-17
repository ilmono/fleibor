function validate(){

	if(document.form1.firstname.value==""){alert("Please, write your first name ");document.form1.firstname.focus();return;}
	
	if(document.form1.email.value==""){alert("Please, write an email address");document.form1.email.focus();return;}
	if (document.form1.email.value.indexOf('@', 0) == -1 ||
      document.form1.email.value.indexOf('.', 0) == -1)
  	{ alert("Please, write a valid email address"); document.form1.email.focus(); 
	return; }
	
	
	if(document.form1.country.value==""){alert("Please, select a Country ");document.form1.country.focus();return;}
	if(document.form1.state.value==""){alert("Please, select a Region/State ");document.form1.state.focus();return;}	
	if(document.form1.city.value==""){alert("Please, select a City ");document.form1.city.focus();return;}
	
	if(document.form1.passwd1.value==""){alert("Please, write a Password ");document.form1.passwd1.focus();return;}
	if(document.form1.passwd1.value.length < 6){alert("Please, The password should be minimum with 6 characters ");document.form1.passwd1.focus();return;}
	
	if (document.form1.passwd1.value != document.form1.passwd2.value)  {
			alert("The password that you wrote are not identical ");
				document.form1.passwd2.value = "";
				document.form1.passwd2.focus();
				
				return false;
	}
	
	
	send_form();
	
}

function send_form(){
	var strSSap = "document.getElementById('message_submit').innerHTML=' Please wait ... '";
	eval(strSSap);
	document.form1.act.value ="create_account";
	document.form1.submit();
}

function chargeCitiesOfState(){
	var strSSap = "document.getElementById('city_to_fillout').innerHTML=' Please wait ... '";
	eval(strSSap);
	ajaxChargeCitiesOfState();
}



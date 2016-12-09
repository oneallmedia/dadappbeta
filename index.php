
<!DOCTYPE html>
<html>	
<head>
<title>Levy Flat Registration Form Flat Responsive Widget Template  : w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/api_conf.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='css/css.css' rel='stylesheet' type='text/css'>
<link href='css/css1.css' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
		<div class="registration">
			<h2>Registration Form</h2>				
					<form id="registration_form">
						<div class="form-info">
						<input type="text" id="name" name="name" class="text" value="Your Full Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Full Name';}" >
						<input type="text" id="email" name="email" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
						<input type="text" id="cell" name="cell" class="text" value="Cell No" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Cell No';}" >
						<input type="text" id="address" name="address" class="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" >
						<input type="text" id="zip" name="zip" class="text" value="Zipcode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Zipcode';}" >
					    </div>
					    <input type="button" value="REGISTER" id="reg_btn">
						<input type="button" value="VERIFY" id="enter_code">
					</form>
					
		</div>


<style>
.registration {
		  width: 92%;
		height: 752px !important;
		  margin: 4% auto 0;
	}
</style>
<script>
$(function() {
	var code = localStorage.getItem("code");
	if (code != null && code != '' && code != 'undefined')
	{
		window.location.href = 'slider.html';
	}
	$("#enter_code").click(function(){
		window.location.href="code.html";
	});
	$("#reg_btn").click(function(){
		
		if($("#name").val()=="" || $("#name").val()=="Your Full Name"){alert("Please enter Name");$("#name").focus();return false;}
		if($("#email").val()=="" || $("#email").val()=="Email Address"){alert("Please enter Email");$("#email").focus();return false;}
		if($("#cell").val()=="" || $("#cell").val()=="Cell No"){alert("Please enter Cell No.");$("#cell").focus();return false;}
		if($("#address").val()=="" || $("#address").val()=="Address"){alert("Please enter Address");$("#address").focus();return false;}
		if($("#zip").val()=="" || $("#zip").val()=="Zipcode"){alert("Please enter Zipcode");$("#zip").focus();return false;}
		$.ajax({
			type: "POST",
			//url: 'app/index.php/contact/save_web_contacts',
			url: api_url+'app/index.php/contact/save_web_contacts',
			datatype: "json",
			data: $("#registration_form").serialize(),
			crossDomain: true,
			success: function(result) {
				var obj = $.parseJSON(result);
				if(obj.success)
				{
					alert("Access Code has been sent to your email. Please enter on next screen");
					window.location.href = 'code.html';
				}
				else
				{
					$("#name").val("Your Full Name");
					$("#email").val("Email Address");
					$("#cell").val("Cell No");
					$("#address").val("Address");
					$("#zip").val("Zipcode");
					alert(obj.error);
				}
			},
			error: function(result) {
				console.log("Some Error Occured");
			}
		});
	});
});
</script>
</body>
</html>
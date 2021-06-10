

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			margin: auto;
		}
		#container{
			width: 100%;
			height: 100vh;
			background-image: url("../images/background_login&register_customers.jpg");
			background-size: cover;
			text-align: center;
			font-family: "tahoma";
			
		}
		#form{
			width: 400px;
			height: auto;
			text-align: center;
			border: 1px solid black;
			background-color: white;
		}
		input{
			width: 300px;
			height: 30px;
		}
		button{
			width: 80px;
			height: 30px;
			background-color: #15a9d6;
			color: white;
		}
	</style>
	<script type="text/javascript">
		function validate(){
			// 
			var vEmail = document.getElementById('email');
			var vPass = document.getElementById('pass');
			var vRepass = document.getElementById('rePass');
			var vFullname = document.getElementById('fullName');
			var vDob = document.getElementById('dob');
			var vPhone = document.getElementById('phone');
			var vAddress = document.getElementById('address');

			email = vEmail.value;
			pass = vPass.value;
			rePass = vRepass.value;
			fullName = vFullname.value;
			dob = vDob.value;
			phone = vPhone.value;
			address = vAddress.value;

			const regexPass = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/g;
			
			const regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

			const regexPhone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;
			
			if(regexEmail.test(email) == false){
				alert("Bạn chưa nhập đúng định dạng email ví dụ: user123@gmail.com");
				vEmail.focus();
				return false;
			}

			if(regexPass.test(pass) == false){
				vPass.focus();
				alert("Mật khẩu tối thiểu 8 ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt");
				return false;
			}
			if(pass != rePass) {
				alert("Mật khẩu không khớp");
				vRepass.focus();
				return false;
			}
			if(fullName == ""){
				alert("Bạn phải nhập tên");
				vFullname.focus();
				return false;
			}
			if(regexPhone.test(phone) == false){
				vPhone.focus();
				alert("Bạn chưa nhập đúng số điện thoại");
				return false;
			}
			if(address == ""){
				vAddress.focus();
				alert("Bạn chưa nhập địa chỉ");
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	<div id="container">
		<br><br><br>
		<div id="form">
	<form method="POST" onsubmit="return validate()">
		<br><br>
		<h3>Join With Us !</h3><br>
		<!-- <h3><?php echo $error; ?></h3> -->
		<input id="email" type="text" name="email" placeholder="Email: "><br><span style="color: red;"><?php echo $error; ?></span><br>
		<input id="pass" type="password" name="pass" placeholder="Password" ><br><br>
		<input id="rePass" type="password" placeholder="Re-enter password" ><br><br>
		<input id="fullName" type="text" name="fullName" placeholder="Full name: "><br><br>
		<input id="dob" type="date" name="dob"><br><br>
		<input style="width: 50px; height: auto;" type="radio" name="gender" value="1" checked>Male
		<input style="width: 50px; height: auto;" type="radio" name="gender" value="0">Female<br><br>
		<input id="phone" type="number" name="phone" placeholder="Phone: "><br><br>
		<input id="address" type="text" name="address" placeholder="Address: "><br><br>
		<button type="submit" name="btnSubmit">Join</button><br><br>
	</form>
		</div>
	</div>
</body>
</html><?php
	header("Location: customers/");
 ?>
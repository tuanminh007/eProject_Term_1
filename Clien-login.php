<?php 
	$error = "";
	if (isset($_POST['btnLogin'])) {
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);

		$sql = "SELECT customer_ID, full_name FROM customers WHERE email = '$user'  AND pass = '$pass'";
		$result = mysqli_query($conn, $sql);
		
		if($result == false){
			$error = mysqli_error($conn);
		}else{
			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_assoc($result);
				$_SESSION['user']['id'] = $row['customer_ID'];
				$_SESSION['user']['fullName'] = $row['full_name'];
				header("location: index.php?module=home&action=home");
			}else{
				$error = "Tài khoản hoặc mật khẩu sai!";
			}
		}
	}

		

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		
	</script>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			margin: auto;
		}
		#container{
			width: 100%;
			height: 100vh;
			text-align: center;
			background-image: url('../images/background_login&register_customers.jpg');
			background-size: cover;
		}
		button{
			width: 120px;
			height: 30px;
			background-color: #15a9d6;
			color: white;
		}
		table{
			margin-top: 100px;
			width: 400px;
			height: 300px;
			border: 1px solid;
			background-color: white;
			
		}
		input{
			width: 250px;
			height: 30px;
		}
	</style>
</head>
<body>
	<div id="container">
		<br>
		<form method="POST">				
			<table border="0px" align="center">
				<tr>
					<td colspan="2">
						<h1>Đăng nhập</h1>
					</td>
				</tr>
				
				<tr>
					<td>
						<label>
							<b>  User:</b>
						</label>
					</td>
					<td >
						<input type="text" name="user" id="user" placeholder="Nhập email..">
					</td>
				</tr>
			<tr>
				<td>
					<label>
						<b>  Password:</b>
					</label>
				</td>
				<td >
					<input type="password" name="pass" id="pass" placeholder="Nhập mật khẩu..">
				</td>
		</tr>
		<tr>
			<td colspan="2">
				<span style="color: red;"><?php echo $error; ?></span><br>
				<button type="submit" name="btnLogin">Login</button><br><br>
				<a href="index.php?module=common&action=register">Register</a>
			</td>
		</tr>
		</table>
			
		</form>
	</div>
</body>
</html>
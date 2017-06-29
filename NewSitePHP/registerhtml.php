		<div id="background_popup">
			<div id="popup">
				<div id="top">
					<div id="exit" onclick="CloseBox()" title="get out">
						<p id="xxxx">x</p>
					</div>
					<center><h1>Register</h1></center>
					<hr>
				</div>
				<center>
					<div id="boxregister">
						<form method="POST" action="registerphp.php">
							<input type="text" name="username" placeholder="שם משתמש">
							<br>
							<br>
							<br>
							<input type="password" name="userpassword" placeholder="סיסמה">
							<br>
							<br>
							<br>
							<input type="text" name="useremail" placeholder="אימייל">
							<br>
							<br>
							<button type="submit" name="submit">Submit</button>
						</form>
					</div>
				</center>
			</div>
		</div>

		<script>
			var x = document.getElementById("background_popup");
			function openregister(){
				x.style.display = "block";
			}
			function CloseBox(){
				x.style.display="none";
			}
		</script>		
	</body>
</html>

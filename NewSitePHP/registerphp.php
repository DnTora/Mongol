<?php
if(!isset($_POST['submit']))
{
	header('Location: register.php?register=ntclick');
	exit();
}
else{ 
include_once 'conect.php';
$username =mysqli_real_escape_string($conect,$_POST['username']);
$userpassword = mysqli_real_escape_string($conect,$_POST['userpassword']);
$useremail =mysqli_real_escape_string($conect, $_POST['useremail']);

	if(empty($username)||empty($userpassword)||empty($useremail))
	{
		header('Location: index.php?register=empty');
		exit();
	}
	else{
		if(!preg_match("/([a-zA-Z0-9])/",$username))
		{
			header('Location: index.php?register=name1eror');
			exit();
		}
		else{
			if(strlen($username)<=3)
			{
				header('Location: index.php?register=name2eror');
			exit();
			}
			else{
				if(!filter_var($useremail,FILTER_VALIDATE_EMAIL))
				{
				header('Location: index.php?register=emaileror');
			exit();	
				}
				else{
					$sql  = "SELECT * FROM login WHERE username='$username'";
					$result = mysqli_query($conect,$sql);
					$rownum = mysqli_num_rows($result);
					if($rownum>0){
							header('Location: index.php?register=namecatch');
			                exit();	
					}
					else{
						$hashpass = password_hash($userpassword,PASSWORD_DEFAULT);
						$sql = "INSERT INTO login (username,userpassword,useremail) VALUES('$username','$hashpass','$useremail')";
						$result = mysqli_query($conect,$sql);
						header('Location: index.php?register=success');
						exit();
					}
				}
			}
		}
	}
}
?>
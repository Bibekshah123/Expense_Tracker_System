<?php
include('config.php');
include('functions.php');
$msg="";
if(isset($_POST['login'])){
	$username=get_safe_value($_POST['username']);
	$password=get_safe_value($_POST['password']);
	
	$res=mysqli_query($con,"select * from users where username='$username'");
	
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		
		$verify=password_verify($password,$row['password']);
		
		if($verify==1){
			$_SESSION['UID']=$row['id'];
			$_SESSION['UNAME']=$row['username'];
			$_SESSION['UROLE']=$row['role'];
			if($_SESSION['UROLE']=='User'){
				redirect('dashboard.php');
			}else{
				redirect('category.php');
			}
		}else{
			$msg="Please enter valid password";
		}
	}else{
		$msg="Please enter valid username";
	}
		
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Page Title</title>

    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo"></div>
                        <div class="login-form">
                            <form action="" method="post">
                                <h1>
                                    Expense Tracker System
                                </h1>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name='login'>login</button>
                            </form>
                            <div id="msg"><?php echo $msg?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="js/main.js"></script>
>
    <script>
       function change_cat(){
        var category_id = document.getElementById('category_id').value;
        window.location.href = '?category_id=' + category_id;
       }

       function delete_confir(id, page){
        var check = confirm("Are you sure");
        if(check == true){
            window.location.href = page + "?type=delete&id=" + id;
        }
       }

       function set_to_date(){
        var from_date = document.getElementById('from_date').value;
        document.getElementById('to_date').setAttribute("min", from_date);
       }
    </script>
</body>
</html>

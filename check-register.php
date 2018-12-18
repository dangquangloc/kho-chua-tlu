<?php
        include("demo/connection.php");
        $confirm_code=md5(uniqid(rand()));
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
                      $sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);
 
					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
                    }
                    $sql="select * from users where email='$email'";
					$kt=mysqli_query($conn, $sql);
					
                    if(mysqli_num_rows($kt)  > 0){
						echo "email đã tồn tại";
                    }
                    else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    email,
                            activation
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email',
                            '$confirm_code'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
                           echo "Đăng ký thành công.Đăng nhập mail bạn đã đăng ký để kích hoạt tài khoản";
                           
                            // ---------------- SEND MAIL FORM ----------------
                            // send e-mail to ...
                            $to=$email;
                            // Chủ Đề
                            $subject="Thư Kích Hoạt Tài Khoản";
                            // From
                            $header="from: Tên Của Bạn <your email>";
                            // Your message
                            $message="Đường link kích hoạt : \r\n";
                            $message.="Nhấp vào link sau để kích hoạt tài khoản\r\n";
                            $message.="http://localhost/activation.php?code=$confirm_code";
                            // Gủi mail
                            $sentmail = mail($to,$subject,$message,$header);
                            
                            
                            
					}
									    
					
			  }
	}
	?>
    
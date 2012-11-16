<?php
session_start();
if (isset($_COOKIE['username'])) {
    
	setcookie('username');
	echo "đăng xuất thành công";
}

// trở về trang login
//header('Location: home');
?> 
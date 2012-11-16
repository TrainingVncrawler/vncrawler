<div align="center" style="width:300px;" >
<form id="form" name="form" method="post" action="">

					<table>
						<thead>
							<tr>
								<th colspan="2">ĐĂNG NHẬP HỆ THỐNG</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tên đăng nhập</td>
								<td><input type="text" name="txtuser" /></td>
							</tr>
							<tr class="alt">
								<td>Mật khẩu</td>
								<td><input type="password" name="txtpass" /></td>
								
							</tr>
							<tr>
								<td colspan="2" class="pagination">
									<input type="checkbox" name="regis" value="" />Rgister me<input type="submit" name="Submit" value="Đăng nhập" />
								</td>
							</tr>
							<?php    
								$client_id = '924845087125300';
								$client_secret = '82b3d74213366b3a21c823cf825d9c1c';
								$endpoint = 'https://api.alezaa.com/oauth2/token';
								$redirect_uri = 'http://localhost/vncrawler/';
								 if((isset($_POST['Submit'])))
								 {
									 if($_POST['txtuser']<>"" & $_POST['txtpass']<>"")
									 {
										$user=$_POST['txtuser'];
										$pass=$_POST['txtpass'];
										$data = "client_id=$client_id&client_secret=$client_secret&username=$user&password=$pass&grant_type=password";	
										$curl = curl_init();
										curl_setopt($curl, CURLOPT_URL, $endpoint);
										curl_setopt($curl, CURLOPT_POST, 1);
										curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
										curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
										curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
										curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
										$info = curl_exec($curl);
										curl_close($curl);  		 
										$response = json_decode($info);
										//print_r($response);
										if($response <>"")
										{
											if($response->display_name <> '')
											{
												file_put_contents('access_token',serialize($response)); 
												
												//ob_end_clean();
												redirect('home/book');
												//header('location:book.php');
												
												exit();
											}
										}
										else 
										 echo "Lỗi kết nối !";
										//else echo "Tài khoản đăng nhập không chính xác !";
									 } 
									 else  echo "Tên đăng nhập hoặc mật khẩu không đúng !";
								 }
								?>
						</tbody>
					</table>
</form>
</div>
			
		
		
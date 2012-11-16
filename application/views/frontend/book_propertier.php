<div class="grid_16">
<?php   
		
				if(isset($id) & $id <>"")
				{
				
			    $endpoint = 'https://api.alezaa.com/user/me/'.$id.'/meta';
			    $redirect_uri = 'http://localhost/vncrawler/';
			    $token = unserialize(file_get_contents('access_token')); 
				$url ='access_token='.$token->access_token; 
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $endpoint);
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl,CURLOPT_POSTFIELDS,$url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
				$info = curl_exec($curl);
				curl_close($curl);  		 
				$info=json_decode($info);//var_dump($info);die;
				// print_r('<pre>');
				// print_r($info); die;
				file_put_contents('bookpropertier',serialize($info)); 
				if($info<>"")
				{   
					echo '<div><table><tr><th colspan="2">Thông tin chi tiết</th></tr>';
					foreach ($info as  $value=>$element)
					 {						   
						if ($value=="info")
						 { 
							 echo '<tr><td><img src="'.$element->cover.'"/></td>';		
							 echo '<td><div class="title"><span style="font-size:18px;font-weight:20px" >'.$element->title.'</span></div>
									<div><span>'.$element->creator.'</span>	</div>	
									<div><span>'.$element->translator.'</span></div>
									<div class="book_title"><span>'.$element->publisher.'</span></div>
								    <div><span >'.$element->rights.'</span></div></td></div></tr>';												
						 }
						 if ($value=="toctree")
						 { 
							 echo '<tr><div><td colspan="2">'.$element.'</td></div></tr>';			
							 											
						 }
						 				
					 }
					 echo '</table></div>';
				}
				}
?>
</div>
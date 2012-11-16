<script language="javascript">
function download(tenform)
{

	var dem;
	dem = document.forms.length;
	//alert (dem);
	for(var i=0;i<=dem;i++)
	{
		  //var j;
		  if(document.forms[i].name = tenform)
		  {
			// alert (document.forms[i].name);
			// j = i;
		   document.forms[i].submit();
		   break;
		  }
	}
	
	return false;

}
function getValue(a)
{
	var x=document.getElementById(a).value;
	return x;
}
</script>
<div class="grid_16">
<!--<form name="myform" method="post" action="book_propertier"> -->

<?php   
				
				function Replace_TiengViet($str)
					 {
						  $coDau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
						  "ằ","ắ","ặ","ẳ","ẵ",
						  "è","é","ẹ","ẻ","ẽ","ê","ề"     ,"ế","ệ","ể","ễ",
						  "ì","í","ị","ỉ","ĩ",
						  "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
						  ,"ờ","ớ","ợ","ở","ỡ",
						  "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
						  "ỳ","ý","ỵ","ỷ","ỹ",
						  "đ",
						  "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
						  ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
						  "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
						  "Ì","Í","Ị","Ỉ","Ĩ",
						  "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
						  ,"Ờ","Ớ","Ợ","Ở","Ỡ",
						  "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
						  "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
						  "Đ","ê","ù","à");
				
						  $khongDau=array("a","a","a","a","a","a","a","a","a","a","a"
						  ,"a","a","a","a","a","a",
						  "e","e","e","e","e","e","e","e","e","e","e",
						  "i","i","i","i","i",
						  "o","o","o","o","o","o","o","o","o","o","o","o"
						  ,"o","o","o","o","o",
						  "u","u","u","u","u","u","u","u","u","u","u",
						  "y","y","y","y","y",
						  "d",
						  "A","A","A","A","A","A","A","A","A","A","A","A"
						  ,"A","A","A","A","A",
						  "E","E","E","E","E","E","E","E","E","E","E",
						  "I","I","I","I","I",
						  "O","O","O","O","O","O","O","O","O","O","O","O"
						  ,"O","O","O","O","O",
						  "U","U","U","U","U","U","U","U","U","U","U",
						  "Y","Y","Y","Y","Y",
						  "D","e","u","a");
						  return str_replace($coDau,$khongDau,$str);
					 }
			    $endpoint = 'https://api.alezaa.com/user/me/oncloud';
			    $redirect_uri = 'http://localhost/vncrawler/';
			    $token = unserialize(file_get_contents('access_token')); 
				$url ='access_token='.$token->access_token.'&columns=id%2Ctitle%2Ccreator%2Ccover%2Cisbn%2Csku%2Cidentifier%2Cbook_type&limit=100'; 
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
				file_put_contents('oncloud',serialize($info));  
				if($info<>"")
				{
					echo '<div ><table>
									<tr><th colspan="2">Trên mây<a href="';echo base_url();echo 'home/book_buy" class="first"> Đã mua</a><a href="';echo base_url();echo'home/book_downloaded" class="first"> Đã tải</a></th></th>
									</tr>';
					 $dsdownload=array();
					 $dsmua=array();
					 
					foreach ($info as $value)
					 {
					 //print_r('<pre>');
					 // print_r($value);die;
					 	
						if (is_array($value) )
						{
					 	foreach ($value as $element)
					 	{
						    
							 $tenfile = str_replace(' ','',$element->title);
							 $tenfile = Replace_TiengViet($tenfile);
							 if(isset($element->identifier))
								{   
								    $identifier = $element->identifier;
									//echo '<input type="hidden" name="identifier" value="'.$identifier.'" />';
									$endpoint1 = 'https://api.alezaa.com/user/me/'.$identifier.'/meta';
									$redirect_uri1 = 'http://localhost/vncrawler/';
									//$token1 = unserialize(file_get_contents('access_token')); 
									$url1 ='access_token='.$token->access_token; 
									$curl1 = curl_init();
									curl_setopt($curl1, CURLOPT_URL, $endpoint1);
									curl_setopt($curl1, CURLOPT_POST, 1);
									curl_setopt($curl1,CURLOPT_POSTFIELDS,$url1);
									curl_setopt($curl1, CURLOPT_RETURNTRANSFER, 1);
									curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, FALSE);
									curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, FALSE);
									$info1 = curl_exec($curl1);
									curl_close($curl1);  		 
									$info1=json_decode($info1);
									//var_dump($info);die;
									
									if($info1<>"")
									{   
										
										foreach ($info1 as  $value1=>$element1)
										 {
												   
													if ($value1=="right" and $element1 ==1)
														 {
															 file_put_contents('dsmua',serialize($element));
															 $string =unserialize(file_get_contents('dsmua')); 
															 array_push($dsmua,$string);	
														 }		
													if ($value1=="right" and $element1 ==0)
														{
															 file_put_contents('dsdownload',serialize($element));
															 $string =unserialize(file_get_contents('dsdownload')); 
															 array_push($dsdownload,$string);	
														 }					
										 }
										 
									}
							  //$tralertxt =strip_tags(serialize($info1));
							  //file_put_contents($tenfile.'.txt',serialize($tralertxt)); 
							  // file_put_contents($tenfile.'.html',serialize($info1)); 
							   }
							 if (isset($element->book_type))
							 {
							     echo '<form name="'.$identifier.'" method="post" action="book_propertier"><input type="hidden" name="identifier" value="'.$identifier.'" /></form>';
							   //=========================================================================================
								 echo'<tr><form name="'.$tenfile.'" method="post" action="book_download"><td>
								 <input type="hidden" name="download_txtfile" value="'.$tenfile.'.txt" />
								 <input type="hidden" name="download_htmlfile" value="'.$tenfile.'.html" />
								 <input type="hidden" name="id" value="'.$element->id.'" />
								 <input type="hidden" name="title" value="'.$element->title.'" />
								 <input type="hidden" name="creator" value="'.$element->creator.'" />
								 <input type="hidden" name="cover" value="'.$element->cover.'" />
								 <input type="hidden" name="book_type" value="'.$element->book_type.'" />
								 <input type="hidden" name="identifier" value="'.$element->identifier.'"/>
								 <input type="hidden" name="sku" value="'.$element->sku.'" /><a href="#" onclick="javascript: download('."'".$identifier."'".')"><img src="'.$element->cover.'"/></a></td>';
								 echo '<td ><div><a href="#" onclick="javascript: download('."'".$identifier."'".')"><span style="font-size:18px;font-weight:20px" >'.$element->title.'</span></a></br>
											<span style="font-size:12px; font-style:italic;"> Tác giả :'.$element->creator.'</span></br>
											<span style="font-size:12px; font-style:italic;" >SKU :'.$element->sku.'</span></br>';
								 echo'<span style="font-size:12px; font-style:italic;"> Thể loại :'.$element->book_type.'</span></br>';
						 	     echo'<a href="#" onclick="javascript: download('."'".$tenfile."'".')"><input id="more-submit" type="submit" name="Downloadtxt" value="Download txt file" ></a>|<a href="#" onclick="javascript: download('."'".$tenfile."'".')"><input id="more-submit"  name="Downloadhtml" type="submit" value="Download html file" ></a></div ></td></form></tr>';
							 }
							 else 
							 {
							  echo '<form name="'.$identifier.'" method="post" action="book_propertier"><input type="hidden" name="identifier" value="'.$identifier.'" /></form>';
							//============================================================================================
							  echo'<tr><form name="'.$tenfile.'" method="post" action="book_download"> <td>
							   <input type="hidden" name="download_txtfile" value="'.$tenfile.'.txt" />
								 <input type="hidden" name="download_htmlfile" value="'.$tenfile.'.html" />
							  <input type="hidden" name="id" value="'.$element->id.'" />
							  <input type="hidden" name="title" value="'.$element->title.'" />
							  <input type="hidden" name="creator" value="'.$element->creator.'" />
							  <input type="hidden" name="cover" value="'.$element->cover.'" />
							  <input type="hidden" name="book_type" value="" />
							  <input type="hidden" name="identifier" value="'.$element->identifier.'"/>
							  <input type="hidden" name="sku" value="'.$element->sku.'" /></form><a href="#" onclick="javascript: download('."'".$identifier."'".')"><img src="'.$element->cover.'"/></a></td>';		
							 echo '<td><div ><a href="#" onclick="javascript: download('."'".$identifier."'".')"><span style="font-size:18px;font-weight:20px">'.$element->title.'</span></a></br>
									   <span style="font-size:12px; font-style:italic;" >Tác giả :'.$element->creator.'</span></br>
									    <span style="font-size:12px; font-style:italic;" >SKU :'.$element->sku.'</span></br>';
						 	echo'<a href="#" onclick="javascript: download('."'".$tenfile."'".')"><input id="more-submit" type="submit" name="Downloadtxt" value="Download txt file" ></a>|<a href="#" onclick="javascript: download('."'".$tenfile."'".')"><input id="more-submit"  name="Downloadhtml" type="submit" value="Download html file" ></a></div ></td></form></tr>';
							
							 } 
						 }
					 }
					echo '</table></div>';
					file_put_contents('dsdownload',serialize($dsdownload));
					file_put_contents('dsmua',serialize($dsmua));
					//==============================================================================================================
					//$redirect_uri = 'http://localhost/vncrawler/';
					$meta = unserialize(file_get_contents('dsmua')); 
					if(is_array($meta))
					{
						foreach ($meta as $values=>$element)
						{ 
							 $tenchuong = str_replace(' ','',$element->title);
							 $tenchuong = Replace_TiengViet($tenchuong);
							 $identifier = $element->identifier;	
							 $endpoint = 'https://api.alezaa.com/user/me/'.$identifier.'/meta';
							 $redirect_uri = 'http://localhost/vncrawler/';
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
								if($info<>"")
								{  
									foreach ($info as  $value=>$element)
									 {		    					   
										if ($value=="locs")
										 { 
										     $noidung =array();
										     $count = count($element);
										     for ($i = 0 ;$i<$count;$i++)
											 {
											 	$endpoint5 = 'https://api.alezaa.com/user/me/'.$identifier.'/content';
												$url5 ='access_token='.$token->access_token.'&lo='.$element[$i]; 
												$curl5 = curl_init();
												curl_setopt($curl5, CURLOPT_URL, $endpoint5);
												curl_setopt($curl5, CURLOPT_POST, 1);
												curl_setopt($curl5,CURLOPT_POSTFIELDS,$url5);
												curl_setopt($curl5, CURLOPT_RETURNTRANSFER, 1);
												curl_setopt($curl5, CURLOPT_SSL_VERIFYHOST, FALSE);
												curl_setopt($curl5, CURLOPT_SSL_VERIFYPEER, FALSE);
												$info5 = curl_exec($curl5);
												curl_close($curl5);  		 
												$info5=json_decode($info5);//var_dump($info);die;
												if($info5 <>"")
												{
													//file_put_contents($tenchuong,serialize($info5));
													$string =serialize($info5); 
													array_push($noidung,$string);
													 
												}
											  }										
										   }
									   }
									  
								}
								 $txt=strip_tags(serialize($noidung));
								 file_put_contents($tenchuong.'.txt',serialize($txt));
								 file_put_contents($tenchuong.'.html',serialize($noidung));
							
							 }
						}
				    //==================================================================================================================
					$meta = unserialize(file_get_contents('dsdownload')); 
					if(is_array($meta))
					{   
					    //var_dump($meta1);die;
						//print_r('<pre>');
						//print_r($meta1);	 
						foreach ($meta as $values=>$element)
						{    
						     
							 $tenchuong = str_replace(' ','',$element->title);
							 $tenchuong = Replace_TiengViet($tenchuong);
							 $identifier = $element->identifier;	
							 $endpoint = 'https://api.alezaa.com/user/me/'.$identifier.'/meta';
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
								if($info<>"")
								{  
									foreach ($info as  $value=>$element)
									 {	
									    					   
										if ($value=="sample")
										 { 
										     $noidung =array();
										     $count = count($element);
										     for ($i = 0 ;$i<$count;$i++)
											 {
											 	$endpoint5 = 'https://api.alezaa.com/user/me/'.$identifier.'/content';
												//$token5 = unserialize(file_get_contents('access_token')); 
												$url5 ='access_token='.$token->access_token.'&lo='.$element[$i]; 
												$curl5 = curl_init();
												curl_setopt($curl5, CURLOPT_URL, $endpoint5);
												curl_setopt($curl5, CURLOPT_POST, 1);
												curl_setopt($curl5,CURLOPT_POSTFIELDS,$url5);
												curl_setopt($curl5, CURLOPT_RETURNTRANSFER, 1);
												curl_setopt($curl5, CURLOPT_SSL_VERIFYHOST, FALSE);
												curl_setopt($curl5, CURLOPT_SSL_VERIFYPEER, FALSE);
												$info5 = curl_exec($curl5);
												curl_close($curl5);  		 
												$info5=json_decode($info5);//var_dump($info);die;
												if($info5 <>"")
												{
													//file_put_contents($tenchuong,serialize($info5));
													$string =serialize($info5); 
													array_push($noidung,$string);
													 
												}
											  }										
										   }
									   }
									  // print_r('<pre>');
								     //  print_r($noidung);	 
								
								}
								 $txt=strip_tags(serialize($noidung));
								 file_put_contents($tenchuong.'.txt',serialize($txt));
								 file_put_contents($tenchuong.'.html',serialize($noidung));
							
							}
							 
						}
					//==================================================================================================================
				  }	
				}						
?>

</div>
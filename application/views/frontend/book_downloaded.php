<script language="javascript">
function next_page()
{
document.myform.submit();
return false;
}
function download()
{
document.formdownload.submit();
return false;
}
</script>
<div class="grid_16">
<form name="formdownload" method="post" action="">
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
				if(isset($ds))
				{
					echo '<div ><table><tr><th colspan="2"><a href="';echo base_url();echo 'home/book" class="first">Trên mây</a> <a href="';echo base_url();echo'home/book_buy" class="first">Đã mua </a>Đã tải</th></th></tr>';
					foreach ($ds as $items)
					 {    
					 	 $tenfile = str_replace(' ','',$items->TenSach);
						 $tenfile = Replace_TiengViet($tenfile);
						 $identifier = $items->Identifier;	
						    echo '<input type="hidden" name="download_file" value="'.$tenfile.'.txt" />';
							if ($items->Theloai)
							 { 
							     
								 echo '<tr><td><a href="#" onclick="javascript: next_page()"><img src="'.$items->Anhdaidien.'"/></a></td>';
								 echo '<td ><div><a href="#" onclick="javascript: next_page()"><span style="font-size:18px;font-weight:20px" >'.$items->TenSach.'</span></a></div>
												 <div><span style="font-size:12px; font-style:italic;"> Tác giả :'.$items->Tacgia.'</span></div>
												  <div><span style="font-size:12px; font-style:italic;" >SKU :'.$items->Sku.'</span></div>';
								 echo'<div ><span style="font-size:12px; font-style:italic;"> Thể loại :'.$items->Theloai.'</span></div>';
						 	     echo'<div ><a href="#" onclick="javascript: download()">Download txt file</a>|<a href="#" onclick="javascript: download()">Download html file</a></div ></td></tr>';
							 }
							 else 
							 {
							 echo '<tr> <td><a href="#" onclick="javascript: next_page()"><img src="'.$items->Anhdaidien.'"/></a></td>';		
							 echo '<td><div ><a href="#" onclick="javascript: next_page()"><span style="font-size:18px;font-weight:20px">'.$items->TenSach.'</span></a></div>
									   <div><span style="font-size:12px; font-style:italic;" >Tác giả :'.$items->Tacgia.'</span></div>
									    <div><span style="font-size:12px; font-style:italic;" >SKU :'.$items->Sku.'</span></div>';
						 	 echo'<div ><a href="#" onclick="javascript: download()">Download txt file</a>|<a href="#" onclick="javascript: download()">Download html file</a></div ></td></tr>';
							
							 } 
					 }
				echo '</table></div>';
				}
				else echo "Bạn chưa download quyển sách nào.";
	
?>
<!--<form name="myform" method="post" action="book_propertier">
<input type="hidden" name="identifier" value="" /> -->
</form>
</div>
<script language="javascript">
function next_page()
{
document.myform.submit();
return false;
}
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
</script>
<div class="grid_16">

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
				
				$redirect_uri = 'http://localhost/vncrawler/';
			    $meta = unserialize(file_get_contents('dsmua')); 
				
				if(is_array($meta))
				{
					echo '<div ><table><tr><th colspan="2"><a href="';echo base_url();echo 'home/book" class="first">Trên mây</a> Đã mua<a href="';echo base_url();echo'home/book_downloaded" class="first"> Đã tải</a></th></th></tr>';
					foreach ($meta as $values=>$element)
					 {    
					 	 $tenfile = str_replace(' ','',$element->title);
						  $tenfile = Replace_TiengViet($tenfile);
						 $identifier = $element->identifier;	
						   
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
				echo '</table></div>';
				}
	
?>

</div>
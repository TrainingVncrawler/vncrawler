<?php   
				if(isset($id))
 							{
											// place this code inside a php file and call it f.e. "book.php"
												$path = $_SERVER['DOCUMENT_ROOT']."/vncrawler/"; // change the path to fit your websites document structure
												$fullPath = $path.$id;
												if ($fd = fopen ($fullPath, "r")) 
												{
													$fsize = filesize($fullPath);
													$path_parts = pathinfo($fullPath);
													$ext = strtolower($path_parts["extension"]);
													switch ($ext) {
														case "txt":
														header("Content-type: application/txt"); // add here more headers for diff. extensions
														header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
														break;
														default;
														header("Content-type: application/octet-stream");
														header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
														case "html":
														header("Content-type: application/html"); // add here more headers for diff. extensions
														header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
														break;
														default;
														header("Content-type: application/octet-stream");
														header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
													}
													header("Content-length: $fsize");
													header("Cache-control: private"); //use this to open files directly
													while(!feof($fd)) {
														$buffer = fread($fd, 2048);
														echo $buffer;
													}
												}
												else echo "Không tìm thấy tập tin!";
												fclose ($fd); 
												exit;
												
									}
									else "Không có gì để down cả!";
									
?>
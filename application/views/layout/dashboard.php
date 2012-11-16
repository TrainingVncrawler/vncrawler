<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo $title;?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/frontend/css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/frontend/css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/frontend/css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="<?php echo base_url()?>public/fontend/js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>public/fontend/js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
		<link href="<?php echo base_url()?>public/fontend/js/glow/1.7.0/widgets/widgets.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript">
			glow.ready(function(){
				new glow.widgets.Sortable(
					'#content .grid_5, #content .grid_6',
					{
						draggableOptions : {
							handle : 'h2'
						}
					}
				);
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>
		<h1 id="head"> Download sách trên hệ thống Alezaa</h1>
		<ul id="navigation">
			<li><span class="active"><a href="<?php echo base_url();?>home/book" class="first">Sách</a></span></li>
			<li><a href="<?php echo base_url();?>home/book_download">Truyện tranh</a></li>
			<li><a href="<?php echo base_url();?>home/user">Tạp trí</a></li>
		</ul>

			<div id="content" class="container_16 clearfix" align="center">
			 <?php echo $content_for_layout ?>
			</div>
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Liên hệ</a>
				</div>
			</div>
		</div>
	</body>
</html>
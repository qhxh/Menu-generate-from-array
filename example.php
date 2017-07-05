<?php
require('menu.class.php');
$menus_array = array(
		array(
			'id' => '1',
			'title' => 'Tin tuc',
			'link' => 'link-1',
			'parent' => '0'
		),
		array(
			'id' => '2',
			'title' => 'Thoi su',
			'link' => 'link-2',
			'parent' => '1'
		),
		array(
			'id' => '3',
			'title' => 'The gioi',
			'link' => 'link-3',
			'parent' => '2'
		),
		array(
			'id' => '4',
			'title' => 'Trong nuoc',
			'link' => 'link-4',
			'parent' => '2'
		),
		array(
			'id' => '5',
			'title' => 'The thao',
			'link' => 'link-5',
			'parent' => '0'
		),
		array(
			'id' => '6',
			'title' => 'Quoc te',
			'link' => 'link-6',
			'parent' => '5'
		),
		array(
			'id' => '7',
			'title' => 'V leag',
			'link' => 'link-1',
			'parent' => '5'
		),
		array(
			'id' => '8',
			'title' => 'Show bitch',
			'link' => 'link-8',
			'parent' => '0'
		),
		array(
			'id' => '9',
			'title' => 'Thoi trang',
			'link' => 'link-9',
			'parent' => '0'
		),
		array(
			'id' => '10',
			'title' => 'Thoi trang sao',
			'link' => 'link-10',
			'parent' => '9'
		)
	);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Starter Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>


	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">Page 1-1</a></li>
	          <li><a href="#">Page 1-2</a></li>
	          <li><a href="#">Page 1-3</a></li>
	        </ul>
	      </li>
	      <li><a href="#">Page 2</a></li>
	      <li><a href="#">Page 3</a></li>
	    </ul>
		
		<!-- example qh_menu -->
            <?php
            	$args = array(
            		'wrap_tag' => '',
            		'wrap_ul_class' => 'nav navbar-nav',
            		'parent_li_has_sub_class' => 'dropdown',
            		'sub_ul_class' => 'dropdown-menu',
            		'link_has_sub_class' => 'dropdown-toggle',
            		'link_has_sub_attr' => array('data-toggle' => 'dropdown', 'aria-expanded' => 'false')
            	);
            	$menu = new QH_Menu($menus_array, $args);
            	$menu->print_menu(); 
            ?>
         <!--/.nav-collapse -->


	  </div>
	</nav>


    

    <div class="container">
		
    </div>

    <!-- /.container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>

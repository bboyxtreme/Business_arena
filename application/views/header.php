<!DOCTYPE html>
<html>
	<head>
		<title>Business Arena.com</title>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<link href = "<?php echo base_url();?>css/styles.css" rel = "stylesheet">		
		<link rel="stylesheet" href="<?php echo base_url();?>css/SideMenustyles.css">	
	</head>
	<body class = "money-BG">
	<header class = "hmain">
		<section id = "image"> 
			<img src = "<?php echo base_url();?>images/logo.jpg" class = "BAlogo">
		</section> 
		<span id="main-menu-btn"> &#9776; </span>
		<section id = "text">
			<ul>
				<li><a href="<?php echo base_url(); ?>" class = "general">Home</a></li>
				<li><a href="<?php echo base_url("about_us"); ?>" class = "general">About us</a></li>
				<li><a href="<?php echo base_url("contact_us"); ?>" class = "general">Contact us</a></li>
				<li id = 'login'>Log in</li>
				<!--<li id = "login">Log in</li>-->
                <!--<li id = "logout">Log out</li>-->
			</ul>
			<div class = "login-container">
            	<form action="http://Business_arena/login" method="post" accept-charset="utf-8">
                    <input type="text" name = "email" placeholder = "email address" class = "input-box">
                    <input type="password" name = "password" placeholder = "password" class = "input-box">
                    <input type = "submit" value = "Log in" class = "BA-button">
                </form>
			</div>
		</section>
		<div class = "catbtn-mobile">View Calalogue</div>
        <div id="loading"><img src="<?php echo base_url(); ?>images/load.gif"></div>	
	</header>
	<header class = "htop margin-top-std padding-std">
		<section id = "page-nav" class = "margin-bottom-min">
        	<a href = "<?php echo base_url(); ?>" class = "BA-orange BA-anchor">Home</a><!--id = nav-home-->
            <?php if (isset($page)): ?>
            <?php if ($page == "About"): ?>
				<span class = "BA-orange">>> About us</span>
			<?php elseif ($page == "Contacts"): ?>
				<span class = "BA-orange">>> Contact us</span>
            <?php elseif ($page == "user-business"): ?>
				<span class = "BA-orange">>> <?=$biz_info->biz_name?></span>		
			<?php endif;?>
            <?php endif;?>
        </section>
        <div class = "site-controls">
        	<button id = "back-button" class = "BA-button-orange margin-right-std">&#8592;</button>
            <?php echo form_open('search',array('method'=>'post','class'=>'site-controls'));?>
            <input type = "text" name = "search-phrase" id = "main-search" class = "search-box" placeholder="&#128269; Search catalogue..." required>
            <input type = "submit"  value = "&#128269;" id = "main-search-btn" class = "BA-button-yellow">
            <?php echo form_close(); ?>
        </div>
	</header>
	<aside class = "catalogue-cont-mobile margin-bottom-std">
		<span class = "closebtn">&#10060;</span>
        <select class = "BA-green LC">
        	<option>Location Catalog</option>
        	<option disabled>Product Catalog</option>
        </select>
		<div id='cssmenu'>
        	<ul>
            <?php foreach($catalogue["districts"]->result() as $district): ?>
            	<li class='has-sub'><a href='#'><span><?=$district->loc_district?></span></a>
                	<ul>
                	<?php foreach($catalogue["areas"]->result() as $area): ?>
                    	<?php if ($district->loc_district == $area->loc_district): ?>
                        	<li class='has-sub second'><a href='#'><span><?=$area->loc_area?></span></a>
                            	<ul>
                            	<?php foreach($catalogue["businesses"]->result() as $business): ?>
                                	<?php if ($area->loc_area == $business->loc_area): ?>
                                    	<li>
                                            <a href='<?php echo base_url("DBController/show_business/" . $business->biz_ID . "/" . $business->loc_ID); ?>'><span><?=$business->biz_name?></span></a>
                                        </li>                                    
                                    <?php endif;?>
                                <?php endforeach; ?>
                           		</ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                	</ul>
                </li>
            <?php endforeach; ?>
        	</ul>
        </div>
	</aside>    
	<section class = "main-content-area">
    
   
	 
		
			
			
	
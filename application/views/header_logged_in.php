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
				<li><a id = "about-us" class = "general">About us</a></li>
				<li><a id = "contact-us" class = "general">Contact us</a></li>
                <li id = 'logout'><a href='http://Business_arena/logout'>Log out (<?php echo $this->session->userdata("first_name"); ?>)</a></li>
			
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
		<section id = "page-nav" class = "margin-bottom-min"><a href = "#" id = "nav-home" class = "BA-orange BA-anchor">Home</a></section>
        <div>
        	<button id = "back-button" class = "BA-button-orange margin-right-std">&#8592;</button>
            <input type = "text" id = "main-search" class = "search-icon" placeholder="&#128269; Search catalogue...">
            <button id = "main-search-btn" class = "BA-button-yellow">&#128269;</button>
        </div>
	</header>
	<aside class = "catalogue-cont-mobile margin-bottom-std">
		<span class = "closebtn">&#10060;</span>
        <select class = "BA-green LC">
        	<option>Location Catalog</option>
        	<option>Product Catalog</option>
        </select>
		<div id='cssmenu'>
        	<ul>				 
                <li class='has-sub'><a href='#'><span>locDistrict1</span></a>
                    <ul>
                        <li class='has-sub second'><a href='#'><span>locArea1</span></a>
                            <ul>
                                <li>
                                    <a href='#'><span class = "cat-biz-name">bizName1</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>locDistrict2</span></a>
                    <ul>
                        <li class='has-sub second'><a href='#'><span>locArea2</span></a>
                            <ul>
                                <li>
                                    <a href='#'><span class = "cat-biz-name">bizName2</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>	
                <li class='has-sub'><a href='#'><span>locDistrict3</span></a>
                    <ul>
                        <li class='has-sub second'><a href='#'><span>locArea3</span></a>
                            <ul>
                                <li>
                                    <a href='#'><span class = "cat-biz-name">bizName3</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
	</aside>    
	<section class = "main-content-area">
    
   
	 
		
			
			
	<!doctype html>

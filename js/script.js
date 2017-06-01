$(document).ready(function(){
	$(window).load(function(){
		$(".website-loader").fadeOut("slow");	
	});
	/*catalogue scripts*/
	//view catalog buttons
	$(".catbtn-mobile, #user-view-catalogue").click(function(){
		$(".catalogue-cont-mobile").css("display","block");
		$(".main-content-area-cat-closed").addClass("main-content-area");
		$(".main-content-area-cat-closed").removeClass("main-content-area-cat-closed");
		$(".catbtn-mobile").hide();
	});	
	// close buttons
	$(".catalogue-cont-mobile .closebtn").click(function(){
		$(".catalogue-cont-mobile .closebtn").parent().css("display","none");
		close_catalogue();
	});
	function close_catalogue(){
		$(".main-content-area").addClass("main-content-area-cat-closed");
		$(".main-content-area").removeClass("main-content-area");
		$(".catbtn-mobile").show();
	}
	//catalog drop menu functionality
	$('#cssmenu > ul > li > a').click(function() {
		$('#cssmenu li').removeClass('active');
		$(this).closest('li').addClass('active');	
		var checkElement = $(this).next();
		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		$(this).closest('li').removeClass('active');
		checkElement.slideUp('normal');
		}
		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		$('#cssmenu ul ul:visible').slideUp('normal');
		checkElement.slideDown('normal');
		}
	});
	$('#cssmenu > ul > li > ul > li > a').click(function() {
		$("#cssmenu ul ul ul:visible").slideUp();
		var checkElement = $(this).next();
		if (!checkElement.is(':visible')){
		  checkElement.slideDown();
		}		  
	});
	//navigations
	$(".htop").on("click","#nav-home",function(){
		change_nav("home");					
		ajax_update('http://Business_arena/index.php/DBController/load/index');
	});
	$(".htop").on("click","#nav-business",function(){
		change_nav("business");					
		ajax_update('http://Business_arena/index.php/DBController/load/business');
	});
	$("#back-button").click(function(){
		alert("back");	
	});
	$(document).on("click",".cat-biz-name",function(){		
		change_nav("business");
		if($(window).width() < 700){
			$(".catalogue-cont-mobile").hide();
			close_catalogue();
		}
		ajax_update('http://Business_arena/index.php/DBController/load/business');		
	});
	$(document).on("click",".product-name",function(){
		change_nav("product");
		$(document).scrollTop(0);
		ajax_update('http://Business_arena/index.php/DBController/load/product');
	});
	
	function change_nav(mod){
		if(mod == "home"){
			$("#page-nav").html("<a href = '#' id = 'nav-home' class = 'BA-orange BA-anchor'>Home</a>");
		}
		else if(mod == "business"){
			$("#page-nav").html("<a href = '#' id = 'nav-home' class = 'BA-orange BA-anchor'>Home</a><span class = 'BA-orange'> >> </span><a id = 'nav-business' class = 'BA-anchor BA-orange' href='#'>Business</a>");
		}
		else if(mod == "product"){
			$("#page-nav").html("<a href = '#' id = 'nav-home' class = 'BA-orange BA-anchor'>Home</a><span class = 'BA-orange'> >> </span><a id = 'nav-business' class = 'BA-anchor BA-orange' href='#'>Business</a><span class = 'BA-orange'> >> </span><a id = 'nav-product' class = 'BA-anchor BA-orange' href='#'>Product</a>");
		}
		
	}
	
	/*AJAX FUNCTION*/
	function ajax_update(url_string){
		$.ajax({
			type:'POST',
			url: url_string,
			beforeSend: function(){
				$(".main-content-area, .main-content-area-cat-closed").html($("#loader").html());
			},
			complete: function(){
				$(".loader-thin").fadeOut("slow");
			},
			success: function(result){
				$(".main-content-area, .main-content-area-cat-closed").append(result);
			},
			error: function(xhr){
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	}	
	
	/*Menu scripts*/
	$("#main-menu-btn").click(function(){
		$("#text").slideToggle("slow");
	});	
	$("#about-us").click(function(){		
		load_page($(this).attr("id"));
	}); 
	$("#contact-us").click(function(){		
		load_page($(this).attr("id"));
	}); 
	function load_page(id){
		$.ajax({
			type:'POST',
			url:'http://Business_arena/index.php/DBController/load/' + id,
			success: function(result){
				$("#page-nav").html(result);
			},
			error: function(xhr){
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});	
		ajax_update('http://Business_arena/index.php/DBController/load/' + id);
	}
	$("#login").click(function(){
		$(".login-container").show("slow");
	});
	$(".login-container").mouseleave(function(){
		$(".login-container").hide("slow");
	});
	$("input.uSearch, #main-search").keypress(function(e){
		$("#page-nav").html("<a href = '#' id = 'nav-home' class = 'BA-orange BA-anchor'>Home</a><span class = 'BA-orange'> >> Search Results</span>");
		var keyNum = e.keyCode ? e.keyCode : e.which;
		if (keyNum == 13){
			load_search_results($(this).val(),keyNum);
		}		
	});
	$(".uSearchB, #main-search-btn").click(function(){
		$("#page-nav").html("<a href = '#' id = 'nav-home' class = 'BA-orange BA-anchor'>Home</a><span class = 'BA-orange'> >> Search Results</span>");
		var search_phrase = $("input.uSearch").val();
		load_search_results(search_phrase,13);
		$("#loading").hide();
	});
	function load_search_results(search_phrase,keyNum){		
		if (keyNum == 13){
			ajax_update('http://Business_arena/index.php/DBController/load/searchresults');
		}
	}
	/*$("#login-button").click(function(){
		var email = $(".login-container input[name='email']").val();
		var passw = $(".login-container input[name='password']").val();
		$.ajax({
			type:'POST',
			data: {email_addr: email, password: passw},
			url:'http://Business_arena/index.php/DBController/login',
			success: function(result){
				if (result != "auth-failed"){
					$("#login").attr("id","logout");
					$(".login-container").hide();					
					$("#logout").text("Logout(" + result + ")");	
					alert("You have successfully logged in.");
				}
				else{
					$(".main-content-area").html("nooooooo!!");	
				}
				//$(".main-content-area").html(result);
			},
			error: function(xhr){
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});	
	});*/	
	/*user business page scripts*/
	$('.main-content-area').on("click",'ul#uBizPageMenu li',function(){
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
	});
	$('.main-content-area').on("click",'ul#uBizPageMenu li.contacts',function(){
		$("section#bizPrdDisplay, section#location").hide();
		$("section#contacts").show();
	});
	$('.main-content-area').on("click",'ul#uBizPageMenu li.prds',function(){
		$("section#contacts, section#location").hide();
		$("section#bizPrdDisplay").show();	
	});
	$('.main-content-area').on("click",'ul#uBizPageMenu li.location',function(){
		$("section#contacts, section#bizPrdDisplay").hide();
		$("section#location").show();	
	});
	$(".main-content-area").on("click",".view-product", function(){
		$(".modal-BG").css("display","flex");
		$(".modal-frame").html($("#user-view-product").html());			
	});
	$(".main-content-area").on("click","#user-place-order-btn", function(){
		$(".modal-BG").css("display","flex");
		$(".modal-frame, .modal-frame-small").html($("#user-capture-contacts").html());
	});
	$(".main-content-area").on("click","#user-send-email-btn", function(){
		$(".modal-BG").css("display","flex");
		$(".modal-frame, .modal-frame-small").html($("#user-send-email").html());
	});
	
	/*user home page scripts*/
	$(".see-more").click(function(){
		$(document).scrollTop(0);
		ajax_update('http://Business_arena/index.php/DBController/load/promotions');
	});
	
	/*Client panel scripts*/
	//Home page
	/*$(".biz-card-button").click(function(){
		$(document).scrollTop(0);
		ajax_update('http://Business_arena/index.php/DBController/load/biz_ctrl_panel');
	});*/
	$("#client-add-business").click(function(){
		alert();
	});
	//Control panel
	$(".main-content-area").on("click","#ctrl-panel-prds",function(){
		$(document).scrollTop(0);
		//ajax_update('http://Business_arena/index.php/DBController/load/prd-ctrl-panel');
		$.ajax({
			type:'POST',
			url:'http://Business_arena/index.php/DBController/load/prd-ctrl-panel',
			beforeSend: function(){
				//$(".loader").css("display","flex");
				$(".main-content-area, .main-content-area-cat-closed").html($("#loader").html());
				//$(".main-content-area, .main-content-area-cat-closed").append($("#loader").html());
			},
			complete: function(){
				$(".loader-thin").fadeOut("slow");
			},
			success: function(result){
				$(".main-content-area").append(result);
			},
			error: function(xhr){
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});	
	});
	$(".main-content-area").on("click","#ctrl-panel-Locs",function(){
		$(document).scrollTop(0);
		ajax_update('http://Business_arena/index.php/DBController/load/loc-ctrl-panel');
	});
	$(".main-content-area").on("click","#ctrl-panel-uq",function(){
		$(document).scrollTop(0);
		ajax_update('http://Business_arena/index.php/DBController/load/uq-ctrl-panel');
	});
	$(".main-content-area").on("click","#ctrl-panel-views",function(){
		$(document).scrollTop(0);
		ajax_update('http://Business_arena/index.php/DBController/load/views-ctrl-panel');
	});
	$(".main-content-area").on("click","#ctrl-panel-msgs",function(){
		$(document).scrollTop(0);
		ajax_update('http://Business_arena/index.php/DBController/load/msgs-ctrl-panel');	
	});
	$(".main-content-area").on("click","#edit-biz-details-btn",function(){
			$(".modal-BG").css("display","flex");
			$("input[name='biz-name']").val($("#client-biz-name-label").text());
			$("input[name='biz-slogan']").val($("#client-biz-slogan-label").text());
			$("input[name='biz-field']").val($("#client-biz-field-label").text());
			$("input[name='biz-mobile']").val($("#client-biz-mobile-label").text());
			$("input[name='biz-email']").val($("#client-biz-email-label").text());
	});
	
	//Products page and Locations page
	$(".main-content-area").on("click","#add-new-products, #add-new-location", function(){
		$(".modal-frame, .modal-frame-small").html($("#add-prds").html());
		$(".modal-BG").css("display","flex");
	});	
	$(".main-content-area").on("click",".edit-btn", function(){
		$(".modal-frame, .modal-frame-small").html($("#edit-prd").html());
		$(".modal-BG").css("display","flex");
	});
	$(".main-content-area").on("click",".del-btn", function(){
		$(".modal-frame, .modal-frame-small").html($("#del-prd").html());
		$(".modal-BG").css("display","flex");
	});
	
	//Usage quota page
	$(".main-content-area").on("click",".buy-uq-btn",function(){
		$(".modal-BG").css("display","flex");
		load_payment_info();
	});
	$(".main-content-area").on("click","#make-payment-conf-btn",function(){
		load_payment_info();
		$("#paid, #make-payment-conf-btn").hide();
	});
	$(".main-content-area").on("click","#sub-payment-btn",function(){
		$("#make-payment-cont > :not(.hidden)").hide();
		$(".loading2").css("display","flex");
		setTimeout(function(){ 
			$("#paid, button").show(); 
			$(".loading2").hide();},5000);
	});
	function load_payment_info(){
		$("#make-payment-cont").html($("#make-payment-cont-content").html());	
	}
	
	/*ADMIN PAGE SCRIPTS*/
	/*Home*/
	$(".main-content-area").on("click","#admin-client-numbers-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-client-numbers');
	});
	$(".main-content-area").on("click","#admin-client-requests-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-client-requests');
	});
	$(".main-content-area").on("click","#admin-client-msgs-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-client-messages');
	});
	$(".main-content-area").on("click","#admin-client-biz-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-client-bizs');
	});
	$(".main-content-area").on("click","#admin-user-numbers-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-user-numbers');	
	});
	$(".main-content-area").on("click","#admin-user-comments-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-user-comments');
	});
	$(".main-content-area").on("click","#admin-quota-overdue-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-quota-overdue');
	});
	$(".main-content-area").on("click","#admin-quota-subscr-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-quota-subscr');
	});
	$(".main-content-area").on("click","#admin-quota-requests-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-quota-requests');
	});
	$(".main-content-area").on("click","#admin-quota-comments-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-quota-comments');
	});
	$(".main-content-area").on("click","#admin-loc-numbers-btn",function(){
		ajax_update('http://Business_arena/index.php/DBController/load/admin-loc-numbers');	
	});
	$(".main-content-area").on("click","#add-new-client",function(){
		$(".modal-frame-small").html($("#add-client").html());
		$(".modal-BG").css("display","flex");
	});
	/*$(".main-content-area").on("click","#admin-add-client-btn",function(){
		$("#admin-add-client-container").html("<div class = 'loader-thin'><div style = 'margin: 50px auto 0;'></div></div>");
	});*/
	
	/*businesses page*/
	$(".main-content-area").on("click","#add-new-business",function(){
		$(".modal-frame-small").html($("#add-business").html());
		$(".modal-BG").css("display","flex");
	});
	
	
	
	
	
	/*general scripts*/
	$(".main-content-area").on("click", ".modal-closebtn", function(){
		$(this).parent().parent().hide();
	});
	/*$(".modal-BG").click(function(){
		$(this).hide();	
	});*/
});
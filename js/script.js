$(document).ready(function(){
	$(window).load(function(){
		$(".website-loader").fadeOut("slow");	
	});
	$("body").on("click","#back-button, #success-confirmation",function(){
		window.history.back();
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
	$("body").on("click",".cat-biz-name",function(){		
		change_nav("business");
		if($(window).width() < 700){
			$(".catalogue-cont-mobile").hide();
			close_catalogue();
		}
		ajax_update('http://Business_arena/index.php/DBController/load/business');		
	});
	$("body").on("click",".product-name",function(){
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
	$(".main-content-area").on("click","#add-field-btn",function(){
		var input_box = $("<input id = 'new-field' type='text' placeholder = 'Enter field name' class = 'BA-input margin-right-std new-content'>");
		var submit_btn = $("<button id = 'add-field' class = 'BA-button margin-right-std new-content'>add</button>");	
		var cancel_btn = $("<button id = 'cancel-field' class = 'BA-button-orange new-content'>&#10060;</button>");	
		$(this).parent().append("<br>").append(input_box).append(submit_btn).append(cancel_btn);
		$(this).hide();		
	});
	$(".main-content-area").on("click","#add-field",function(){
		var str = $("#new-field").val();
		$("#add-field-btn").show();		
		$(".new-content").hide();
		$.ajax({
			type:'POST',
			data: {field_name: str},
			url: "http://Business_arena/index.php/DBController/add_field",
			beforeSend: function(){
				//$(".main-content-area, .main-content-area-cat-closed").append($("#loader").html());
			},
			complete: function(){
				//$(".loader-thin").fadeOut("slow");
			},
			success: function(result){
				location.reload();
			}
		});
	});
	$(".main-content-area").on("click","#cancel-field",function(){
		$("#add-field-btn").show();		
		$(".new-content").hide();
	});
	
	//Products page and Locations page
	$(".main-content-area").on("click","#add-new-products, #add-new-location", function(){
		$(".modal-frame, .modal-frame-small").html($("#add-prds").html());
		$(".modal-BG").css("display","flex");
	});	
	$(".main-content-area").on("click",".edit-btn.prd", function(){
		//alert($(this).parent().parent().siblings().eq(7).children("span").text());
		$(".modal-frame, .modal-frame-small").html($("#edit-prd").html());
		$(".modal-BG").css("display","flex");
		$("#edit-modal-img").attr("src",$(this).parent().parent().siblings().eq(0).children("img").attr("src"));
		$("#edit-prd-name").val($(this).parent().parent().siblings().eq(1).children("span").text());
		$("#edit-prd-price").val($(this).parent().parent().siblings().eq(3).find("span.hidden").text());
		$("#edit-prd-quantity").val($(this).parent().parent().siblings().eq(4).children("span").text());
		$("#edit-prd-type").val($(this).parent().parent().siblings().eq(5).children("span").text());
		$("#edit-prd-area").val($(this).parent().parent().siblings().eq(10).children("span").text());
		$("#edit-prd-description").val($(this).parent().parent().siblings().eq(6).children("span").text());	
		$("#edit-prd-condition").val($(this).parent().parent().siblings().eq(7).children("span").text());	
		$("#edit-prd-ID").val($(this).parent().parent().siblings().eq(8).children("span").text());	
		$("#edit-pic-name").val($(this).parent().parent().siblings().eq(9).children("span").text());
		$("#edit-prd-category").val($(this).parent().parent().siblings().eq(2).children("span").attr("id"));
	});
	$(".main-content-area").on("click",".edit-view", function(){
		//alert($("div#" + $(this).attr("id")).children().eq(1).children("span").text());
		$(".modal-frame, .modal-frame-small").html($("#edit-prd").html());
		$(".modal-BG").css("display","flex");
		$("#edit-modal-img").attr("src",$(this).parent().parent().siblings().eq(0).children("img").attr("src"));
		$("#edit-prd-name").val($("div#" + $(this).attr("id")).children().eq(1).children("span").text());
		$("#edit-prd-price").val($("div#" + $(this).attr("id")).children().eq(3).find("span.hidden").text());
		$("#edit-prd-quantity").val($("div#" + $(this).attr("id")).children().eq(4).children("span").text());
		$("#edit-prd-type").val($("div#" + $(this).attr("id")).children().eq(5).children("span").text());
		$("#edit-prd-area").val($("div#" + $(this).attr("id")).children().eq(10).children("span").text());
		$("#edit-prd-description").val($("div#" + $(this).attr("id")).children().eq(6).children("span").text());	
		$("#edit-prd-condition").val($("div#" + $(this).attr("id")).children().eq(7).children("span").text());	
		$("#edit-prd-ID").val($("div#" + $(this).attr("id")).children().eq(8).children("span").text());	
		$("#edit-pic-name").val($("div#" + $(this).attr("id")).children().eq(9).children("span").text());
		$("#edit-prd-category").val($("div#" + $(this).attr("id")).children().eq(2).children("span").attr("id"));
	});
	$(".main-content-area").on("click",".del-btn.prd", function(){
		$(".modal-frame, .modal-frame-small").html($("#del-prd").html());
		$(".modal-BG").css("display","flex");
		$("#del-modal-img").attr("src",$(this).parent().parent().siblings().eq(0).children("img").attr("src"));
		$("#del-prd-name span").text($(this).parent().parent().siblings().eq(1).children("span").text());
		$("#del-prd-price span").text("MK " + $(this).parent().parent().siblings().eq(3).find("span#price-cont").text());
		$("#del-prd-quantity span").text($(this).parent().parent().siblings().eq(4).children("span").text());
		$("#del-prd-type span").text($(this).parent().parent().siblings().eq(5).children("span").text());
		$("#del-prd-condition span").text($(this).parent().parent().siblings().eq(7).children("span").text());
		$("#del-prd-description span").text($(this).parent().parent().siblings().eq(6).children("span").text());	
		$("#del-prd-delete-btn").attr("href",$(this).attr("id"));
	});
	$(".main-content-area").on("click",".del-view", function(){
		//alert($(this).attr("id")); $("div#" + $(this).prev().attr("id")).children().
		$(".modal-frame, .modal-frame-small").html($("#del-prd").html());
		$(".modal-BG").css("display","flex");
		$("#del-modal-img").attr("src",$("div#" + $(this).prev().attr("id")).children().eq(0).children("img").attr("src"));
		$("#del-prd-name span").text($("div#" + $(this).prev().attr("id")).children().eq(1).children("span").text());
		$("#del-prd-price span").text("MK " + $("div#" + $(this).prev().attr("id")).children().eq(3).find("span#price-cont").text());
		$("#del-prd-quantity span").text($("div#" + $(this).prev().attr("id")).children().eq(4).children("span").text());
		$("#del-prd-type span").text($("div#" + $(this).prev().attr("id")).children().eq(5).children("span").text());
		$("#del-prd-condition span").text($("div#" + $(this).prev().attr("id")).children().eq(7).children("span").text());
		$("#del-prd-description span").text($("div#" + $(this).prev().attr("id")).children().eq(6).children("span").text());	
		$("#del-prd-delete-btn").attr("href",$(this).attr("id"));
	});
	$(".main-content-area").on("keyup","#client-prd-search", function(){
		var str = $(this).val();
		ajax_search(str,"Business_arena/index.php/DBController/filter/client-prd-search")
	});
	$(".main-content-area").on("keyup","#client-loc-search", function(){
		var str = $(this).val();
		ajax_search(str,"http://Business_arena/index.php/DBController/filter/client-loc-search")
	});
	
	function ajax_search(str,url_string){
		$.ajax({
			type:'POST',
			data: {search_string: str},
			url: url_string,
			beforeSend: function(){
				$(".main-content-area, .main-content-area-cat-closed").append($("#loader").html());
			},
			complete: function(){
				$(".loader-thin").fadeOut("slow");
			},
			success: function(result){
				$(".client-item-list-cont").html(result);
			}
		});
	}
	$(".main-content-area").on("change","#client-prd-type-filter", function(){
		var str = $(this).val();
		ajax_search(str,"http://Business_arena/index.php/DBController/filter/client-prd-type-filter");
	});
	$(".main-content-area").on("change","#client-prd-cat-filter", function(){
		var str = $(this).val();
		ajax_search(str,"http://Business_arena/index.php/DBController/filter/client-prd-cat-filter");
	});	
	$(".main-content-area").on("change","#client-prd-area-filter", function(){
		var str = $(this).val();
		ajax_search(str,"http://Business_arena/index.php/DBController/filter/client-prd-area-filter");
	});
	$(".main-content-area").on("click",".edit-btn.loc", function(){
		//alert($(this).parent().parent().siblings().eq(4).children("span").text());
		$(".modal-frame, .modal-frame-small").html($("#edit-loc").html());
		$(".modal-BG").css("display","flex");
		$("#edit-loc-area").val($(this).parent().parent().siblings().eq(0).children("span").text());
		$("#edit-loc-district").val($(this).parent().parent().siblings().eq(1).children("span").text());
		$("#edit-loc-description").val($(this).parent().parent().siblings().eq(2).children("span").text());
		$("#edit-loc-country").val($(this).parent().parent().siblings().eq(3).children("span").text());
		$("#edit-loc-id").val($(this).parent().parent().siblings().eq(4).children("span").text());
	});
	$(".main-content-area").on("click",".edit-view-loc", function(){
		//alert($("div#" + $(this).attr("id")).children().eq(0).children("span").text());
		$(".modal-frame, .modal-frame-small").html($("#edit-loc").html());
		$(".modal-BG").css("display","flex");
		$("#edit-loc-area").val($("div#" + $(this).attr("id")).children().eq(0).children("span").text());
		$("#edit-loc-district").val($("div#" + $(this).attr("id")).children().eq(1).children("span").text());
		$("#edit-loc-description").val($("div#" + $(this).attr("id")).children().eq(2).children("span").text());
		$("#edit-loc-country").val($("div#" + $(this).attr("id")).children().eq(3).children("span").text());
		$("#edit-loc-id").val($("div#" + $(this).attr("id")).children().eq(4).children("span").text());
	});
	$(".main-content-area").on("click",".del-btn.loc", function(){
		$(".modal-frame, .modal-frame-small").html($("#del-loc").html());
		$(".modal-BG").css("display","flex");
		$("#del-loc-area span").text($(this).parent().parent().siblings().eq(0).children("span").text());
		$("#del-loc-district span").text($(this).parent().parent().siblings().eq(1).children("span").text());
		$("#del-loc-description span").text($(this).parent().parent().siblings().eq(2).children("span").text());
		$("#del-loc-country span").text($(this).parent().parent().siblings().eq(3).children("span").text());
		$("#del-loc-btn").attr("href",$(this).attr("id"));
	});
	$(".main-content-area").on("click",".del-view-loc", function(){
		$(".modal-frame, .modal-frame-small").html($("#del-loc").html());
		$(".modal-BG").css("display","flex");
		$("#del-loc-area span").text($("div#" + $(this).prev().attr("id")).children().eq(0).children("span").text());
		$("#del-loc-district span").text($("div#" + $(this).prev().attr("id")).children().eq(1).children("span").text());
		$("#del-loc-description span").text($("div#" + $(this).prev().attr("id")).children().eq(2).children("span").text());
		$("#del-loc-country span").text($("div#" + $(this).prev().attr("id")).children().eq(3).children("span").text());
		$("#del-loc-btn").attr("href",$(this).attr("id"));
	});
	/*$(".main-content-area").on("click","#del-prd-delete-btn", function(){
		var prd_ID = $("#del-prd-ID").text();
		$(".modal-BG").hide();
		//ajax_update('http://Business_arena/index.php/DBController/del_prd/' + prd_ID);
		$.ajax({
			type:'POST',
			url: 'http://Business_arena/index.php/DBController/del_prd/' + prd_ID,
			beforeSend: function(){
				$(".main-content-area, .main-content-area-cat-closed").append($("#loader").html());
			},
			success: function(result){
				location.reload();							
			},
			error: function(xhr){
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	});*/
	
	//views page	
	$(".main-content-area").on("change","#client-views-selector", function(){
		var str = $(this).val();
		if (str != "all categories"){			
			$.ajax({
				type:'POST',
				data: {search_string: str},
				url:'http://Business_arena/index.php/DBController/load_product_views',
				beforeSend: function(){
					$(".main-content-area, .main-content-area-cat-closed").append($("#loader").html());
				},
				complete: function(){
					$(".loader-thin").fadeOut("slow");
				},
				success: function(result){
					$(".chart").html(result);
					$("#views-title").text("PRODUCT VIEWS");
					$("#views-category-title").text("PRODUCT NAME (" + str + ")");
				}
			});	
		}
		else{
			$.ajax({
				type:'POST',
				data: {search_string: str},
				url:'http://Business_arena/index.php/DBController/show_views_panel/get_ID/page_update',
				beforeSend: function(){
					$(".main-content-area, .main-content-area-cat-closed").append($("#loader").html());
				},
				complete: function(){
					$(".loader-thin").fadeOut("slow");
				},
				success: function(result){
					$(".chart").html(result);
					$("#views-title").text("PRODUCT CATEGORY VIEWS");
				}
			});
		}
		
	});
		
	//Usage quota page
	$(".main-content-area").on("click",".buy-uq-btn",function(){
		$(".modal-BG").css("display","flex");
		$(".modal-BG").html($("#uq-buy").html());
		$("#modal-subscr-title").text($(this).siblings().eq(0).text());
		$("#modal-subscr-price span").text($(this).siblings().eq(1).text());
		$("#modal-subscr-description").text($(this).siblings().eq(3).text());		
		load_payment_info();
		$(".modal-subscr-ID").val($(this).siblings().eq(4).text());
	});
	$(".main-content-area").on("click",".view-uq-descr",function(){
		$(".modal-BG").css("display","flex");
		$(".modal-BG").html($("#uq-view-descr").html());
		$("#modal-subscr-title").text($(this).siblings().eq(0).text());
		$("#modal-subscr-price span").text($(this).siblings().eq(1).text());
		$("#modal-subscr-description").text($(this).siblings().eq(2).text());
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
	$("#client-add-new-business-btn").click(function(){
		$(".modal-frame-small").html($("#add-business").html());
		$(".modal-BG").css("display","flex");
	});
	$("#client-del-business-btn").click(function(){
		$(".modal-frame-small").html($("#del-business").html());
		$(".modal-BG").css("display","flex");
	});
	$(".main-content-area").on("keyup","#client-biz-search", function(){
		var str = $(this).val();
		$.ajax({
			type:'POST',
			data: {search_string: str},
			url: "http://Business_arena/index.php/DBController/filter/client-biz-search",
			beforeSend: function(){
				$(".main-content-area, .main-content-area-cat-closed").append($("#loader").html());
			},
			complete: function(){
				$(".loader-thin").fadeOut("slow");
			},
			success: function(result){
				$("section.businesses").html(result);
			}
		});
	});	
	
	/*general scripts*/
	$(".main-content-area").on("click", ".modal-closebtn", function(){
		$(this).parent().parent().hide();
	});
	$(".main-content-area").on("click", ".view-more-btn.prd", function(){
		$(".modal-frame, .modal-frame-small").html($("#view-more-content").html());
		$(".modal-BG").css("display","flex");
		$(".client-view-more-image-cont img").attr("src",$(this).siblings().eq(0).children("img").attr("src"));
		$("#client-view-prd-name").text($(this).siblings().eq(1).children("span").text());
		$("#client-view-prd-price").text($(this).siblings().eq(3).find("span#price-cont").text());
		$("#client-view-prd-quantity").text($(this).siblings().eq(4).children("span").text())
		$("#client-view-prd-cat").text($(this).siblings().eq(2).children("span").text());
		$(".edit-view").attr("id",$(this).prev().find("img.edit-btn").attr("id"));
		$(".del-view").attr("id",$(this).prev().find("img.del-btn").attr("id"));
	});
	$(".main-content-area").on("click", ".view-more-btn.loc", function(){
		$(".modal-frame, .modal-frame-small").html($("#view-more-content").html());
		$(".modal-BG").css("display","flex");
		$("#client-view-loc-area").text($(this).siblings().eq(0).children("span").text());
		$("#client-view-loc-district").text($(this).siblings().eq(1).find("span").text());
		$("#client-view-loc-country").text($(this).siblings().eq(3).children("span").text())
		$("#client-view-loc-directions").text($(this).siblings().eq(2).children("span").text());
		$(".edit-view-loc").attr("id",$(this).parent().attr("id"));
		$(".del-view-loc").attr("id",$(this).prev().find("img.del-btn").attr("id"));
	});
	/*$(".modal-BG").click(function(){
		$(this).hide();	
	});*/
});
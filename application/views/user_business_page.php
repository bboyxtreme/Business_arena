<section class = "main-content-container">
<header class = "info">
	<header id="heading">
		<p class = "BA-green no-margin">
			<?php echo "Zest Shop (Location: Bunda, Lilongwe)"; ?> 
		</p>	
	</header>
	<header id="search">
		<input id = "prdUserSearch" name = "search" type = "text" placeholder = "&#128269; Search...">		
	</header>
</header>
<ul id="uBizPageMenu">
	<li class="active prds">Products</li>
	<li class = "contacts">Contacts</li>
	<li class = "location">About</li>
</ul>
<!--<select id = "function-select-dropdwn" class = "BA-select">
	<option disabled selected>Select function</option>
	<option>Search button</option>
	<option>Filters</option>
</select>-->

<section id = "bizPrdDisplay">	
	<section class = "filters">
        <select class = "BA-select">
            <option disabled selected>Area Filter</option>
        </select>
        <select class = "BA-select">
            <option disabled selected>Product type Filter</option>
        </select>
    </section>
	<article  class = "prd-thumbnail-BP"><table class = "prd-thumbnail"><tr><td class = "prdPic">
	<img  src="<?php echo base_url(); ?>images/uploads/black_magic.jpg" alt="pic loading failed"></td></tr>
	<tr><td><h5>S5</h5><p>MWK 250,000</p><button class = "view-product">VIEW</button></td></tr></table></article>
    <article  class = "prd-thumbnail-BP"><table class = "prd-thumbnail"><tr><td class = "prdPic">
	<img  src="<?php echo base_url(); ?>images/uploads/black_magic.jpg" alt="pic loading failed"></td></tr>
	<tr><td><h5>S5</h5><p>MWK 250,000</p><button class = "view-product">VIEW</button></td></tr></table></article>
    <article  class = "prd-thumbnail-BP"><table class = "prd-thumbnail"><tr><td class = "prdPic">
	<img  src="<?php echo base_url(); ?>images/uploads/black_magic.jpg" alt="pic loading failed"></td></tr>
	<tr><td><h5>S5</h5><p>MWK 250,000</p><button class = "view-product">VIEW</button></td></tr></table></article>   	
</section>
<section id = "contacts" style="display: none;">
	<p class = "BA-green medium-font-size">Phone number(s):</p>
	<p class = "BA-dark-orange">+265 995 926 084</p>
	<?php /*
		if ($contacts->num_rows() > 0){
			foreach ($contacts->result() as $contact){
				if ($contact->contactType == "Mobile"){
					echo "<p>+265" . $contact->contact . "</p>";
				}					
			}
		}*/
	?>
	<p class = "BA-green medium-font-size">Email(s):</p>
	<p class = "BA-dark-orange">bmangisoni@gmail.com</p>
	<?php 
		/*if ($contacts->num_rows() > 0){
			foreach ($contacts->result() as $contact){
				if ($contact->contactType == "Email"){
					echo "<p>" . $contact->contact . "</p>";
				}					
			}
		}*/
	?>
</section>
<section id = "location" style="display: none;">
	<p class = "BA-green medium-font-size">Slogan</p>
	<p class = "BA-dark-orange">bizSlogan</p>
	<p class = "BA-green medium-font-size">Business Field(s)</p>
	<p class = "BA-dark-orange">bizField</p>
	<p class = "BA-green medium-font-size">Local directions</p>
	<p class = "BA-dark-orange">locDirections</p>
</section>
<!--<section class = "modalBG">
	<section class = "prdDisplay">
		<span class = "closebtn">&#10060;</span>
	</section>
</section>-->
</section>
<section class = "modal-BG">
	<section class = "modal-frame">
    	
    </section>
</section>

<div id = "user-view-product" class = "hidden">
	<span class = "modal-closebtn">&#10060;</span>
        <p class = "title-strip h-font-size margin-bottom-std">PRODUCT INFO</p>
        <div id = "modal-frame-body" class = "side-by-side-cont">
            <section class = "side-by-side-item product-image margin-top-std">
            <img src="<?php echo base_url(); ?>images/uploads/black_magic.jpg">
            <div class = "margin-top-std">
                <button id = "user-place-order-btn" class = "BA-button small-font-size">Place Order</button>
                <button id = "user-send-email-btn" class = "BA-button small-font-size">Email Enquiry</button>
            </div>
            </section>
            <section class = "side-by-side-item margin-top-std">
                <p class = "BA-dark-orange info-item-emboss">PRODUCT NAME</p>
                <p class = "BA-green info-item-emboss">PRICE</p>
                <p class = "BA-dark-orange info-item-emboss">QUANTITY</p>
                <p class = "BA-green info-item-emboss">BRAND NEW OR SECOND HAND</p>            
            </section>        
        </div>
</div>
<div id = "user-capture-contacts" class = "hidden">
	<span class = "modal-closebtn">&#10060;</span>
    <p class = "title-strip h-font-size margin-bottom-std">PRODUCT INFO</p>
    <section class = "margin-top-std _80p-width-center">        
        <h2 class = "BA-dark-orange margin-bottom-std center">Enter contact details</h2>
        <p class = "BA-green justify">Thanks for your interest in our product. To place an order for a product please <span class = "BA-green-hover bold" >Register</span> with the system or simply <span class = "BA-dark-orange bold">Enter your contacts</span> so that we can communicate to you about the product. BEST REGARDS!</p>
        <p class = "BA-dark-orange bold">ENTER YOUR CONTACT(S)</p>
        <input type = "text" placeholder = "enter contact number" class = "BA-input _100pwidth margin-bottom-std"><br>
        <span class = "BA-dark-orange">and/or</span>
        <input type = "email" placeholder = "enter email address" class = "BA-input _100pwidth margin-bottom-std">
        <div class = "center-bottom-btn"><input type = "submit" value = "Submit" class = "BA-button medium-font-size"></div>    
    </section>
 </div>
 <div id = "user-send-email" class = "hidden">
	<span class = "modal-closebtn">&#10060;</span>
    <p class = "title-strip h-font-size margin-bottom-std">PRODUCT INFO</p>
    <section class = "margin-top-std _80p-width-center">        
        <h2 class = "BA-dark-orange no-margin center">Compose Email</h2>
        <p class = "BA-green small-font-size margin-top-std"><span class = "label BA-dark-orange">Subject Line:</span> <span id = "user-email-subject">Subject</span></p>
        <textarea rows="9" placeholder="Enter email..." class = "_100pwidth"></textarea>
        <div class = "center-bottom-btn"><input type = "submit" value = "Submit" class = "BA-button medium-font-size"></div>
    </section>
 </div>
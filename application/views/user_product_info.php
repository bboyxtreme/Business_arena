<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                Zest Shop at Bunda, Lilongwe
            </p>	
        </header>
    </header>
    <section class = "product">
        <section class = "product-image margin-top-std">
        <img src="<?php echo base_url(); ?>images/uploads/black_magic.jpg">
        <div class = "margin-top-std">
            <button id = "user-place-order-btn"  class = "BA-button">Place Order</button>
            <button id = "user-send-email-btn" class = "BA-button">Email Enquiry</button>
        </div>
        </section>
        <section class = "product-info margin-top-std">
            <p class = "BA-dark-orange">PRODUCT NAME</p>
            <p class = "BA-green">PRICE</p>
            <p class = "BA-dark-orange">QUANTITY</p>
            <p class = "BA-green">BRAND NEW OR SECOND HAND</p>
        </section>
    </section>
</section> 

<section class = "modal-BG">
	<section class = "modal-frame-small">
    	
    </section>
</section>

<div id = "user-capture-contacts" class = "hidden">
    <span class = "modal-closebtn">&#10060;</span>
    <p class = "title-strip medium-font-size no-margin">PLACE PRODUCT ORDER</p>
    <section class = "margin-top-std">
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
    <p class = "title-strip medium-font-size no-margin">PLACE EMAIL ENQUIRY</p>
    <section class = "margin-top-std">        
        <h3 class = "BA-dark-orange margin-bottom-std center">Compose Email</h3>
        <p class = "BA-green  small-font-size margin-top-std"><span class = "label BA-dark-orange">Subject Line:</span> <span id = "user-email-subject">Subject</span></p>
        <textarea rows="9" placeholder="Enter email..." class = "_100pwidth margin-bottom-std"></textarea>
        <div class = "center-bottom-btn"><input type = "submit" value = "Submit" class = "BA-button medium-font-size"></div>
    </section>
 </div>
<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo "Zest Shop >> Usage Quota"; ?> 
            </p>	
        </header>
        <header id="search" >
            <input id = "client-uq-search" name = "search" type = "text" placeholder = " &#128269; Search...">		
        </header>
    </header>
    <section class = "side-by-side-cont">
        <p class = "side-by-side-item info-item-emboss margin-top-std BA-dark-orange" style = "text-align: left;"><?php echo date("F j, Y"); ?></p>
        <p class = "side-by-side-item info-item-emboss margin-top-std BA-dark-orange" style = "text-align: left;">USAGE QUOTA BALANCE: <span class = "BA-green bold"><?php echo $usage_quota; ?>  days left</span></p>
    </section>
    <section class = "side-by-side-cont margin-top-std">
    	<section class = "side-by-side-item">
        	<p class = "info-item-emboss BA-green">Quota subscriptions</p>
            <div class = "card-display-cont">
            	<?php foreach($subscriptions["usage quota"]->result() as $row): ?>
            	<div class = "card-dispay-box margin-bottom-std vertical-align">
                	<p class = "no-margin small-font-size BA-green center"><?=$row->subscr_name?></p>
                    <p class = "no-margin small-font-size BA-dark-orange center"><?=$row->subscr_price?></p>
                    <p class = "no-margin tiny-font-size BA-dark-green center green-highlight">View description</p>
                    <button class = "tiny-font-size BA-button _100pwidth buy-uq-btn">BUY</button>
                </div>
       			<?php endforeach; ?>
            </div>
        </section>
        <section class = "side-by-side-item">
        	<p class = "info-item-emboss BA-green">Market Boost subcriptions</p>
             <div class = "card-display-cont">
            	 <?php foreach($subscriptions["market boost"]->result() as $row): ?>
                    <div class = "card-dispay-box margin-bottom-std vertical-align">
                        <p class = "no-margin small-font-size BA-green center"><?=$row->subscr_name?></p>
                        <p class = "no-margin small-font-size BA-dark-orange center"><?=$row->subscr_price?></p>
                        <p class = "no-margin tiny-font-size BA-dark-green center green-highlight">View description</p>
                        <button class = "tiny-font-size BA-button _100pwidth buy-uq-btn">BUY</button>
                    </div>
       			<?php endforeach; ?>
            </div>
        </section>
    </section>
    <section class = "modal-BG">
    	<section class = "modal-frame">
        	<span class = "modal-closebtn">&#10060;</span> 
        	<p class = "title-strip h-font-size no-margin">BUY SUBSCRIPTION</p>
            <p class = "title-strip BA-yellow-bg BA-white medium-font-size  margin-top-std">Subscription name</p>
            <section class = "side-by-side-cont">
    			<section class = "side-by-side-item">
                	<p class = "info-item-emboss margin-top-std BA-green">Description</p>
                    <p class = "BA-green justify">The <span class = "BA-dark-orange">1 Month Usage Quota subcription</span> will give you a month of access to the system and its services. These services include, product management, location management and communication with customers and other business owners just to mention a few</p>
                </section>
                <section class = "side-by-side-item">
                	<p class = "info-item-emboss margin-top-std BA-dark-orange">Price</p>
                    <section class = "border-orange margin-top-std">
                    	<p class = "title-strip BA-dark-orange-bg BA-white small-font-size no-margin">Make Payment</p>
                        <div id ="make-payment-cont" class = "padding-std">
                            
                        </div>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<div id = "make-payment-cont-content" class = "hidden">
<p class = "BA-green no-margin">Upload proof of payment</p>
    <input type = "file" name = "payment"><br>
    <input id = "sub-payment-btn" type = "submit" value = "Submit" class = "BA-button margin-top-std">
    <p class = "BA-dark-orange-hover margin-top-std">Or pay with airtel money</p> 
    <p class = "BA-green margin-bottom-std">To pay with airtel money, send money to <span class = "BA-dark-orange">0995 926 084</span> then enter transaction ID below</p>
    <input type = "text" placeholder="Enter transaction ID. e.g. CO170202.1529.GO08327" class = "_100pwidth BA-input" style = "display:block;">
    <input id = "sub-payment-btn" type = "submit" value = "Submit" class = "BA-button margin-top-std">
    <div class = "loading2 hidden"><img src = "<?php echo base_url(); ?>images/load2.gif"></div>
    <p id = "paid" class = "medium-font-size center BA-dark-orange hidden">Payment submitted!</p>
    <button id = "make-payment-conf-btn" class = "BA-button hidden">OK!</button>
</div>
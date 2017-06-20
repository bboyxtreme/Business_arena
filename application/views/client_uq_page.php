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
                	<p class = "no-margin small-font-size BA-green center"><?=strtoupper($row->subscr_name)?></p>
                    <p class = "no-margin small-font-size BA-dark-orange center">MK <?=number_format((float)$row->subscr_price)?></p>
                    <p class = "no-margin tiny-font-size BA-dark-green center green-highlight view-uq-descr">View description</p>
                    <p class = "hidden"><?=$row->subscr_descr?></p>
                    <p class = "hidden"><?=$row->subscr_ID?></p>
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
                        <p class = "no-margin small-font-size BA-green center"><?=strtoupper($row->subscr_name)?></p>
                        <p class = "no-margin small-font-size BA-dark-orange center">MK <?=number_format((float)$row->subscr_price)?></p>
                        <p class = "no-margin tiny-font-size BA-dark-green center green-highlight">View description</p>
                        <p class = "hidden"><?=$row->subscr_descr?></p>
                        <p class = "hidden"><?=$row->subscr_ID?></p>
                        <button class = "tiny-font-size BA-button _100pwidth buy-uq-btn">BUY</button>
                    </div>
       			<?php endforeach; ?>
            </div>
        </section>
    </section>
    <section class = "modal-BG">
    	
    </section>
</section>
<div id = "uq-buy" class = "hidden">
	<section class = "modal-frame">
        <span class = "modal-closebtn">&#10060;</span> 
        <p class = "title-strip h-font-size no-margin">BUY SUBSCRIPTION</p>
        <p id = "modal-subscr-title" class = "title-strip BA-yellow-bg BA-green medium-font-size  margin-top-std">Subscription name</p>
        <section class = "side-by-side-cont">
            <section class = "side-by-side-item">
                <p class = "info-item-emboss margin-top-std BA-dark-orange">Description</p>
                <p id = "modal-subscr-description" class = "BA-green justify"></p>                
                <p id = "modal-subscr-price" class = "info-item-emboss margin-top-std BA-dark-orange">
                	Price : <span class = "BA-green"></span>
                </p>
            </section>
            <section class = "side-by-side-item">
                <section class = "border-orange margin-top-std">
                    <p class = "title-strip BA-dark-orange-bg BA-white small-font-size no-margin">Make Payment</p>
                    <div id ="make-payment-cont" class = "padding-std">
                        
                    </div>
                </section>
            </section>
        </section>
    </section>
</div>
 <div id = "uq-view-descr" class = "hidden">
 	<section class = "modal-frame-small">
        <span class = "modal-closebtn">&#10060;</span> 
        <p id = "modal-subscr-title" class = "title-strip h-font-size no-margin">SUBCRIPTION NAME</p>
        <p id = "modal-subscr-price" class = "info-item-emboss margin-top-std BA-dark-orange">Price : <span></span></p>
        <p id = "modal-subscr-description" class = "BA-green justify"></p>
    </section>
</div>
<div id = "make-payment-cont-content" class = "hidden">
	<p class = "BA-green margin-bottom-std">Upload proof of payment</p>
	<?php echo form_open_multipart("DBController/pay_for_subcription/scan"); ?>
    	<input type = "hidden" name = "subscr-ID" class = "modal-subscr-ID">
        <input type = "file" name = "userfile"><br>
        <input id = "sub-payment-btn" type = "submit" value = "Submit" class = "BA-button margin-top-std">
    <?php echo form_close(); ?>
    
    <p class = "BA-dark-orange-hover margin-top-std">Or pay with airtel money</p> 
    <p class = "BA-green margin-bottom-std">To pay with airtel money, send money to <span class = "BA-dark-orange">0995 926 084</span> then enter transaction ID below</p>
    <?php echo form_open("DBController/pay_for_subcription/mobile_money"); ?>
    	<input type = "hidden" name = "subscr-ID" class = "modal-subscr-ID">
        <input type = "text" name = "transc" placeholder="Enter transaction ID. e.g. CO170202.1529.GO08327" class = "_100pwidth BA-input" style = "display:block;">
        <input id = "sub-payment-btn" type = "submit" value = "Submit" class = "BA-button margin-top-std">
    <?php echo form_close(); ?>
    <div class = "loading2 hidden"><img src = "<?php echo base_url(); ?>images/load2.gif"></div>
    <p id = "paid" class = "medium-font-size center BA-dark-orange hidden">Payment submitted!</p>
    <button id = "make-payment-conf-btn" class = "BA-button hidden">OK!</button>
</div>
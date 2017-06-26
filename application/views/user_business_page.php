<section class = "main-content-container">
<header class = "info">
	<header id="heading">
		<p class = "BA-green no-margin">
			<?php 
				if ($location != "no_location"){
					echo $biz_info->biz_name . " (Location: " . $location->loc_area . ", " . $location->loc_district . ")";					
				} 
				else{
					echo $biz_info->biz_name;
				}
			?> 		
        </p>	
	</header>
	<header id="search">
		<input id = "user-prd-search" name = "search" type = "text" placeholder = "&#128269; Search...">		
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
        <select id = "user-prd-area-filter" class = "BA-select">
            <option disabled selected>View other location</option>
            <?php foreach($filter_locations->result() as $row): ?>
                <option value = "<?=$row->loc_ID?>"><?=$row->loc_area?></option>
            <?php endforeach; ?>
            <option value = "" class = "BA-orange">Remove location filter</option>
        </select>
        <select id = "user-prd-type-filter" class = "BA-select">
            <option disabled selected>Product type Filter</option>
            <?php 
			 $types = array();
			 if($products->num_rows() != 0){
				 foreach($products->result() as $row){
					 array_push($types,$row->prd_type); 
				 }
			 }
			 $types = array_unique($types);
			 ?>               
            <?php foreach($types as $row): ?>
                <option><?=$row?></option>
            <?php endforeach; ?>
            <option value = "" class = "BA-orange">Remove type filters</option>
        </select>
        <select id = "user-prd-cat-filter" class = "BA-select">
            <option disabled selected>Product category Filter</option>
            <?php 
			 $cats = array();
			 if($products->num_rows() != 0){
				 foreach($products->result() as $row){
					 array_push($cats,$row->cat_name); 
				 }
			 }
			 $cats = array_unique($cats);
			 ?>               
            <?php foreach($cats as $row): ?>
                <option><?=$row?></option>
            <?php endforeach; ?>
            <option value = "" class = "BA-orange">Remove category filters</option>
        </select>
    </section>
<section id = "item-list">	
	<?php foreach($products->result() as $product): ?>
	<article  class = "prd-thumbnail-BP"><table class = "prd-thumbnail">
    	<tr><td class = "prdPic">
			<img  src="<?php echo base_url('images/uploads/' . $product->pic_name); ?>" alt="pic loading failed">
        </td></tr>
        <tr><td>
            <h5><?=$product->prd_name?></h5>
            <p>MK <?=number_format((float)$product->prd_price)?></p>
            <p class = "hidden"><?=$product->prd_quantity?></p>
            <p class = "hidden"><?=$product->prd_condition?></p>
            <p class = "hidden"><?=$product->prd_description?></p>
            <button id = "<?=$product->prd_ID?>" class = "view-product">VIEW</button>
        </td></tr>
    </table></article>
    <?php endforeach; ?>   	
</section>
</section>
<section id = "contacts" style="display: none;">
	<p class = "BA-green medium-font-size">Phone number(s):</p>
	<p class = "BA-dark-orange">+265 <?php echo $biz_info->biz_main_mobile; ?></p>
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
	<p class = "BA-dark-orange"><?php echo $biz_info->biz_main_email; ?></p>
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
	<p class = "BA-dark-orange"><?php echo $biz_info->biz_slogan; ?></p>
	<p class = "BA-green medium-font-size">Business Field(s)</p>
	<p class = "BA-dark-orange"><?php echo $biz_info->biz_main_field; ?></p>	
	<?php if ($location != "no_location"): ?>
        <p class = "BA-green medium-font-size">Local directions</p>
        <p class = "BA-dark-orange">
        <?=$location->loc_description?>	
        </p>				
    <?php else: ?> 
        
    <?php endif; ?> 		
    
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
            <img id = "user-view-prd-pic" src="" alt = "no image">
            <div class = "margin-top-std">
                <button id = "user-place-order-btn" class = "BA-button small-font-size">Place Order</button>
                <button id = "user-send-email-btn" class = "BA-button small-font-size">Email Enquiry</button>
            </div>
            </section>
            <section class = "side-by-side-item margin-top-std">
                <p id = "user-view-prd-name" class = "BA-dark-orange info-item-emboss">PRODUCT NAME <br><span></span></p>
                <p id = "user-view-prd-price" class = "BA-green info-item-emboss">PRICE <br><span></span></p>
                <p id = "user-view-prd-quantity" class = "BA-dark-orange info-item-emboss">QUANTITY <br><span></span></p>
                <p id = "user-view-prd-condition" class = "BA-green info-item-emboss">CONDITION <br><span></span></p>
                <p id = "user-view-prd-description" class = "BA-dark-orange info-item-emboss">DESCRIPTION <br><span></span></p>            
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
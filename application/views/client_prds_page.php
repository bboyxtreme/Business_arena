<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo $biz_name . " >> Products"; ?> 
            </p>	
        </header>
        <header id="search">
            <input id = "client-prd-search" name = "search" type = "text" placeholder = "&#128269; Search...">		
        </header>
    </header>
    <!--<select id = "client-function-select" class = "BA-select">
        <option disabled selected>Select function</option>
        <option>Search button</option>
        <option>Filters</option>
        <option>Add products</option>
    </select>-->
    <section class = "filters">
        <select class = "BA-select">
            <option disabled selected>Area Filter</option>
        </select>
        <select id = "client-prd-type-filter" class = "BA-select">
            <option disabled selected>Product type Filter</option>            
            <?php 
			 $types = array();
			 foreach($products->result() as $row){
				 array_push($types,$row->prd_type); 
			 }
			 $types = array_unique($types);
			 ?>               
            <?php foreach($types as $row): ?>
                <option><?=$row?></option>
            <?php endforeach; ?>
            <option value = "" class = "BA-orange">Remove type filters</option>
        </select>
        <select id = "client-prd-cat-filter" class = "BA-select">
            <option disabled selected>Product category Filter</option>            
             <?php 
			 $cats = array();
			 foreach($products->result() as $row){
				 array_push($cats,$row->cat_name); 
			 }
			 $cats = array_unique($cats);
			 ?>               
            <?php foreach($cats as $row): ?>
                <option><?=$row?></option>
            <?php endforeach; ?>
            <option value = "" class = "BA-orange">Remove category filters</option>
        </select>
        <button id = "add-new-products" class = "BA-button">&#10010; Add products</button>
    </section>
    <div class = "list-header">
    	<div class = "list-column"><span class = "BA-dark-orange">Thumbnail</span></div>	
        <div class = "list-column"><span class = "BA-dark-orange">Product Name</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Category</span></div>
        <div class = "list-column"><span class = "BA-dark-orange">Unit Price</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Quantity</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Controls</span></div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
    <section class = "client-item-list-cont">	    
    <?php if(isset($no_products)): ?>
    	<p class = "BA-dark-green"><?=$no_products?></p>
    <?php else: ?>
		<?php foreach($products->result() as $row):?>
        <div class = "list-row">
            <div class = "list-column"><img class = 'prd-thumbnails' alt = '<?=$row->pic_name?>' src="<?php echo base_url(); ?>images/uploads/<?=$row->pic_name?>"></div>	
            <div class = "list-column"><span class = "BA-green"><?=$row->prd_name?></span></div>
            <div class = "list-column low-p"><span class = "BA-green"><?=$row->cat_name?></span></div>
            <div class = "list-column"><span class = "BA-green"><span>MWK </span><span id = "price-cont"><?=number_format((float)$row->prd_price,2)?></span></span></div>
            <div class = "list-column low-p"><span class = "BA-green"><?=$row->prd_quantity?></span></div>
            <div class = "hidden"><span class = "BA-green"><?=$row->prd_type?></span></div>
            <div class = "hidden"><span class = "BA-green"><?=$row->prd_description?></span></div>  
            <div class = "hidden"><span class = "BA-green"><?=$row->prd_condition?></span></div> 
            <div class = "hidden"><span class = "BA-green"><?=$row->prd_ID?></span></div>  
            <div class = "hidden"><span class = "BA-green"><?=$row->pic_name?></span></div>        
            <div class = "list-column low-p">
                <div class = "ctrl-icons-cont">
                    <img id = '<?=$row->prd_ID?>' src='<?php echo base_url(); ?>images/edit.jpg' class='ctrl-icons edit-btn'>
                    <img id = '<?=base_url("DBController/del_prd/" . $row->prd_ID)?>' src='<?php echo base_url(); ?>images/delete.jpg' class='ctrl-icons del-btn'>
                </div>
            </div>
            <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
        </div>
        <?php endforeach;?>
    <?php endif; ?>
    </section>
</section>

<section class = "modal-BG">
	<section class = "modal-frame">
    	
    </section>	
</section>

<div id = "add-prds" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span> 
        <p class = "title-strip h-font-size no-margin">ADD PRODUCTS</p>
        <div class = "info-body">        
        <section class = "section-1 vertical-align">        	
            <p class = "BA-dark-orange info-item-emboss margin-top-std">Upload Single product</p>
            <?php echo form_open_multipart("DBController/add_products"); ?>
            <input type = "text" name = "prd-name" placeholder = "enter prd name" class = "BA-input margin-top-std"><br>
            <input type = "text" name = "prd-price" placeholder = "enter prd Unit Price" class = "BA-input margin-top-std"><br>
            <input type = "text" name = "prd-quantity" placeholder = "enter prd Quantit" class = "BA-input margin-top-std"><br>
            <input type = "text" name = "prd-type" placeholder = "enter prd-type e.g. phone, trouser or camera" class = "BA-input margin-top-std"><br>
            <select class = "BA-select margin-top-std" name = "prd-category">
                <option selected disabled>Select Category</option>
                <?php foreach($prd_categories->result() as $row): ?>
                    <option value = "<?=$row->cat_ID?>"><?=$row->cat_name?></option>
                <?php endforeach; ?>
            </select><br>
            <select name = "prd-condition" class = "BA-select margin-top-std">
               <option selected disabled>Select Condition</option>
               <option>Brand new</option>
               <option>Used</option>
            </select><br>
            <textarea name = "prd-description" class = "BA-input margin-top-std no-resize _100pwidth" rows = 5 placeholder = "enter prd specifications"></textarea>
            <p class = "BA-green">Upload picture (optional. can be done later at your own convinience</p>
            <input type = "file" name = "userfile" class = "BA-input" class = "BA-input margin-bottom-std"><br><br>
            <input type = "submit" value = "Submit" class = "BA-button-large margin-bottom-std">
            <?php echo form_close(); ?>
        </section>
        <section class = "section-2 vertical-align">
           	<p class = "BA-dark-orange info-item-emboss margin-top-std">OR Upload Excel Doc</p><br><br>
            <?php echo form_open_multipart("DBController/add_products/2"); ?>
            <input type = "file" name = "userfile" class = "BA-input margin-top-std">
            <input type = "submit" value = "Upload" class = "BA-button-large margin-top-std">
            <?php echo form_close(); ?>
        </section>
        </div>
</div>

<div id = "edit-prd" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span>
	<p class = "title-strip h-font-size margin-bottom-std">EDIT PRODUCT</p>
    <?php echo form_open_multipart("DBController/edit_product"); ?>
    <section class = "side-by-side-cont">
        <section class = "side-by-side-item">
        	<div class = "image-card">
                <div class = "image">
                    <img id = "edit-modal-img" src="">
                </div>
                <div class = "image-info">
                    <span class = "BA-dark-orange">Change thumbnail: </span>
                    <input type = "file" name = "userfile" class = "BA-input margin-top-std">
                </div>  
            </div>      	
        </section>
        <section class = "side-by-side-item">       
            <input id = "edit-prd-name" type = "text" name = "prd-name" placeholder = "enter prd name" class = "_100pwidth BA-input margin-bottom-std"><br>
            <input id = "edit-prd-price" type = "text" name = "prd-price" placeholder = "enter prd Unit Price" class = "_100pwidth BA-input margin-bottom-std"><br>
            <input id = "edit-prd-quantity" type = "text" name = "prd-quantity" placeholder = "enter prd Quantit" class = "_100pwidth BA-input margin-bottom-std"><br>
            <input id = "edit-prd-type" type = "text" name = "prd-type" placeholder = "enter prd-type e.g. phone, trouser or camera" class = "_100pwidth BA-input margin-bottom-std"><br>
            <input id = "edit-prd-ID" type = "hidden" name = "prd-ID">
            <input id = "edit-pic-name" type = "hidden" name = "prd-pic">
            <select id = "edit-prd-category" class = "_100pwidth BA-select margin-bottom-std" name = "prd-category">
                <option selected disabled>Select Category</option>
                <?php foreach($prd_categories->result() as $row): ?>
                    <option value = "<?=$row->cat_ID?>"><?=$row->cat_name?></option>
                <?php endforeach; ?>
            </select><br>
            <select id = "edit-prd-condition" name = "prd-condition" class = "_100pwidth BA-select margin-bottom-std">
               <option selected disabled>Select Condition</option>
               <option value = "Brand new">Brand new</option>
               <option value = "Used">Used</option>
            </select><br>
            <textarea id = "edit-prd-description" name = "prd-description" class = "BA-input margin-bottom-std no-resize _100pwidth" rows = 5 placeholder = "enter prd specifications"></textarea>        
        </section>
    </section>
    <div class = "center-bottom-btn">
    <input type = "submit" value = "Submit" class = "BA-button-large">
    </div>
    <? echo form_close(); ?>
    <!--<div class = "center-bottom-btn"></div><br>-->
</div>


<div id = "del-prd" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span>
	<p class = "title-strip h-font-size no-margin">DELETE PRODUCT</p>
    <p class = "BA-dark-orange">ARE YOU SURE YOU WANT TO DELETE THE FOLLWOING PRODUCT?</p>
    <div class = "info-body">        
        <section class = "product-image">
            <img id = "del-modal-img" src="">
        </section>
        <section class = "product-info">
        	<p id = "del-prd-ID" class = "hidden"></p>
            <p id = "del-prd-name" class = "BA-dark-orange">PRODUCT NAME: <br><span></span></p>
            <p id = "del-prd-price" class = "BA-green">PRICE: <br><span></span></p>
            <p id = "del-prd-quantity" class = "BA-dark-orange">QUANTITY: <br><span></span></p>
            <p id = "del-prd-type" class = "BA-green">TYPE: <br><span></span></p>
            <p id = "del-prd-condition" class = "BA-dark-orange">CONDITION: <br><span></span></p>
            <p id = "del-prd-description" class = "BA-green">DESCRIPTION: <br><span></span></p>
        </section>
    </div>
    <div class = "right-align-content">
        <a id = "del-prd-delete-btn" href = "#"><button class = "BA-button-large margin-top-extra margin-right-std">DELETE</button></a>
        <button id = "del-prd-cancel-btn" class = "BA-button-orange-large margin-top-extra">CANCEL</button>
    <div>        
</div>

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
        <select class = "BA-select">
            <option disabled selected>Product type Filter</option>
        </select>
        <button id = "add-new-products" class = "BA-button">&#10010; Add products</button>
    </section>
    <section class = "client-item-list-cont">	
    <div class = "list-header">
    	<div class = "list-column"><span class = "BA-dark-orange">Thumbnail</span></div>	
        <div class = "list-column"><span class = "BA-dark-orange">Product Name</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Category</span></div>
        <div class = "list-column"><span class = "BA-dark-orange">Unit Price</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Quantity</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Controls</span></div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
    <?php foreach($products->result() as $row):?>
    <div class = "list-row">
    	<div class = "list-column"><span class = "BA-dark-green"><img id = '' class = 'prd-thumbnails' alt = '' src="<?php echo base_url(); ?>images/uploads/black_magic.jpg"></span></div>	
        <div class = "list-column"><span class = "BA-green"><?=$row->prd_name?></span></div>
        <div class = "list-column low-p"><span class = "BA-green"><?=$row->cat_name?></span></div>
        <div class = "list-column"><span class = "BA-green"><span>MWK </span><span><?=$row->prd_price?></span></span></div>
        <div class = "list-column low-p"><span class = "BA-green"><?=$row->prd_quantity?></span></div>
        <div class = "list-column low-p">
        	<div class = "ctrl-icons-cont">
                <img id = '<?=$row->prd_ID?>' src='<?php echo base_url(); ?>images/edit.jpg' class='ctrl-icons edit-btn'>
                <img id = '<?=$row->prd_ID?>' src='<?php echo base_url(); ?>images/delete.jpg' class='ctrl-icons del-btn'>
            </div>
        </div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
    <?php endforeach;?>
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
        	<?php echo form_open_multipart("DBController/add_products"); ?>
                <p class = "BA-dark-orange info-item-emboss margin-top-std">Upload Single product</p>
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
    <section class = "side-by-side-cont">
        <section class = "side-by-side-item">
        	<div class = "image-card">
                <div class = "image">
                    <img src="<?php echo base_url(); ?>images/uploads/black_magic.jpg">
                </div>
                <div class = "image-info">
                    <span class = "BA-dark-orange">Change photo: </span>
                    <input type = "file" class = "BA-input margin-top-std">
                </div>  
            </div>      	
        </section>
        <section class = "side-by-side-item vertical-align-flex-start">
            <input type = "text" name = "prd-name" placeholder = "enter prd name" class = "BA-input margin-bottom-std"><br>
            <input type = "text" name = "prd-price" placeholder = "enter prd Unit Price" class = "BA-input margin-bottom-std"><br>
            <input type = "text" name = "prd-quantity" placeholder = "enter prd Quantit" class = "BA-input margin-bottom-std"><br>
            <input type = "text" name = "prd-type" placeholder = "enter prd-type e.g. phone, trouser or camera" class = "BA-input margin-top-std"><br>
            <select class = "BA-select margin-bottom-std" name = "prd-category">
                <option selected disabled>Select Category</option>
                <?php foreach($prd_categories->result() as $row): ?>
                    <option value = "<?=$row->cat_ID?>"><?=$row->cat_name?></option>
                <?php endforeach; ?>
            </select><br>
            <select name = "prd-condition" class = "BA-select margin-bottom-std">
               <option selected disabled>Select Condition</option>
               <option>Brand new</option>
               <option>Used</option>
            </select><br>
            <textarea name = "prd-description" class = "BA-input margin-bottom-std no-resize _100pwidth" rows = 5 placeholder = "enter prd specifications"></textarea>
            <input type = "submit" value = "Submit" class = "BA-button-large">
        </section>
    </section>
    <!--<div class = "center-bottom-btn"></div><br>-->
</div>


<div id = "del-prd" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span>
	<p class = "title-strip h-font-size no-margin">DELETE PRODUCT</p>
        <p class = "BA-dark-orange">ARE YOU SURE YOU WANT TO DELETE THE FOLLWOING PRODUCT?</p>
        <div class = "info-body">        
        <section class = "product-image">
        	<img src="<?php echo base_url(); ?>images/uploads/black_magic.jpg">
        </section>
        <section class = "product-info">
           	<p class = "BA-dark-orange">PRODUCT NAME</p>
            <p class = "BA-green">PRICE</p>
            <p class = "BA-dark-orange">QUANTITY</p>
            <p class = "BA-green">BRAND NEW OR SECOND HAND</p>
        </section>
        </div>
        <div class = "right-align-content">
        <button class = "BA-button-large margin-top-extra margin-right-std">DELETE</button>
        <button class = "BA-button-orange-large margin-top-extra">CANCEL</button>
        <div>        
</div>

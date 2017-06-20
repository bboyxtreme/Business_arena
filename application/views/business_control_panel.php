<section class = "main-content-container margin-bottom-std">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo $biz_info->biz_name; ?>
            </p>	
        </header>
    </header>
    <section class = "biz-main-ctrl-panel">
        <section class = "biz-info-ctrl-panel">
        <p class = "BA-dark-orange">Thu May 04 2017</p>
        <p class = "BA-green biz-info-item">Todays views<br><span class = "BA-dark-orange"><?php echo $views['today_views']; ?></span></p>
        <p class = "BA-green biz-info-item">Total views<br><span class = "BA-dark-orange"><?php echo $views['total_views']; ?></span></p>
        <p class = "BA-green biz-info-item">Business details<br>
        <span class = "BA-green label">Name: </span><span id = "client-biz-name-label" class = "BA-dark-orange"><?php echo $biz_info->biz_name; ?></span><br>
        <span class = "BA-green label">Slogan: </span><span id = "client-biz-slogan-label" class = "BA-dark-orange"><?php echo $biz_info->biz_slogan; ?></span><br>
        
       <!-- <span>-->
        <span class = "BA-green label">Field(s): </span>
        <span id = "client-biz-field-label" class = "BA-dark-orange"><?php echo $biz_info->biz_main_field; ?></span><br>
        <!--<span id = "client-biz-field-label" class = "BA-dark-orange">
			<?php 
				/*echo $biz_info->biz_main_field;
				foreach($biz_fields->result() as $row){
					echo "," . $row->field_name;
				}*/
			?>
        </span> 
        <button id = "add-field-btn" class = "BA-button">&#10010; Add Field</button>-->
        <!--</span>-->
        
        <span class = "BA-green label">Mobile: </span><span id = "client-biz-mobile-label" class = "BA-dark-orange"><?php echo $biz_info->biz_main_mobile; ?></span><br>
        <span class = "BA-green label">Email: </span><span  id = "client-biz-email-label"class = "BA-dark-orange"><?php echo $biz_info->biz_main_email; ?></span><br>
        <button id = "edit-biz-details-btn" class = "BA-button">Edit</button>
        </p>
      	<section class = "biz-info-item">
        <p class = "BA-green">Business image</p>
        <div class = "biz-ctrl-panel-image">
        	<div class = "biz-ctrl-panel-image-cont">
            	<img  src="<?php echo base_url("images/uploads/" . $biz_info->biz_picture_name); ?>" alt="pic loading failed">
            </div>
            <div class = "biz-ctrl-panel-image-edit">
            	<p class = "no-margin">Change photo</p>
                <?php echo form_open_multipart("DBController/update_biz_picture/"); ?>
                <input type = "file" name = "userfile"><br>
                <input type = "hidden" name = "biz-pic" value = "<?php echo $biz_info->biz_picture_name; ?>">
                <input type = "submit" value="Change" class = "BA-button">
                <?php echo form_close(); ?>
            </div>
        </div>
        </section>
        </section>
        <section class = "controls">
        <p class = "BA-dark-orange center">CONTROLS</p>
        <div class = "main-func-container">
            <a href="<?php echo base_url("DBController/show_prd_panel/" . $biz_info->biz_ID);?>"><button class = "biz-func-button-main">PRODUCTS</button></a>
            <a href="<?php echo base_url("DBController/show_loc_panel/" . $biz_info->biz_ID);?>"><button class = "biz-func-button-main">LOCATIONS</button></a>
        </div>
        <a href="<?php echo base_url("DBController/show_views_panel/" . $biz_info->biz_ID);?>"><button class = "biz-func-button BA-white">VIEWS</button></a>
        <a href="<?php echo base_url("DBController/show_uq_panel/" . $biz_info->biz_ID);?>"><button class = "biz-func-button BA-dark-orange">USAGE QUOTA</button></a>
        <a href="<?php echo base_url("DBController/show_msgcom_panel/" . $biz_info->biz_ID);?>"><button class = "biz-func-button BA-white">NOTIFICATIONS</button></a>
        </section>
    </section>
</section>
<section class = "modal-BG">
	<section class = "modal-frame-small">
    <span class = "modal-closebtn">&#10060;</span>
    <p class = "title-strip medium-font-size">EDIT BUSINESS DETAILS</p>
    <?php echo form_open("DBController/edit_business_info"); ?>
    <div class = "vertical-align">
        <span class = "BA-dark-orange">Business name:</span>   
        <input name = "biz-name" type = "text" class = "BA-input margin-bottom-std">
        <span class = "BA-dark-orange">Business Slogan:</span>   
        <input name = "biz-slogan" type = "text" class = "BA-input margin-bottom-std">
        <span class = "BA-dark-orange">Business Field:</span>   
        <input name = "biz-field" type = "text" class = "BA-input margin-bottom-std"> 
        <span class = "BA-dark-orange">Business Mobile:</span>   
        <input name = "biz-mobile" type = "text" class = "BA-input margin-bottom-std">   
        <span class = "BA-dark-orange">Business Email:</span>   
        <input name = "biz-email" type = "text" class = "BA-input margin-bottom-std">          
    </div>   
    <div class = "center-bottom-btn">
    	 <input type = "submit" value = "Submit" class = "BA-button">
    </div> 
    <?php echo form_close(); ?>
    </section>
</section>
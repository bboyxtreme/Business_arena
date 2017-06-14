	<section class = "main-content-container margin-bottom-std">
		<header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                Your Buisnesses 
            </p>	
        </header>
        <header id="search" >
            <input id = "client-biz-search" name = "search" type = "text" placeholder = "&#128269; Search...">		
        </header>
        </header>
        <section class = "margin-top-min">
        	<button id = "client-add-new-business-btn" class = "BA-button">&#10010; Add Business</button>
    		<button id = "client-del-business-btn" class = "BA-button">&#9866; Delete Business</button>
        </section>
        <section class = "businesses">
        	<?php if (isset($no_businesses)): ?>
				<p class = 'BA-green'><?=$no_businesses?></p>
			<?php else: ?>
            	<?php foreach ($businesses->result() as $row): ?>
                	<article class = "biz-display-card">
                        <section class = "biz-logo">
                            <img  src="<?php echo base_url("images/uploads/" . $row->biz_picture_name); ?>" alt="pic loading failed">
                        </section>
                        <section class = "biz-info">
                            <h4 class = "card-name BA-green"><?=$row->biz_name?></h4>
                            <p class = "card-sub-name"><?=$row->biz_slogan?></p>
                            <p class = "card-sub2-name BA-dark-orange"><?=$row->biz_main_field?></p>
                            <a href = "<?php echo base_url("DBController/show_business_ctrl_panel/" . $row->biz_ID);?>"><button class = "biz-card-button">VIEW</button></a>
                        </section>
                     </article>
                <?php endforeach; ?>            		
			<?php endif; ?>		
				
            <!--<article class = "biz-display-card">
                <section class = "biz-logo">
                    <img  src="<?php echo base_url(); ?>images/uploads/black_magic.jpg" alt="pic loading failed">
                </section>
                <section class = "biz-info">
                    <h4 class = "card-name BA-green">bizName</h4>
                    <p class = "card-sub-name">bizSlogan</p>
                    <p class = "card-sub2-name BA-dark-orange">bizField</p>
                    <button class = "biz-card-button">VIEW</button>
                </section>
             </article>-->
        </section>
	</section>
	<section class = "modal-BG">
        <section class = "modal-frame-small">
            
        </section>
    </section>
    <div id = "add-business" style = "display: none;">
        <span class = "modal-closebtn">&#10060;</span> 
            <p class = "title-strip h-font-size margin-bottom-std">ADD NEW BUSINESS</p>
            <?php echo form_open("DBController/add_business"); ?>
            <div class = "_80p-width-center-rwd vertical-align">
                <span class = "BA-dark-orange">Business Name:</span>
                <input type = "text" name = "biz-name" placeholder = "enter buisness name" class = "BA-input margin-bottom-std"><br> 
                <span class = "BA-dark-orange">Business Field:</span>
                <input type = "text" name = "biz-field" placeholder = "enter business field" class = "BA-input margin-bottom-std"><br>
                <span class = "BA-dark-orange">Business Slogan:</span>
                <input type = "text" name = "biz-slogan" placeholder = "enter business slogan" class = "BA-input margin-bottom-std"><br>
                <span class = "BA-dark-orange">Buisness main email (Alternative emails can be added later)</span>
                <input type = "text" name = "biz-main-email" placeholder = "enter business email" class = "BA-input margin-bottom-std"><br>
                <span class = "BA-dark-orange">Buisness main mobile (Alternative mobile numbers can be added later)</span>
                <input type = "text" name = "biz-main-mobile" placeholder = "enter mobile number e.g 265 995 926 084" class = "BA-input">
                <div class = "center-bottom-btn">
                    <input id = "client-add-business" type = "submit" value = "Submit" class = "BA-button-large">
                </div><br>
            </div>
            <?php echo form_close(); ?>
    </div>
     <div id = "del-business" style = "display: none;">
        <span class = "modal-closebtn">&#10060;</span> 
            <p class = "title-strip h-font-size margin-bottom-std">DELETE BUSINESS</p>
            <?php echo form_open("DBController/del_business"); ?>
            <div class = "_80p-width-center-rwd vertical-align">
                <span class = "BA-dark-orange">Select business name:</span>
                <select class = "BA-select margin-bottom-std" name = "biz-ID">
                	<option selected disabled>Select business</option>
                    <?php if (isset($no_businesses)): ?>                        
                    <?php else: ?>
                        <?php foreach ($businesses->result() as $row): ?>
                        	<option value = "<?=$row->biz_ID?>"><?=$row->biz_name?></option>
                        <?php endforeach; ?>            		
                    <?php endif; ?>	
                </select>
                <br>                
                <div class = "center-bottom-btn">
                    <input id = "client-add-business" type = "submit" value = "Submit" class = "BA-button-large">
                </div><br>
            </div>
            <?php echo form_close(); ?>
    </div>
		
	
	



		
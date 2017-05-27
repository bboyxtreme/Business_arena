<section class = "main-content-container margin-bottom-std">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                Business Name 
            </p>	
        </header>
    </header>
    <section class = "biz-main-ctrl-panel">
        <section class = "biz-info-ctrl-panel">
        <p class = "BA-dark-orange">Thu May 04 2017</p>
        <p class = "BA-green biz-info-item">Todays views<br><span class = "BA-dark-orange">54</span></p>
        <p class = "BA-green biz-info-item">Total views<br><span class = "BA-dark-orange">154</span></p>
        <p class = "BA-green biz-info-item">Business details<br>
        <span class = "BA-green label">Name: </span><span class = "BA-dark-orange">Business Name</span><br>
        <span class = "BA-green label">Slogain: </span><span class = "BA-dark-orange">Business Slogan </span><br>
        <span class = "BA-green label">Field: </span><span class = "BA-dark-orange">Business Field</span><br>
        <button id = "edit-biz-details-btn" class = "BA-button">Edit</button>
        </p>
      	<section class = "biz-info-item">
        <p class = "BA-green">Business logo</p>
        <div class = "biz-ctrl-panel-image">
        	<div class = "biz-ctrl-panel-image-cont">
            	<img  src="<?php echo base_url(); ?>images/uploads/black_magic.jpg" alt="pic loading failed">
            </div>
            <div class = "biz-ctrl-panel-image-edit">
            	<p class = "no-margin">Change photo</p>
                <input type = "file"><br>
                <input type = "submit" value="Upload" class = "BA-button">
            </div>
        </div>
        </section>
        </section>
        <section class = "controls">
        <p class = "BA-dark-orange center">CONTROLS</p>
        <div class = "main-func-container">
            <button id = "ctrl-panel-prds" class = "biz-func-button-main">PRODUCTS</button>
            <button id = "ctrl-panel-Locs" class = "biz-func-button-main">LOCATIONS</button>
        </div>
        <button id = "ctrl-panel-views" class = "biz-func-button BA-white">VIEWS</button>
        <button id = "ctrl-panel-uq" class = "biz-func-button BA-dark-orange">USAGE QUOTA</button>
        <button id = "ctrl-panel-msgs" class = "biz-func-button BA-white">MESSAGES</button>
        </section>
    </section>
</section>
<section class = "modal-BG">
	<section class = "modal-frame-small">
    <span class = "modal-closebtn">&#10060;</span>
    <p class = "title-strip medium-font-size">EDIT BUSINESS DETAILS</p>
    <div class = "vertical-align">
        <span class = "BA-dark-orange">Business name:</span>   
        <input type = "text" class = "BA-input margin-bottom-std">
        <span class = "BA-dark-orange">Business Slogan:</span>   
        <input type = "text" class = "BA-input margin-bottom-std">
        <span class = "BA-dark-orange">Business Field:</span>   
        <input type = "text" class = "BA-input margin-bottom-std">        
    </div>   
    <div class = "center-bottom-btn">
    	 <input type = "submit" value = "Submit" class = "BA-button">
    </div> 
    </section>
</section>
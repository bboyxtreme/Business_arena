<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo $biz_name . " >> Locations"; ?> 
            </p>	
        </header>
        <header id="search" >
            <input id = "client-loc-search" name = "search" type = "text" placeholder = "&#128269; Search...">		
        </header>
    </header>
    <!--<select id = "function-select-dropdwn" class = "BA-select">
        <option disabled selected>Select function</option>
        <option>Search button</option>
        <option>Filters</option>
        <option>Add products</option>
    </select>-->
    <section class = "filters">
        <button id = "add-new-location" class = "BA-button">&#10010; Add Location</button>
    </section>
    <div class = "list-header">	
        <div class = "list-column"><span class = "BA-dark-orange">Location Name</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">District</span></div>
        <div class = "list-column"><span class = "BA-dark-orange">Directions</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Country</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Controls</span></div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
    <section class = "client-item-list-cont">
    <?php if(isset($no_locations)): ?>
    	<p class = "BA-dark-green"><?=$no_locations?></p>
    <?php else: ?>
		<?php foreach($locations->result() as $row): ?>   
        <div class = "list-row">	
            <div class = "list-column"><span class = "BA-green"><?=$row->loc_area?></span></div>
            <div class = "list-column"><span class = "BA-green"><?=$row->loc_district?></span></div>
            <div class = "list-column"><span class = "BA-green"><?=$row->loc_description?></span></div>
            <div class = "list-column low-p"><span class = "BA-green"><?=$row->loc_country?></span></div>
            <div class = "hidden"><span class = "BA-green"><?=$row->loc_ID?></span></div>
            <div class = "list-column low-p">
                <div class = "ctrl-icons-cont">
                    <img id='' src='<?php echo base_url(); ?>images/edit.jpg' class='ctrl-icons edit-btn loc'>
                    <img id = '<?= base_url("DBController/del_loc/" . $row->loc_ID) ?>' src='<?php echo base_url(); ?>images/delete.jpg' class='ctrl-icons del-btn loc'>
                </div>
            </div>
            <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </section>
</section>

<section class = "modal-BG">
	<section class = "modal-frame-small">
    	
    </section>
</section>

<div id = "add-prds" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span> 
        <p class = "title-strip h-font-size margin-bottom-std">ADD LOCATION</p>
        <?php echo form_open("DBController/add_location"); ?>
        <div class = "_80p-width-center-rwd vertical-align">
        <span class = "BA-dark-orange">Location Name:</span>
        <input type = "text" name = "loc-area" placeholder = "enter location name" class = "BA-input margin-bottom-std margin-top-std"><br> 
        <span class = "BA-dark-orange">Location District:</span>
        <input type = "text" name = "loc-district" placeholder = "enter Location District" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Country:</span>
        <input type = "text" name = "loc-country" placeholder = "enter location country" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Description:</span>
        <input type = "text" name = "loc-description" placeholder = "enter location description" class = "BA-input margin-bottom-std"><br>
        </div>
        <?php echo form_close(); ?>
        <div class = "center-bottom-btn"><input type = "submit" value = "Submit" class = "BA-button-large"></div>
</div>

<div id = "edit-loc" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span>
	<p class = "title-strip h-font-size margin-bottom-std">EDIT LOCATION</p>
    <?php echo form_open("DBController/edit_location"); ?>
    <div class = "_80p-width-center-rwd vertical-align">
        <span class = "BA-dark-orange">Location Name:</span>
        <input id = "edit-loc-area" type = "text" name = "loc-area" placeholder = "enter location name" class = "BA-input margin-bottom-std margin-top-std"><br> 
        <span class = "BA-dark-orange">Location District:</span>
        <input id = "edit-loc-district" type = "text" name = "loc-district" placeholder = "enter Location District" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Country:</span>
        <input id = "edit-loc-country" type = "text" name = "loc-country" placeholder = "enter location country" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Description:</span>
        <input id = "edit-loc-description" type = "text" name = "loc-description" placeholder = "enter location description" class = "BA-input margin-bottom-std"><br>
        <input id = "edit-loc-id" type = "hidden" name = "loc-ID">
        <input type = "submit" value = "Submit" class = "BA-button-large">
    </div>
    <div class = "center-bottom-btn"></div>
    <?php echo form_close(); ?>
</div>


<div id = "del-loc" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span>
	<p class = "title-strip h-font-size no-margin">DELETE LOCATION</p>
        <p class = "BA-dark-orange">ARE YOU SURE YOU WANT TO DELETE THE FOLLWOING LOCATION?</p>       
        <p id = "del-loc-area" class = "BA-dark-orange info-item-emboss">LOCATION NAME: <br><span></span></p>
        <p id = "del-loc-district" class = "BA-green info-item-emboss">LOCATION DISTRICT: <br><span></span></p>
        <p id = "del-loc-country" class = "BA-dark-orange info-item-emboss">LOCATION COUNTRY: <br><span></span></p>
        <p id = "del-loc-description" class = "BA-green info-item-emboss">LOCATION DESCRIPTION: <br><span></span></p>
        <a id = "del-loc-btn" href="#"><button class = "BA-button-large">DELETE</button></a>
        <button class = "BA-button-orange-large margin-left-std">CANCEL</button>
        
</div>

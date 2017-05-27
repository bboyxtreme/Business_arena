<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo "Zest Shop >> Locations"; ?> 
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
        <select class = "BA-select">
            <option disabled selected>Area Filter</option>
        </select>
        <select class = "BA-select">
            <option disabled selected>Product type Filter</option>
        </select>
        <button id = "add-new-location" class = "BA-button">&#10010; Add Location</button>
    </section>
    <section class = "client-item-list-cont">	
    <div class = "list-header">	
        <div class = "list-column"><span class = "BA-dark-orange">Location Name</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">District</span></div>
        <div class = "list-column"><span class = "BA-dark-orange">Country</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Controls</span></div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
    <div class = "list-row">	
        <div class = "list-column"><span class = "BA-green">locName</span></div>
        <div class = "list-column"><span class = "BA-green">district</span></div>
        <div class = "list-column low-p"><span class = "BA-green">country</span></div>
        <div class = "list-column low-p">
        	<div class = "ctrl-icons-cont">
                <img id='' src='<?php echo base_url(); ?>images/edit.jpg' class='ctrl-icons edit-btn'>
                <img id = '' src='<?php echo base_url(); ?>images/delete.jpg' class='ctrl-icons del-btn'>
            </div>
        </div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
     <div class = "list-row">	
        <div class = "list-column"><span class = "BA-green">locName</span></div>
        <div class = "list-column"><span class = "BA-green">district</span></div>
        <div class = "list-column low-p"><span class = "BA-green">country</span></div>
        <div class = "list-column low-p">
        	<div class = "ctrl-icons-cont">
                <img id='' src='<?php echo base_url(); ?>images/edit.jpg' class='ctrl-icons edit-btn'>
                <img id = '' src='<?php echo base_url(); ?>images/delete.jpg' class='ctrl-icons del-btn'>
            </div>
        </div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div> 
    </section>
</section>

<section class = "modal-BG">
	<section class = "modal-frame-small">
    	
    </section>
</section>

<div id = "add-prds" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span> 
        <p class = "title-strip h-font-size margin-bottom-std">ADD LOCATION</p>
        <div class = "_80p-width-center-rwd vertical-align">
        <span class = "BA-dark-orange">Location Name:</span>
        <input type = "text" name = "loc-name" placeholder = "enter location name" class = "BA-input margin-bottom-std margin-top-std"><br> 
        <span class = "BA-dark-orange">Location District:</span>
        <input type = "text" name = "loc-district" placeholder = "enter Location District" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Country:</span>
        <input type = "text" name = "loc-country" placeholder = "enter location country" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Description:</span>
        <input type = "text" name = "loc-description" placeholder = "enter location description" class = "BA-input margin-bottom-std"><br>
        </div>
        <div class = "center-bottom-btn"><input type = "submit" value = "Submit" class = "BA-button-large"></div>
</div>

<div id = "edit-prd" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span>
	<p class = "title-strip h-font-size margin-bottom-std">EDIT LOCATION</p>
    <div class = "_80p-width-center-rwd vertical-align">
        <span class = "BA-dark-orange">Location Name:</span>
        <input type = "text" name = "loc-name" placeholder = "enter location name" class = "BA-input margin-bottom-std margin-top-std"><br> 
        <span class = "BA-dark-orange">Location District:</span>
        <input type = "text" name = "loc-district" placeholder = "enter Location District" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Country:</span>
        <input type = "text" name = "loc-country" placeholder = "enter location country" class = "BA-input margin-bottom-std"><br>
        <span class = "BA-dark-orange">Location Description:</span>
        <input type = "text" name = "loc-description" placeholder = "enter location description" class = "BA-input margin-bottom-std"><br>
    </div>
    <div class = "center-bottom-btn"><input type = "submit" value = "Submit" class = "BA-button-large"></div>
</div>


<div id = "del-prd" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span>
	<p class = "title-strip h-font-size no-margin">DELETE LOCATION</p>
        <p class = "BA-dark-orange">ARE YOU SURE YOU WANT TO DELETE THE FOLLWOING LOCATION?</p>       
           	<p class = "BA-dark-orange info-item-emboss">LOCATION NAME</p>
            <p class = "BA-green info-item-emboss">LOCATION DISTRICT</p>
            <p class = "BA-dark-orange info-item-emboss">LOCATION COUNTRY</p>
            <p class = "BA-green info-item-emboss">LOCATION DESCRIPTION</p>
        <button class = "BA-button-large">DELETE</button>
        <button class = "BA-button-orange-large margin-left-std">CANCEL</button>
        
</div>

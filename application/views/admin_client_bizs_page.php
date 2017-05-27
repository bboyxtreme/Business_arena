<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo "Client >> Businesses"; ?> 
            </p>	
        </header>
    </header>
    <button id = "add-new-business" class = "BA-button margin-top-std">&#10010; Add Business</button>
    <button id = "delete-business" class = "BA-button margin-top-std">&#9866; Delete Business</button>
    <section class = "side-by-side-cont">
        <section class = "mobile-justify margin-top-std info-item-emboss width-250p">
            <section class = "centered">
                <p class = "hh-font-size BA-dark-orange center margin-top-extra">1500</p>
                <p class = "BA-green center margin-bottom-extra medium-font-size">businesses registered</p>
            </section>
        </section>
        <section class = "chart-area border margin-top-std padding-std">
            Chart
        </section>
    </section>
</section>
<section class = "modal-BG">
	<section class = "modal-frame-small">
    	
    </section>
</section>
<div id = "add-business" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span> 
        <p class = "title-strip h-font-size margin-bottom-std">ADD NEW BUSINESS</p>
        <div class = "_80p-width-center-rwd vertical-align">
            <span class = "BA-dark-orange">Business Name:</span>
            <input type = "text" name = "biz-name" placeholder = "enter buisness name" class = "BA-input margin-bottom-std"><br> 
            <span class = "BA-dark-orange">Business Field:</span>
            <input type = "text" name = "biz-field" placeholder = "enter business field" class = "BA-input margin-bottom-std"><br>
            <span class = "BA-dark-orange">Business Slogan:</span>
            <input type = "text" name = "biz-slogan" placeholder = "enter business slogan" class = "BA-input margin-bottom-std"><br>
            <span class = "BA-dark-orange">Buisness email</span>
            <input type = "text" name = "biz-email" placeholder = "enter business email" class = "BA-input margin-bottom-std"><br>
            <span class = "BA-dark-orange">Buisness mobile</span>
            <input type = "text" name = "biz-mobile" placeholder = "enter business number" class = "BA-input">
        <div class = "center-bottom-btn">
        	<input type = "submit" value = "Submit" class = "BA-button-large">
        </div><br>
</div>
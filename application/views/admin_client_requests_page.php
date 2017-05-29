<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo "Client >> Requests"; ?> 
            </p>	
        </header>
    </header>
    <button id = "add-new-client" class = "BA-button margin-top-std">&#10010; Add Client</button>
    <button id = "delete-client" class = "BA-button margin-top-std">&#9866; Delete Client</button>
    <section class = "side-by-side-cont">
        <section class = "mobile-justify margin-top-std info-item-emboss width-250p">
            <section class = "centered">
                <p class = "hh-font-size BA-dark-orange center margin-top-extra">104</p>
                <p class = "BA-green center margin-bottom-extra medium-font-size">client requests</p>
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
<div id = "add-client" style = "display: none;">
	<span class = "modal-closebtn">&#10060;</span> 
        <p class = "title-strip h-font-size margin-bottom-std">ADD NEW CLIENT</p>
        <div id = "admin-add-client-container" class = "_80p-width-center-rwd vertical-align">
            <span class = "BA-dark-orange">First Name:</span>
            <input type = "text" name = "first-name" placeholder = "Enter first name" class = "BA-input margin-bottom-std"><br> 
            <span class = "BA-dark-orange">Sur Name:</span>
            <input type = "text" name = "sur-name" placeholder = "Enter sur name" class = "BA-input margin-bottom-std"><br>
            <span class = "BA-dark-orange">Date of birth:</span>
            <input type = "text" name = "dob" placeholder = "Enter date of birth" class = "BA-input margin-bottom-std"><br>
            <span class = "BA-dark-orange">Phone number:</span>
            <input type = "text" name = "phone-number" placeholder = "Enter phone number" class = "BA-input margin-bottom-std"><br>
            <span class = "BA-dark-orange">Email:</span>
            <input type = "text" name = "email" placeholder = "Enter email" class = "BA-input margin-bottom-std"><br>
            <span class = "BA-dark-orange">Password:</span>
            <input type = "password" name = "password" placeholder = "Enter password" class = "BA-input margin-bottom-std">
            <span class = "BA-dark-orange">User type</span>
            <select name = "user-type" class = "BA-select">
                <option>Admin</option>
            	<option>Buisness Owner</option>
                <option>Customer</option>
            </select>
        </div>
        <div class = "center-bottom-btn">
        	<input id = "admin-add-client-btn" type = "submit" value = "Submit" class = "BA-button-large">
        </div><br>
        
</div>
<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo "Zest Shop >> Views"; ?> 
            </p>	
        </header>
    </header>
    <p class = "side-by-side-item info-item-emboss margin-top-std BA-dark-orange" style = "text-align: left;"><?php echo date("F j, Y"); ?></p>
    <div class = "center-content">
    	<p class = "info-item-emboss margin-top-std BA-dark-orange inline">BUISNESS VIEWS</p>
    </div>
    <section class = "side-by-side-cont">
        <p class = "side-by-side-item info-item-emboss margin-top-std BA-green">Todays's views: <span class = "BA-dark-orange"><?php echo $views['today_views']; ?></span></p>
        <p class = "side-by-side-item info-item-emboss margin-top-std BA-green">Total views: <span class = "BA-dark-orange"><?php echo $views['total_views']; ?></span></p>
    </section>
    <div class = "center-content">
    	<p class = "info-item-emboss margin-top-std BA-dark-orange inline">PRODUCT CATEGORY VIEWS</p>
    </div>
    <section class = "chart-area margin-top-std">
    <div class = "chart BA-dark-orange-bg">
        <div class = "border-white-right padding-std" style = "display: inline-block;">
            <p class = "BA-white">Category Name</p>
            <?php foreach($business_categories->result() as $row): ?>
            <p class = "BA-green"><?=$row->cat_name?></p>
            <?php endforeach; ?>
        </div>    
        <div class = "border-white-right padding-std" style = "display: inline-block;">
            <p class = "BA-white">VIEWS</p>
            <?php foreach($cat_views as $row): ?>
            <p class = "BA-yellow center"><?=$row?></p>
            <?php endforeach; ?>
        </div>
    </div>
    </section>
    <section class = "side-by-side-cont">
        <select id = "client-views-selector" class = "side-by-side-item BA-select BA-dark-orange" style = "text-align: left;">
        	<option disabled selected>Chart category selector</option>
            <?php foreach($business_categories->result() as $row): ?>
            	<option><?=$row->cat_name?></option>
            <?php endforeach; ?>
        </select>
    </section>
</section>
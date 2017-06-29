<header class = "info" style = "background-color: rgba(255,255,255,0.8)">
	<header id="heading">
		<h3 class = "BA-green no-margin">
			Search Results for "<?php echo $search_phrase; ?>"
		</h3>	
	</header>
</header>
<ul class = "tab-menu">
	<?php if (isset($search_results['prd_results'])): ?>
		<li class = "active" id = "search-prd-tab">Products</li>
    <?php endif; ?>
    <?php if (isset($search_results['biz_results'])): ?>
    	<?php if (!isset($search_results['prd_results'])): ?>
        	<li class = "active"  id = "search-biz-tab">Businesses</li>
        <?php else: ?>
        	<li id = "search-biz-tab">Businesses</li>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($search_results['loc_results'])): ?>
    	<?php if (!isset($search_results['prd_results']) && isset($search_results['biz_results'])): ?>
        	<li class = "active"  id = "search-loc-tab">Locations</li>
        <?php else: ?>
        	<li id = "search-loc-tab">Locations</li>
        <?php endif; ?>
    <?php endif; ?>	
</ul>
<section class = "tab-menu-content">
	<div id = "prd-results">
	<?php if (isset($search_results['prd_results'])): ?>
		<table class = "results-frame">
            <tr>
                <th>Product</th><th>Business</th><th>Location</th>
            </tr>
        <?php foreach($search_results['prd_results'] as $prd): ?>
            <tr class = "margin">
            
            </tr>
            <tr class = "result">
                <td><a href="<?=base_url("DBController/show_product/" . $prd['prd_biz_ID'] . "/" . $prd['prd_ID'] . "/" . $prd['prd_loc_ID']) ?>" class = "BA-green"><?=$prd['prd_name']?></a></td>
                <td><a href="<?=base_url("DBController/show_business/" . $prd['prd_biz_ID'] . "/" . $prd['prd_loc_ID']) ?>" class = "BA-green"><?=$prd['prd_biz_name']?></a></td>
                <td><a href="" class = "BA-green"><?=$prd['prd_location']?></a></td>
            </tr>
        <?php endforeach; ?>          
        </table>
    <?php elseif (isset($search_results['biz_results'])): ?>
    	<table class = "results-frame">
            <tr>
                <th>Business</th><th>Field</th><th>Location</th>
            </tr>
        <?php foreach($search_results['biz_results'] as $biz): ?>
            <tr class = "margin">
            
            </tr>
            <tr class = "result">
                <td><a href="<?=base_url("DBController/show_business/" . $biz['biz_ID'] . "/" . $biz['biz_loc_ID']) ?>" class = "BA-green"><?=$biz['biz_name']?></a></td>
                <td><a href="" class = "BA-green"><?=$biz['biz_field']?></a></td>
                <td><a href="" class = "BA-green"><?=$biz['biz_location']?></a></td>
            </tr>
        <?php endforeach; ?>           
        </table>
    <?php endif; ?>
    </div>
    <div class = "hidden" id = "business-results">
        <?php if (isset($search_results['biz_results'])): ?>
            <table class = "results-frame">
                <tr>
                    <th>Business</th><th>Field</th><th>Location</th>
                </tr>
            <?php foreach($search_results['biz_results'] as $biz): ?>
                <tr class = "margin">
                
                </tr>
                <tr class = "result">
                    <td><a href="" class = "BA-green"><?=$biz['biz_name']?></a></td>
                    <td><a href="" class = "BA-green"><?=$biz['biz_field']?></a></td>
                    <td><a href="" class = "BA-green"><?=$biz['biz_location']?></a></td>
                </tr>
            <?php endforeach; ?>           
            </table>
        <?php endif; ?>
    </div>	
</section>



<div id = "loc-resutlts">

</div>

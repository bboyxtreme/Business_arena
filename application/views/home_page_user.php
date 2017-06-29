	<section class = "main-content-container-h margin-bottom-std">
		<p class = "center medium-font-size-rwd BA-green">
			Search for products by product names, Business names, even locations. 
        </p>
		<section class = 'uSearch'>
			<?php echo form_open('search',array('method'=>'post','name'=>'Search-Bar'));?>
			<input type = "text" name = "search-phrase" class = "uSearch"  placeholder = "&#128269; Search..." required>
			<input type = "submit" value = "Search" class = "uSearchB">
			<?php echo form_close(); ?>
		</section>	
		<p id = "cat-prompter" class = "center">
			Don't forget to try out the catalog!!<br>
			<button id = "user-view-catalogue" class="catbtn-mobile-orange">View Catalog</button>
		</p>
	</section>
	<section class = "main-content-container-h margin-bottom-std">
		<p class = "BA-green center h-font-size">Trending Businesses</p>
		<table class = "promotions">
        	<?php foreach($trending_biz->result() as $row): ?>
			<tr>
				<td class='trend-item'>
                	<a href = '<?=base_url($row->biz_ID) ?>'>
						<?=$row->biz_name?>
                		<span style='color: rgb(154,71,14); float: right;'>(<?=$row->num_views?>)</span>
                    </a>
                </td>				
			</tr>
         	<?php endforeach; ?>
		</table>
        <a href = "<?php echo base_url("DBController/load_promotions/trendz_biz"); ?>" class = "see-more BA-orange">see more...</a>
	</section>
    <section class = "main-content-container-h margin-bottom-std">
		<p class = "BA-green center h-font-size">Trending Products</p>
		<table class = "promotions">
        	<?php foreach($trending_prds->result() as $prd): ?>
			<tr>
				<td class='trend-item'>
                	<a href = '<?=base_url("DBController/show_product/" . $prd->biz_ID . "/" . $prd->prd_ID . "/" . $prd->loc_ID) ?>'><?=$prd->prd_name?>
                		<span style='color: rgb(154,71,14); float: right;'>(<?=$prd->num_views?>)</span>
                    </a>
                </td>				
			</tr>
           <?php endforeach; ?>
		</table>
        <a href = "<?php echo base_url("DBController/load_promotions/trendz_prds"); ?>" class = "see-more BA-orange">see more...</a>
	</section>
	<section class = "main-content-container-h margin-bottom-std">
		<p class = "BA-green center h-font-size">New Businesses</p>
		<table class = "promotions">
            <?php foreach($new_biz as $biz): ?>
			<tr>
				<td class='trend-item'>
                	<a href = '<?=base_url($biz["biz_ID"]) ?>'>
						<?=$biz["biz_name"]?>
                		<span style='color: rgb(154,71,14); float: right;'><?=$biz["biz_slogan"]?></span>
                    </a>
                </td>				
			</tr>
           <?php endforeach; ?>
		</table>
        <a href = "<?php echo base_url("DBController/load_promotions/new_biz"); ?>" class = "see-more BA-orange">see more...</a>
	</article>
	</section>	
	
	



		
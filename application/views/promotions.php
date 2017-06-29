<section class = "main-content-container">
<header class = "info">
	<header id="heading">
		<h3 class = "BA-green no-margin">
			<?php echo $trend_title; ?>
		</h3>	
	</header>
</header>
<table class = "promotions2">
	<?php if ($trend_title == "Trending Businesses"): ?>
		<?php foreach($trends->result() as $row): ?>    
        <tr>
            <td class='trend-item'>
                <a href = '<?=base_url($row->biz_ID) ?>'>
                    <?=$row->biz_name?>
                    <span style='color: rgb(154,71,14); float: right;'>(<?=$row->num_views?>)</span>
                </a>
            </td>				
        </tr>    
       <?php endforeach; ?>
   <?php elseif ($trend_title == "Trending Products"): ?>
		<?php foreach($trends->result() as $prd): ?>    
        <tr>
            <td class='trend-item'>
                <a href = '<?=base_url("DBController/show_product/" . $prd->biz_ID . "/" . $prd->prd_ID . "/" . $prd->loc_ID) ?>'><?=$prd->prd_name?>
                    <span style='color: rgb(154,71,14); float: right;'>(<?=$prd->num_views?>)</span>
                </a>
            </td>				
        </tr>    
       <?php endforeach; ?>
   <?php elseif ($trend_title == "New Businesses"): ?>
		<?php foreach($trends as $biz): ?>    
        <tr>
            <td class='trend-item'>
                <a href = '<?=base_url($biz["biz_ID"]) ?>'>
                    <?=$biz["biz_name"]?>
                    <span style='color: rgb(154,71,14); float: right;'><?=$biz["biz_slogan"]?></span>
                </a>
            </td>				
        </tr>   
       <?php endforeach; ?>
   <?php endif; ?>
</table>
</section>
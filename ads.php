<div class="row row-cols-1 justify-content-sm-center mt-5">

<?php
$array = array("//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=luanrabelo-20&language=pt_BR&marketplace=amazon&region=BR&placement=B084DWCZY6&asins=B084DWCZY6&linkId=1b0166eed2198ce079e8c009a0a542af&show_border=true&link_opens_in_new_window=true", "//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=luanrabelo-20&language=pt_BR&marketplace=amazon&region=BR&placement=B084J4WP6J&asins=B084J4WP6J&linkId=9370f9ac737750c2f654dfc796fb135c&show_border=true&link_opens_in_new_window=true", "//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=luanrabelo-20&language=pt_BR&marketplace=amazon&region=BR&placement=B07NQBGRKY&asins=B07NQBGRKY&linkId=26b37eb7bb1764dfc781e102510eecd0&show_border=true&link_opens_in_new_window=true", "//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=luanrabelo-20&language=pt_BR&marketplace=amazon&region=BR&placement=B07KD8HB2G&asins=B07KD8HB2G&linkId=a1643a6e4eec8b64e5bba77c49cbe98a&show_border=true&link_opens_in_new_window=true", "//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=luanrabelo-20&language=pt_BR&marketplace=amazon&region=BR&placement=B07SG8F1QF&asins=B07SG8F1QF&linkId=5bfe3eea48e648d387ae8b615ee7d84e&show_border=true&link_opens_in_new_window=true", "//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=luanrabelo-20&language=pt_BR&marketplace=amazon&region=BR&placement=B084P4Q85Q&asins=B084P4Q85Q&linkId=6223a3625ca879c8c544efb74dd9c499&show_border=true&link_opens_in_new_window=true");	
foreach ($array as $value) {
?>
	
<div class="col-sm-2">
<div class="card mb-2">
<div class="card-body">
<iframe style="width:145px; height:250px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="<?php echo($value);?>"></iframe>
</div>
</div>
</div>
<?php	
} 	
?>	
</div>
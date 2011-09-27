</div>
<div id="footer">
<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>	
	<?php include (TEMPLATEPATH . '/bottombar.php'); ?>
	<div id="footerbottom">
        <div id="socialize">
        	<?php if ($eg_twitter_disable == "No") { ?>
        	<a href="<?php echo $eg_twitter_url;?>"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="Follow us on Twitter" /></a>
            <?php } ?> 
            <?php if ($eg_rss_disable == "No") { ?>
            <a href="<?php echo $eg_rss_url;?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" alt="Rss Feed" /></a>
            <?php } ?> 
            <?php if ($eg_facebook_disable == "No") { ?>
            <a href="<?php echo $eg_facebook_url;?>"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Our Facebook Page" /></a>
            <?php } ?> 
        </div>	
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

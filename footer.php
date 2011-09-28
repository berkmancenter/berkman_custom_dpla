</div>
<div id="footer">
<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>	
	<?php include (TEMPLATEPATH . '/bottombar.php'); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/slider.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/pagenavi.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/mainmenu.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>

<style type="text/css" media="screen"> </style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/superfish.js"></script>

<script type="text/javascript">
	jQuery(function(){
		jQuery('ul.superfish').superfish();
	});
</script>

<?php if (is_front_page()) : ?>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/easing-1.2.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/slider.js"></script>
<script type="text/javascript">    
        function formatText(index, panel) {
		  return index + "";
	    }
    
        jQuery(function () {
        
            jQuery('.anythingSlider').anythingSlider({
                	easing: "<?php echo $eg_slide_effect;?>",        
                	autoPlay: true, 
                	delay: <?php echo $eg_slide_delay;?>,
                	startStopped: false,   
                	animationTime: <?php echo $eg_slide_speed;?>,    
                	hashTags: false,        
                	buildNavigation: true,       
        		pauseOnHover: false,  
     			startText: "Go",             
		      stopText: "Stop",           
		      navigationFormatter: formatText     
            }); 
            jQuery("#slide-jump").click(function(){
                jQuery('.anythingSlider').anythingSlider(6);
            });
            
        });
</script>
<?php endif; ?>

</head>
<body>
<div id="header">
    <div id="top">	
		<div id="logo"> 
        <?php if ($eg_logo_disable == "No") { ?>
		<a href="<?php echo get_option('home'); ?>/"> <img src="<?php echo $eg_logo_image;?>" alt="logo" /> </a> 
		<?php	} else { ?>
		<a href="<?php echo get_option('home'); ?>/" class="site-title"><?php bloginfo('name'); ?></a>	
		<?php } ?>
        </div>
        			
		<div id="mainmenu"> 
			<?php if ( has_nav_menu( 'main-menu' ) ) { ?>			 
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'mainnav superfish' ) ); ?>			  
			<?php } ?>
		</div>
	</div>
</div>
<div id="container">        

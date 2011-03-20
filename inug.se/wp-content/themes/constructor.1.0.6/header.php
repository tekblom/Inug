<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <!--MODIFIED: LA TILL CUSTOMIZAD TITTLE, KEYWORDS OCH DESCRIPTION   -->
	<title><?php 
		if($data =get_post_meta($post->ID, '	', true)){
			echo $data;
		}	
		else
		{
			wp_title('&raquo;', true, 'right'); 
			bloginfo('name'); 
		}	
	?>
	</title>
	<META name="description" content="<?php 

		if($data =get_post_meta($post->ID, 'page_description', true)){
			echo $data;
		}	
		else
		{
			wp_title('&raquo;', true, 'right'); 
			bloginfo('name'); 
		}
	?>">
	<META name="keywords" content="<?php 
		if($data =get_post_meta($post->ID, 'page_keywords', true)){
			echo $data;
		}	
		else
		{
			wp_title('&raquo;', true, 'right'); 
			bloginfo('name'); 
		}
	?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>"/>
    <link rel="stylesheet" type="text/css" media="print" href="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/print.css" />

	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/style-480.css" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />    
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<!--MODIFIED ADDED JQUERY-->
	<script type="text/javascript" src="jquery-1.4.4.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.5.js"></script>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php wp_head(); 
	
	//MODIFIED ADDED DIFFERENT STYLING ON LOCAL
	$a = get_bloginfo('name');
	if($a!='inug.se'){?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/themes/inug_bla/style_local.css" />
	<?php }?>
</head>
<body <?php body_class(); ?>>
	
<div id="body">
   <div id="wrapheader" class="wrapper">
		
       <div id="header" 			
	   	<?php 
		//MODIFIED: ADDED FUNCTIONALITY HEADER
				if(qtrans_getLanguage()=="es"){
					echo ' class="header_spanska"';
				}
		?>
		>
		<!--<div style="margin:3px; padding: 4px 15px; font-size: 14px; font-weight: bold; color: white;"><?php echo  str_replace("http://localhost/", "", get_bloginfo( siteurl));?></div>-->

	   <!--MODIFIED TODO: LA TILL facebook_horn, stad -DIVAR   -->
	    <div id="facebook_horn">
			<?php $blog_title = get_bloginfo('url'); ?>
			<a id="facebook_horn_item" href="http://www.facebook.com/group.php?gid=181126102733" target="_blank"></a>
			<a id="email_horn_item" alt="info@inug.se" href="mailto:<?php echo get_bloginfo('admin_email'); ?>"></a>						 
		</div>
		<div id="stad">	
		<!--TODO: förbättra url:erna-->
			<a id="sverige<?php if($blog_title=="http://localhost/inug.se")  {echo '_hov';}?>" href="http://gyllenebrunnen.se/inug.se/"></a>
			<a id="linkoping<?php if($blog_title=="http://gyllenebrunnen.se/inug.se/linkoping")  {echo '_hov';}?>" href="http://gyllenebrunnen.se/inug.se/linkoping"></a>
		</div>
            <?php get_constructor_menu();?>
			

			
            <div id="title">
				<?php if (is_home() || is_front_page()) { ?>
					<h1 id="name"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); echo " &raquo; "; bloginfo('description');?>"><?php bloginfo('name'); ?></a></h1>
				<?php } else { ?>	
					<div id="name"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); echo " &raquo; "; bloginfo('description');?>"><?php bloginfo('name'); ?></a></div>
				<?php } ?>
                <div id="description"><?php bloginfo('description');?></div>
            </div>
		<div id="sprak">				
		</div>
       </div>
		
   </div>
   
   <div id="wrapcontent" class="wrapper">
	<?php if (is_home() || is_front_page()) { ?>
       <?php get_constructor_slideshow() ?>
	<?php } ?>
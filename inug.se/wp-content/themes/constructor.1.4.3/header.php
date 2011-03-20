<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
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
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>"/>
    <link rel="stylesheet" type="text/css" media="print" href="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/print.css" />
	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/style-480.css" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
<div id="body">
   <div id="wrapheader" class="wrapper">
       <div id="header">
			<!--MODIFIED TODO: LA TILL facebook_horn, stad -DIVAR   -->
			<div id="facebook_horn">
				<?php $blog_title = get_bloginfo('url'); ?>
				<a id="facebook_horn_item" href="http://www.facebook.com/group.php?gid=181126102733" target="_blank"></a>
				<a id="email_horn_item" alt="info@inug.se" href="mailto:<?php echo get_bloginfo('admin_email'); ?>"></a>						 
			</div>
			<div id="stad">	
			<!--TODO: förbättra url:erna-->
				<a id="sverige<?php if($blog_title=="http://feb50253b8.alt-domain.com")  {echo '_hov';}?>" href="http://feb50253b8.alt-domain.com"></a>
				<a id="linkoping<?php if($blog_title=="http://feb50253b8.alt-domain.com/linkoping")  {echo '_hov';}?>" href="http://feb50253b8.alt-domain.com/linkoping"></a>
				<a id="stockholm<?php if($blog_title=="http://feb50253b8.alt-domain.com/stockholm")  {echo '_hov';}?>" href="http://feb50253b8.alt-domain.com/stockholm"></a>
				<a id="goteborg<?php if($blog_title=="http://feb50253b8.alt-domain.com/goteborg")  {echo '_hov';}?>" href="http://feb50253b8.alt-domain.com/goteborg"></a>
			</div>
            <?php get_constructor_menu() ?>
            <div id="title">
				<?php if (is_home() || is_front_page()) { ?>
					<h1 id="name"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); echo " &raquo; "; bloginfo('description');?>"><?php bloginfo('name'); ?></a></h1>
				<?php } else { ?>	
					<div id="name"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); echo " &raquo; "; bloginfo('description');?>"><?php bloginfo('name'); ?></a></div>
				<?php } ?>
                <div id="description"><?php bloginfo('description');?></div>
            </div>
       </div>
   </div>
   
   <div id="wrapcontent" class="wrapper">
   <!--MODIFIED ONLY SLIDESHOW ON FIRST PAGE:   -->
       <?php if (is_home() || is_front_page()) { ?>
       <?php get_constructor_slideshow() ?>
	<?php } ?>
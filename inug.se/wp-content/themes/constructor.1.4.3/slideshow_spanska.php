<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
header('HTTP/1.0 200 OK');
header('Content-Type: text/xml', true);
flush();

// load config
if (!$constructor = get_option('constructor')) {
    $constructor = include dirname(__FILE__) . '/themes/default/config.php';
}

$showposts = isset($constructor['slideshow']['showposts'])?$constructor['slideshow']['showposts']:10;
$width = isset($_GET['w'])?(int)$_GET['w']:320;
$height = isset($_GET['h'])?(int)$_GET['h']:240;

$WP_Query = new WP_Query();
//MODIFIED: ADDED FUNCTIONALITY SLIDESHOW FOR TWO LANGUAGES
$WP_Query->query('showposts='.$showposts.'&meta_key=_thumbnail_id&category_name=slideshow_spanska');

echo '<'.'?xml version="1.0" encoding="UTF-8" ?>';
echo '<posts>';
if ($WP_Query->have_posts()) {
while($WP_Query->have_posts()) :
	$WP_Query->the_post();

	$post_thumbnail_id = get_post_thumbnail_id();
	$image = wp_get_attachment_image_src($post_thumbnail_id, array($width, $height));
	
	// hm... not sure it's possible?
	if (empty($image) or !isset($image[0])) continue;
	
	$image = $image[0];
//	$image = get_the_post_thumbnail(null,array($width, $height));
	
//    $content = apply_filters('the_content', get_the_excerpt(''), true);
//    $content = preg_replace('/(\<script.*\>.*\<\/script\>)/si', '', $content);
//    $content = strip_tags($content, '<br><a><hr>');

    $content = str_replace('[...]', '', get_the_excerpt());
    $content .= '<span class="more">'.
                '<a href="'.get_permalink().'" title="'.get_the_title().'">'.
                __('Read more &raquo;', 'constructor').
                '</a>'.
                '</span>';
?> 
<post>
	<title><?php the_title() ?></title>
	<permalink><?php 
	//MODIFIED: ADDED FUNCTIONALITY FOR RIGHT LINK ON TITLE
	if($data = get_post_meta(get_the_ID(), 'URL', true)) {
	    echo $data ;
		} 
		else
		{
			echo "#";
		}
	?></permalink>
	<image><?php echo $image ?></image>
	<content><![CDATA[<?php echo $content ?>]]></content>
</post>
<?php 
endwhile;
} else {
    echo  "<!-- Nothing found -->";
}
echo '</posts>';
?>
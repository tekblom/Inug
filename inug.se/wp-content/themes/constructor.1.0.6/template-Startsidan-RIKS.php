<?php
/*
Template Name: Startsidan RIKS
*/
/**
 * @package WordPress
 * @subpackage Constructor
 */

/*
Plugin Name: WordPress MU Recent Posts
Plugin URI: http://atypicalhomeschool.net/wordpress-plugins/
Description: Retrieves a list of the most recent posts in a WordPress MU installation. Based on (Andrea - fill this in)
Author: Ron Rennick
Author URI: http://atypicalhomeschool.net/
*/

/*
Version: 0.31
Update Author: Sven Laqua
Update Author URI: http://www.sl-works.de/
*/

/*
Version: 0.32
Update Author: MagicHour
Update Author URI: http://wiki.thisblueroom.net/wiki/Wordpress_MU_sitewide_recent_posts_plugin
*/

/*
Parameter explanations
$how_many: how many recent posts are being displayed
$how_long: time frame to choose recent posts from (in days)
$titleOnly: true (only title of post is displayed) OR false (title of post and name of blog are displayed)
$begin_wrap: customise the start html code to adapt to different themes
$end_wrap: customise the end html code to adapt to different themes

Sample call:  >> 5 most recent entries over the past 30 days, displaying titles only
*/
function ah_recent_posts_mu($how_many, $how_long, $titleOnly, $begin_wrap, $end_wrap) {
	global $wpdb;
	$counter = 0;
	
	// get a list of blogs in order of most recent update. show only public and nonarchived/spam/mature/deleted
	$blogs = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs WHERE
		public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' AND
		last_updated >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
		ORDER BY last_updated DESC");
		
	if ($blogs) {
		foreach ($blogs as $blog) {
			if($blog == 1)
			{
				$blogOptionsTable = "wp_options";
		    	$blogPostsTable = "wp_posts";
			}
			else
			{
				$blogOptionsTable = "wp_".$blog."_options";
		    	$blogPostsTable = "wp_".$blog."_posts";
			}
			echo $blogPostsTable;
			// we need _posts and _options tables for this to work
			
			$options = $wpdb->get_results("SELECT option_value FROM
				$blogOptionsTable WHERE option_name IN ('siteurl','blogname') 
				ORDER BY option_name DESC");
		        // we fetch the title and ID for the latest post
			$sql = "SELECT ID, post_title 
				FROM $blogPostsTable WHERE post_status = 'publish' 
				AND post_type = 'post' AND post_date >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
				ORDER BY id DESC LIMIT 0,4";
			$thispost = $wpdb->get_results($sql);
			// if it is found put it to the output
			echo $sql;
			foreach ($thispost as $post) {
				echo $post->ID;
				// get permalink by ID.  check wp-includes/wpmu-functions.php
				$thispermalink = get_blog_permalink($blog, $post->ID);
				if ($titleOnly == false) {
					echo $begin_wrap.'<a href="'.$thispermalink
					.'">'.$post->post_title.'</a> <br/> by <a href="'
					.$options[0]->option_value.'">'
					.$options[1]->option_value.'</a>'.$end_wrap;
					echo $post->post_content;
					$counter++;
					} else {
						echo $begin_wrap.'<a href="'.$thispermalink
						.'">'.$post->post_title.'</a>'.$end_wrap;
						echo $post->post_content;
						$counter++;
					}
			}
			// don't go over the limit
			if($counter >= $how_many) { 
				break; 
			}
		}
	}
};

get_header();
?>
<div id="content" class="box shadow opacity">
    <div id="container" >
    
    <?php if (have_posts()) : $i = 0; ?>
        <div id="posts">
        <?php while (have_posts()) : the_post(); $i++; ?>
            <div <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <div class="title opacity box">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="entry">
                	<?php the_content(__('Read the rest of this entry &raquo;', 'constructor')); ?>
                </div>
				 <!-- LOOP BLOGG... -->
				 
					<?php 
						ah_recent_posts_mu(5, 30, true, '<li>', '</li>');				 
					?>
					
				<!-- END LOOP BLOGG... -->
                <div class="footer">
                    <div class="links">
                    <?php the_date() ?> |
                    <?php get_constructor_author('', ' |') ?>
                    <?php the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); ?>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    <?php comments_popup_link(__('No Comments &#187;', 'constructor'), __('1 Comment &#187;', 'constructor'), __('% Comments &#187;', 'constructor'), 'comments-link', __('Comments Closed', 'constructor') ); ?>
                    </div>
                </div>
            </div>
            <?php get_constructor_content_widget($i) ?>
        <?php endwhile; ?>
        </div>
        <?php get_constructor_navigation(); ?>
    <?php endif; ?>
    </div>
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
<?php get_footer(); ?>
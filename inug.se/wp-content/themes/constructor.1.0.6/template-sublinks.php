<?php
/*
Template Name: With subpageMenu
*/

__('Default', 'constructor'); // requeried for correct translation



get_header(); 
	global $post;
    $args=array(
      'post_type' => 'page',
      'post_parent' => $post->ID,
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1
      );
    $my_query = null;
    $my_query = new WP_Query($args);  
?>
<div id="content" class="box shadow opacity">
	<div id="container" >		
		<?php get_constructor_slideshow(true) ?> 

		<?php if (have_posts()) : ?>
				<div id="posts">
				<?php while (have_posts()) : the_post(); global $post; ?>
					<div <?php post_class(); ?> id="post-<?php the_ID() ?>">
						<div class="title opacity box">
								<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo $post->post_title?> </a></h1>
						</div>
								<?php

						$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
						if ($children) { ?>
						<div class="submenu"> 
							<ul id="menu" >
								<li class="page_item page-item-116 current_page_item">
								<a title="Start" href="<?php the_permalink() ?>">Start</a>
							</li>
							<?php echo $children; ?>
						  </ul>
						</div>
					  <?php } ?>
						<div <?php post_class(); ?> id="post-<?php $post->ID ?>">
							<div class="entry">
								<?php the_content(__('Read the rest of this entry &raquo;', 'constructor')) ?>
								<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'constructor').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							</div>
											<div class="footer">
							<div class="links">
								<?php if ($post->post_parent) : $parent_link = get_permalink($post->post_parent); ?>
								<a href="<?php echo $parent_link; ?>"><?php _e('Back to Parent Page', 'constructor');?></a> |
								<?php endif; ?>
								<?php the_time() ?> |
								<?php the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); ?>
								<?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
								<?php comments_popup_link(__('No Comments &#187;', 'constructor'), __('1 Comment &#187;', 'constructor'), __('% Comments &#187;', 'constructor'), 'comments-link', __('Comments Closed', 'constructor') ); ?>                    </div>
							</div>  
						</div>		

					</div>
				<?php endwhile; ?>
				</div>
        <?php comments_template(); ?>
		<?php endif; ?>
	</div><!-- id='container' -->
		<?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
<?php get_footer(); ?>
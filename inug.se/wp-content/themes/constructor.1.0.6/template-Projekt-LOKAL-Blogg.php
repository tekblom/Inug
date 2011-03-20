<?php
/*
Template Name: Projekt Lokal Blogg
*/
/**
 * @package WordPress
 * @subpackage Constructor
 */


get_header();

 ?>
<div id="content" class="box shadow opacity">
    <div id="container" >
	<?php

			  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
			  if ($children) { ?>
			<div class="submenu"> 
			  <ul>
				<li class="page_item page-item-116">
					<a title="Start" href="<?php echo get_permalink($post->post_parent) ?>"><?php echo get_the_title($post->post_parent) ?></a>
				</li>
				<?php echo $children; ?>
			  </ul>
			</div>
		  <?php } ?>
		  	<div style="clear:both"></div>
    
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
				 <?php $temp_query = clone $wp_query; ?>

				 <?php
					$cat = get_post_meta($post->ID, "Category_id", $single = true);
				 ?>
				 <?php query_posts('cat='.$cat.'&posts_per_page=10'); ?>
				 
				 <?php while (have_posts()) : the_post(); ?>
					<div <?php post_class(); ?> id="post-<?php the_ID() ?>">
								<div class="title opacity box">
									<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
								</div>
								<div class="entry">
									<?php the_content(__('Read the rest of this entry &raquo;', 'constructor')); ?>
								</div>
												<div class="footer">
									<div class="links">
									<?php the_date() ?> |
									<?php get_constructor_author('', ' |') ?>
									<?php the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); ?>
									<?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
									<?php comments_popup_link(__('No Comments &#187;', 'constructor'), __('1 Comment &#187;', 'constructor'), __('% Comments &#187;', 'constructor'), 'comments-link', __('Comments Closed', 'constructor') ); ?>
									</div>
								</div>
				 <?php endwhile; ?>				
				 <?php $wp_query = clone $temp_query; ?>
				 
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
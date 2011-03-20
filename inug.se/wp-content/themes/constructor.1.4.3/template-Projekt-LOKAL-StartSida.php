<?php
/*
Template Name: Projekt Lokal StartSida
*/
/**
 * @package WordPress
 * @subpackage Constructor
 */

wp_enqueue_script( 'comment-reply' );

get_header(); ?>
<div id="content" class="box shadow opacity" >
    <div id="container" >
					<?php $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				if ($children) { ?>
				<div class="submenu"> 
					<ul>
						<li class="page_item page-item-116 current_page_item">
							<a title="Start" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</li>
					<?php echo $children; ?>
				  </ul>
				</div>
				<?php } ?>
		<div style="clear:both"></div>
        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID() ?>">
				<div class="title opacity box">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
                </div>
                <div class="entry">
   
                    <?php the_content(__('Read the rest of this entry &raquo;', 'constructor')) ?>
                    <?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'constructor').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>
								<table id="projekt" style="">
				<tr>
					<th>Projektnamn</th>
					<th>Land</th>
					<th>Region</th>
					<th>Budget</th>
					<th>Startade år</th>
				</tr>
				<tr>
					<td><?php echo get_post_meta(get_the_ID(), "Projektnamn", true)?></td>
					<td><?php echo get_post_meta(get_the_ID(), "Land", true)?></td>
					<td><?php echo get_post_meta(get_the_ID(), "Region", true)?></td>
					<td><?php echo get_post_meta(get_the_ID(), "Land", true)?></td>
					<td><?php echo get_post_meta(get_the_ID(), "Start_pa_samarbete", true)?></td>
				</tr>
				</table>
                <div class="footer">
                    <div class="links">
                    <?php if($post->post_parent) : $parent_link = get_permalink($post->post_parent); ?>
                    <a href="<?php echo $parent_link; ?>"><?php _e('Back to Parent Page', 'constructor');?></a> |
                    <?php endif; ?>
                    <?php the_date() ?> |
                    <?php the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); ?>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    <?php comments_popup_link(__('No Comments &#187;', 'constructor'), __('1 Comment &#187;', 'constructor'), __('% Comments &#187;', 'constructor'), 'comments-link', __('Comments Closed', 'constructor') ); ?>                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div><!-- id='container' -->
	    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
<?php get_footer(); ?>

                    
<?php
/*
Template Name: List subpages
*/

__('Default', 'constructor'); // requeried for correct translation



get_header(); 
	global $post;
    $args=array(
      'post_type' => 'page',
      'meta_value' => 'template-monocolumn.php',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1,
	  
	  'orderby' => 'menu_order',
	  'order' => 'ASC'
      );
    $my_query = null;
    $my_query = new WP_Query($args);  
	
				global $wpdb;
				global $post;
				$postArray = array();
				$blog_list = get_blog_list( 0, 'all' );

				foreach ($blog_list AS $blog){
				  switch_to_blog($blog['blog_id']);
				  $posts = $wpdb->get_col( "SELECT p.ID FROM wp_".$blog['blog_id']."_posts AS p 
				  RIGHT JOIN wp_".$blog['blog_id']."_postmeta AS m ON p.ID = m.post_id WHERE m.meta_value = 'template-projektStartSida-lokal.php' AND p.post_status = 'publish' AND p.post_type = 'page'");
				  if ($blog['blog_id'] == 1)
					$posts = $wpdb->get_col( "SELECT ID FROM wp_posts WHERE post_status = 'a' AND post_type = 'post'");
				  foreach($posts as $post){
					$postdetail=get_blog_post($blog['blog_id'],$post);
					setup_postdata($postdetail);
					$postIndex = array(
					  'start_date'  =>  get_post_meta($postdetail->ID, "_EventStartDate", $single = true),
					  'title'       =>  $postdetail->post_title,
					  'content'     =>  $postdetail->post_content

					);
					array_push($postArray, $postIndex);
				  }
				}

				asort($postArray);

?>
<div id="content" class="box shadow opacity">
	<div id="container" >
		<?php get_constructor_slideshow(true) ?> 
			<div id="posts">
				<div <?php post_class(); ?> id="post-<?php $post->ID ?>">
					<div class="title opacity box">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo $post->post_title?> </a></h1>
					</div>
					<div class="entry">
						<?php echo $post->post_content ?>
					</div>
				</div>
				
					<div id="hotell_listing">
					<?php

					
					
					
				foreach($postArray as $key => $value) {
				  foreach($postArray[$key] as $K => $v){ ?>			
							<div <?php post_class(); ?> id="post-<?php the_ID() ?>">
								<div class="title opacity box">
									<h2><?php 
									if($K=="title")
									print "$v";
									the_title(); ?></h2>
								</div>
								<div class="entry">
									<?php 
									global $more; $more = false;
									if($K=="content")
									{
										//print "$v";
										the_content(__('Read the rest of this entry &raquo;', 'constructor')); 
									}?>
								</div>
								<div class="footer">
									<div class="links">
									
									</div>
								</div>
							</div>
							
						
				<?php	
				  }
				}?>
					</div>
			</div>
			
		<?php
		

		wp_reset_query();  // Restore global post data
		?>
		
		<div id="description_seo">
			<?php 
			if(qtrans_getLanguage()=="en"){
				if($data =get_post_meta($post->ID, 'page_description', true)){
					echo $data;
				}	
			}
			else
			{
				if($data =get_post_meta($post->ID, 'page_description_es', true)){
					echo $data;
				}					
			}?>
		</div>
	</div><!-- id='container' -->
		<?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
<?php get_footer(); ?>
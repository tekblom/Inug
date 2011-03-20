<?php
/*
Template Name: Projekt RIKS StartSida
*/

__('Default', 'constructor'); // requeried for correct translation

get_header(); ?>
<div id="content" class="box shadow opacity">	
		<?php get_constructor_slideshow(true) ?> 
			<div id="posts">
			<?php while (have_posts()) : the_post(); ?>
				<div <?php post_class(); ?> id="post-<?php the_ID() ?>">
<!-- id='content' 	<div class="title opacity box">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
					</div>-->
					<div class="entry">
						<?php the_content(__('Read the rest of this entry &raquo;', 'constructor')) ?>
					</div>
				</div>
				
			<?php endwhile; ?>

			<?php
				//LOOP ALL THE PROJECTS::
				//TODO: KANSKE DEPRICATED.
								global $wpdb;
				global $post;
				$postArray = array();
				$blog_list = get_blog_list( 0, 'all' );

				foreach ($blog_list AS $blog){
					
				  switch_to_blog($blog['blog_id']);
				  $sql = "
						SELECT p.ID FROM ".$wpdb->prefix."posts AS p 
							RIGHT JOIN ".$wpdb->prefix."postmeta AS m 
						ON p.ID = m.post_id 
						WHERE 
							m.meta_value = 'template-Projekt-LOKAL-StartSida.php' AND 
							p.post_status = 'publish' AND 
							p.post_type = 'page'";

				  $posts = $wpdb->get_col($sql);
				  if ($blog['blog_id'] == 1)
					$sql = "
						SELECT p.ID FROM ".$wpdb->prefix."posts AS p 
							RIGHT JOIN ".$wpdb->prefix."postmeta AS m 
						ON p.ID = m.post_id 
						WHERE 
							m.meta_value = 'template-Projekt-LOKAL-StartSida.php' AND 
							p.post_status = 'publish' AND 
							p.post_type = 'page'";

					$posts = $wpdb->get_col($sql );
				  foreach($posts as $post){
				
					$postdetail=get_blog_post($blog['blog_id'],$post);
					setup_postdata($postdetail);
					
					//echo the_content(__('Read the rest of this entry &raquo;', 'constructor')); 
					$postIndex = array(
					  'start_date'  =>  get_post_meta($postdetail->ID, "_EventStartDate", $single = true),
					  'land'  =>  get_post_meta($postdetail->ID, "Land", $single = true),
					  'region'  =>  get_post_meta($postdetail->ID, "Region", $single = true),
					  'start'  =>  get_post_meta($postdetail->ID, "Start_pa_samarbete", $single = true),
					  'url' => get_permalink( $postdetail->ID ),
					  //'url' => $postdetail->guid,
					  'id' => $postdetail->ID + $blog['blog_id'],
					  'title'       =>  get_post_meta($postdetail->ID, "Projektnamn", $single = true),
					  'content'     =>  get_post_meta($postdetail->ID, "Ingress", $single = true),
					  'blog_domain' => $blog['path']
					);
					array_push($postArray, $postIndex);
				  }
				}

				asort($postArray);

				
				
				?>
				
				<table id="projekt" style="margin-left: 30px;">
				<tr>
					<th>Projektnamn</th>
					<th>Land</th>
					<th>Region</th>
					<th>Budget</th>
					<th>Forening</th>
					<th>Startade</th>
					<!--<th>Mer info</th>-->
					<th>Projekthemsida</th>
				</tr>
				
				<?php

					
					
					
				foreach($postArray as $key => $value) {
					setup_postdata($postArray[$key]);
					
				   ?>			
								<tr>
									<td><h4><?php 
					
									print $postArray[$key]["title"];
									
									?></h4></td>
								
									<td><?php print $postArray[$key]["land"];?></td>
									<td><?php print $postArray[$key]["region"];?></td>
									<td>100 000 kr</td>
									<td><?php print $postArray[$key]["blog_domain"];?></td>
									<td><?php print $postArray[$key]["start"];?></td>
									<!--TODO: LANGUAGE
									<td>
										<?php
									if($postArray[$key]["content"]!="")
									{
										?> <button id="expandera_<?php print $postArray[$key]["id"];?>">Show</button><?php
									}?>
									
									-->
									</td>
									
									<script>
										    $("#expandera_<?php print $postArray[$key]["id"];?>").click(function () {
												if ( $('#content_<?php print $postArray[$key]["id"];?>').css('display') == 'none' ){
													//$('#expandera_21').text("Hide");
													$("#content_<?php print $postArray[$key]["id"];?>").show("slow");
													return false;
												}										
											});
										
									
									</script>
									
									<td>Gå till projektets sida på <a href="<?php print $postArray[$key]["url"];?>"><?php print $postArray[$key]["blog_domain"];?> </a> </td>
								</tr>
								<tr id="content_<?php print $postArray[$key]["id"];?>" style="display:none;">
									<td colspan="8" style="padding-left:10px;background-color:#efe"><?php print $postArray[$key]["content"];?></td>
								
								</tr>
								
							
							
						
				<?php	
				  
				}?>
				</table>
		

			</div>
</div><!-- id='content' -->
<?php get_footer(); ?>
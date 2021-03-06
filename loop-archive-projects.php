<?php
/**
 * The loop for the project connected posts archive
 *
 * @package WordPress
 * @subpackage Rotary
 * @since Rotary 1.0
 */
 ?>
 
 
<?php   if ( isset( $_REQUEST['projectid'] ) ) : ?>	
	<?php //get the committee ?>
	<?php $connected = new WP_Query( array(
		'connected_type'  => 'projects_to_committees',
		'connected_items' => $_REQUEST['projectid'],
		'posts_per_page' => 1, 
		'nopaging'        => false,
	) ); ?>
	<?php if ( $connected->have_posts() ) : ?>
		<?php  while ( $connected->have_posts() ) : $connected->the_post();?>
			<h3 class="pagecommitteetitle"><?php the_title(); ?> Committee</h3>
			<?php endwhile; ?>
	<?php endif; ?>	
	<?php wp_reset_postdata();?>	
	<?php	//secondary loop to get connected posts
		$postCount = 0;
		$clearLeft='';
		$connected = new WP_Query( array(
			'connected_type'  => 'projects_to_posts',
			'connected_items' => $_REQUEST['projectid'],
			'nopaging'        => false,
		) ); ?>
		<?php if ( $connected->have_posts() ) : ?>
			 <?php   $committeePost = get_post( $_REQUEST['committeeid'] ); ?>
				
				<?php  while ( $connected->have_posts() ) : $connected->the_post();?>
					<?php $postCount = rotary_output_blogroll($postCount, $clearLeft); ?>
				<?php endwhile;?>
			<?php else : ?>
				<p>No project news.</p>
		<?php endif; ?>
		<?php // Reset Post Data ?>
		<?php wp_reset_postdata(); ?>
		
<?php else : ?>
		<p>This page is only valid from the committee.</p>	
<?php endif;
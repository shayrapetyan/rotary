<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Rotary
 * @since Rotary 1.0
 * sidebar used on blog and interior pages
 */
?>

	<aside id="secondary" role="complementary">
		<ul>

<?php

if(current_user_can('edit_page')){ ?>
 		<li class="newpost">
            <ul >
                <li>
                	<?php if ('rotary_speakers' == get_post_type() ) {?>
                		<a class="button" href="<?php echo admin_url(); ?>post-new.php?post_type=rotary_speakers">New Speaker</a>
                	<?php } elseif ('rotary-committees' == get_post_type() && isset($_REQUEST['committeeid'])) { ?>               		
                		<a class="button" href="<?php echo admin_url(); ?>post-new.php?committeeid=<?php echo $_REQUEST['committeeid']?>" target="_blank">Committee News</a>              		
					<?php } else { ?>
						<a class="button" href="<?php echo admin_url(); ?>post-new.php">New Post</a>
					<?php } ?>
                 </li>
                </ul>
            </li>

	<?php }

if(current_user_can('manage_options')){ ?>
      <a class="widgetedit" href="<?php echo admin_url(); ?>widgets.php">Edit Widgets</a>
  <?php  }
if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>


				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>


<?php endif; ?>
		</ul>
	</aside>
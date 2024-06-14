<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage KrishMish_Static_Content
 * @since KrishMish_Static_Content 1.0
 */

	get_header(); 
?>

	<main id="main-content-article" class="main-content-style article-page-main-content" style="margin-top:50px;" page-title="<?=$post_title_txt?>">
    	<div class="container km-container-style">
        	<div class="row">
            	<div class="col-sm-8 col-md-9 col-p10-lr-mob">
					<div class="km-bgc-white bfs-content-padding mb20">
						<?php
							$s=get_search_query();
							$args = array(
								's' =>$s
							);
							// The Query
							$the_query = new WP_Query( $args );
						?>
							
						<?php if ( $the_query->have_posts() ) { 
							_e('<h2 class="article-heading">Search Results for: '.get_query_var('s').'</h2>');
							while ( $the_query->have_posts() ){ ?>
								<?php $the_query->the_post(); ?>
								<p>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</p>
							<?php }
						}else{ ?>
							<h1 style='font-weight:bold;color:#000'>Nothing Found</h1>
							<div class="alert alert-info">
								<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="col-sm-4 col-md-3" style="margin-top:20px">
                	<?php get_sidebar() ?>
            	</div>
			<!-- .row -->
			</div>
		<!-- .container -->
		</div>
	<!-- .site-main -->
	</main>
<?php get_footer(); ?>
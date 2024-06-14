<?php

	// $sidebar_banner_one		=	get_side_banner_one();
	// $sidebar_banner_two		=	get_side_banner_two();
	$imp_topics_section 	= 	array( 'posts_per_page' => 8, 'offset'=> 0, 'order' => 'ASC','post_status' => 'publish', 'category_name'=> '');
	$cat_imp_topics 		= 	get_posts($imp_topics_section); 
?>
	<aside id="primary-sidebar" class="primary-sidebar widget-area" role="complementary" data-scroll-right>
        <div data-scroll-right-container>
			<!-- Search Box -->
		  	<div class="km-bgc-white km-content-padding mb20">
				<form class="km-sidebar-search-widget" method="get" action="<?=home_url()?>" role="search">
                	<div class="form-group search-widget-body">
						<input type="search" class="form-control search-field km-serach-field" placeholder="<?php echo esc_attr_x( 'Type Your Search...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
						<button type="submit" role="button" class="btn km-search-btn">
							<svg style="width:24px;height:24px;display:inline-block;vertical-align:middle;" viewBox="0 0 24 24">
								<path fill="white" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"></path>
							</svg>
						</button>
                	</div>
            	</form>
        	</div>

            <!-- promotional banner two -->
            <div class="km-bgc-white km-content-padding">
				<div class="widget sidebanner-one">
					<div class="widget-content">
                    <a>
                    <img class="promo-banner-two-img" src="<?php echo get_template_directory_uri() ?>/assets/gifs/gif_discount_logo.webp" alt="lets_eat" height="auto" width="auto"/>
                    </a>
                </div>
            </div>
            <!-- recent articles -->
			<div class="km-bgc-white km-content-padding">
				<div class="widget relatedlinks-widget">
					<div class="widget-content">
						<h4 class="widget-title mt0">Recent Articles</h4>
					<div>	
					<ul id="aside_nav" class="list-unstyled">
					<?php for($i=0; $i<count($cat_imp_topics); $i++){ ?>
						<li><a href="<?= get_permalink($cat_imp_topics[$i]->ID)?>" style="color:#0930f1;"><?= $cat_imp_topics[$i]->post_title?></a></li>
					<?php } ?>
					</ul> 
				</div>
			</div>

            <!-- promotional banner one -->
            <div class="km-bgc-white km-content-padding">
				<div class="widget sidebanner-one">
					<div class="widget-content">
                    <a>
                        <img src="http://localwww.krishmish.com/wp-content/uploads/2024/05/donate_food_campaign.webp">
                    </a>
                </div>
            </div>

    	</div>
	</aside>
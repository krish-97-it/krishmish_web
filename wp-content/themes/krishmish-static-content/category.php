<?php
/**
* A Simple Category Template
*/

$category               =   get_category(get_query_var('cat'));
$cat_name               =   get_cat_name($category->cat_ID);
$parent_category        =   get_cat_name($category->parent);
$category_slug          =   get_category_parents($category->cat_ID);
$trim_cat_slug          =   rtrim($category_slug, '/');
$category_name          =   explode('/', $trim_cat_slug);
$category_name_count    =   count($category_name);

$cat_posts              =   get_category_posts($category->slug);

$active_category        =   $category_name[$category_name_count-1];

global $post;

get_header();
?>
<main id="main-content" class="main-content-style" page-type="category" page-title="<?=$category_name[$category_name_count-1]?>">
    <div class="container" style="margin-top:50px">
        <div class="row">

            <!-- top banner section -->
            <div class="col-md-12" style="margin-top:30px">
                <a class="bmc-custom-banner-redirection" href="<?php echo "https://byjus.com/user_country/math/?device=device_type&utm_source=bmc_blog&utm_medium=top_banner&utm_campaign=beyond_tutoring_bmc&utm_term=".urlencode('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" banner-medium="top-banner-click">
                    <picture>
                        <source media="(max-width: 767.98px)" srcset="<?=$mob_img?>"/>
                        <source media="(min-width: 768px)" srcset="<?=$desktop_img?>"/>
                        <img class="humepage-top-banner-img bmc-custom-banner-img" src="<?=$mob_img?>" alt="BOOK A DEMO WITH AN EXPERT" style="width:100% !important;" width="1032" height="480" banner-medium="top-banner-view" object-visible="0">
                    </picture>
                </a>
            </div>

            <!-- breadcrumb section -->
            <div class="col-md-12 custom-col-style breadcrumb-col-style">
                <ul class="blog-breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=home_url()?>">Home</a></li>
                    <?php 
                        for($i=0; $i<$category_name_count-1; $i++){ ?>
                            <li class="breadcrumb-item"><a href="<?php echo sprintf( '%s', get_category_link(get_cat_ID($category_name[$i])), $category_name[$i] ); ?>"><?=$category_name[$i]?></a></li>
                    <?php } ?>
                    <li class="breadcrumb-item active breadcrumb-item-active"><?=$category_name[$category_name_count-1]?></li>
                </ul>
            </div>

            <?php if(count((array)$cat_posts) > 0){ ?>
                <div class="col-md-12 custom-col-style">
                    <h5 class="category-heading"><?php echo '<a class="category-link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?></h5>
                    <div class="row">
                        <?php $i=0; if (have_posts()): while (have_posts()) : the_post();?>
                            <div class="col-sm-12 post-card-section">
                                <div class="row" style="cursor: pointer;" onclick="window.location.href='<?php echo get_permalink($posts->ID);?>';">
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-5 post-img-section">
                                        <?php 
                                            $img_url            =   getPostFeaturedImage($post->ID); 
                                            $img_id             =   get_post_thumbnail_id($post->ID);
                                            $img_alt            =   get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
                                            $optimized_img_url  =   getPostOptimizedImage($post->ID);
                                            if($optimized_img_url != ''){
                                                $img_url = $optimized_img_url;
                                            }
                                            if($img_alt == ''){
                                                $img_alt = 'Blog Feature Image';
                                            } 
                                        ?>
                                        <img src="<?= $img_url ?>" class="post-featured-img category-post-card-img" loading="lazy" alt="<?=$img_alt?>" width="209" height="105">
                                    </div>
                                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-7 post-description-section">
                                        <div class="custom-post-desc-style">
                                            <h4 class="card-heading category-page-card-heading"><a class="post-title-txt"><?=the_title();?></a></h4>
                                            <div class="read-time-section category-page-read-time-section read-time-opacity read-time-hidden">
                                                <div class="watch-icon-section">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                                        <path d="M5 1.71429V0H10V1.71429H5ZM6.66667 11.1429H8.33333V6H6.66667V11.1429ZM7.5 18C6.47222 18 5.50333 17.7963 4.59333 17.3889C3.68333 16.9814 2.88833 16.428 2.20833 15.7286C1.52778 15.0286 0.989445 14.2106 0.593334 13.2746C0.197223 12.3386 -0.000554388 11.3423 1.16713e-06 10.2857C1.16713e-06 9.22857 0.198057 8.232 0.594168 7.296C0.990279 6.36 1.52833 5.54229 2.20833 4.84286C2.88889 4.14286 3.68417 3.58914 4.59417 3.18171C5.50417 2.77429 6.47278 2.57086 7.5 2.57143C8.36111 2.57143 9.1875 2.71429 9.97917 3C10.7708 3.28571 11.5139 3.7 12.2083 4.24286L13.375 3.04286L14.5417 4.24286L13.375 5.44286C13.9028 6.15714 14.3056 6.92143 14.5833 7.73571C14.8611 8.55 15 9.4 15 10.2857C15 11.3429 14.8019 12.3394 14.4058 13.2754C14.0097 14.2114 13.4717 15.0291 12.7917 15.7286C12.1111 16.4286 11.3158 16.9823 10.4058 17.3897C9.49583 17.7971 8.52722 18.0006 7.5 18ZM7.5 16.2857C9.11111 16.2857 10.4861 15.7 11.625 14.5286C12.7639 13.3571 13.3333 11.9429 13.3333 10.2857C13.3333 8.62857 12.7639 7.21429 11.625 6.04286C10.4861 4.87143 9.11111 4.28571 7.5 4.28571C5.88889 4.28571 4.51389 4.87143 3.375 6.04286C2.23611 7.21429 1.66667 8.62857 1.66667 10.2857C1.66667 11.9429 2.23611 13.3571 3.375 14.5286C4.51389 15.7 5.88889 16.2857 7.5 16.2857Z" fill="#3F3F57"/>
                                                    </svg>
                                                </div>
                                                <?php if( function_exists('get_readtime_of_post') ){ ?>
                                                    <div class="read-time-txt"><?= get_readtime_of_post($post->ID); esc_html_e('min read', 'veen'); ?></div>
                                                <?php } ?>
                                            </div>
                                            <a class="category-page-read-more-txt">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 category-horizontal-line" line-count="<?=$i?>"><p class="col-horizontal-line category-page-horizontal-line"></p></div>
                        <?php $i++; endwhile; endif;?>
                    </div>
                </div>
            <?php } ?>


            <!-- <div class="col-sm-12 col-xs-12 view-all-btn-section">
                <a href="<?php echo get_category_link($category->term_id); ?>" class="view-all-btn">View All</a>
            </div> -->


            <div class="col-sm-12 pagination-section">
                <?php
                    html5wp_pagination();
                ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer('new-blog'); ?>
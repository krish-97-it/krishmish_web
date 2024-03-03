<?php
/**
 * The template for displaying single post
 *
 * @package WordPress
 * @subpackage KrishMish_Static_Content
 * @since KrishMish_Static_Content 1.0
*/

global $post;
$post_id            =   $post->ID;
$feature_img        =   getPostFeaturedImage($post_id);
$img_id             =   get_post_thumbnail_id($post_id);
$img_alt            =   get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
if($img_alt == ''){
    $img_alt = 'Blog Feature Image';
}
$author_id          =   get_post_field ('post_author', $post_id);
$post_author_name   =   get_the_author_meta( 'display_name' , $author_id ); 
$category           =   get_the_category($post->ID);
$parent_category    =   '';
$post_title_txt     =   get_the_title();

//get related posts upto 12posts
if(count($category) > 1){
    $len_category           =   count($category);
    $first_category_index   =   $len_category - 1;
    $first_category         =   $category[$first_category_index];
    $parent_category        =   $category[$first_category_index-1]->term_id;
}else{
    $first_category         =   $category[0];
}

if($parent_category != ''){
    $parent_category_termid   =   $parent_category;
}else{
    $parent_category_termid   =   '';
}
$args = array( 'posts_per_page' => 12, 'offset'=> 0, 'category' => array($first_category->term_id,$parent_category_termid), 'post__not_in' => array( $post_id ), 'orderby' => array( 'title' => 'ASC', 'date' => 'DESC' ), 'post_status' => 'publish');
$cat_related_posts = get_posts($args);


if (have_posts()):
    while (have_posts()) :
        the_post();
        $get_the_content    =   get_the_content();
        $fullContent        =   (apply_filters( 'the_content', $get_the_content)); // get_the_content() does not pass the content through the_content. Which means that it does not auto-embed videos, or expand shortcodes, paragraphs etc few things.
    endwhile;
endif;

$current_url            =   urlencode('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$post_feature_img       =   '<div class="col-sm-12 post-page-feature-img-section feature-img-section-inside-content" style="margin-bottom:25px; padding-left:0px; padding-right:0px">
                                <img src="'.$feature_img.'" alt="'.$img_alt.'" class="post-page-banner-img-style" width="100%" height="auto">
                            </div>';
$country_code           =   getCountryCode();

$get_current_page_url   =   ($_SERVER["HTTPS"] ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
// $fb_share_link          =   "https://www.facebook.com/sharer/sharer.php?u=".$get_current_page_url;
$fb_share_link          =   "https://www.addtoany.com/add_to/facebook?linkurl=".$get_current_page_url."&linkname=".$post_title_txt;
$whatsapp_share_link    =   "https://api.whatsapp.com/send?text=".$get_current_page_url;
// $twitter_share_link     =   "http://twitter.com/share?text=".$post_title_txt."&url=".$get_current_page_url;
$twitter_share_link     =   "https://www.addtoany.com/add_to/twitter?linkurl=".$get_current_page_url."&linkname=".$post_title_txt;
$gmail_share_link       =   "mailto:?subject=".$post_title_txt."&body=".$get_current_page_url;
$linkedin_share_link    =   "https://www.linkedin.com/shareArticle?mini=true&url=".$get_current_page_url."&title=".$post_title_txt;

get_header();
?>

<main id="main-content" class="main-content-style article-page-main-content" style="margin-top:50px;" page-type="blogs" page-title="<?=$post_title_txt?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="article-full">
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                        By: <?php the_author(); ?>
                        <?php
                            echo $post_feature_img;
                        ?>
                        <?php 
                            the_content(); 
                        ?>
                    </article>
                <?php endwhile; else : ?>
                    <article>
                        <p>Sorry, no post was found!</p>
                    </article>
                <?php endif; ?>
            </div>
            <div class="col-sm-4" style="margin-top:20px;">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
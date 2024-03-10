<?php

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
   // if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
   // }
}

function deregister_qjuery() {  
   if ( !is_admin() ) {
       wp_deregister_script('jquery');
   }
}  

add_action('wp_enqueue_scripts', 'deregister_qjuery'); 

add_action( 'wp_enqueue_scripts', 'krishmish_custom_css_js');

function krishmish_custom_css_js() {
   $version   =   1.0;
   // css files
    wp_enqueue_style( 'style',  get_template_directory_uri(). '/style.css', array(), $version );
	wp_enqueue_style( 'custom-header', get_template_directory_uri().'/css/custom-css/custom-header.css', array(), $version);
	wp_enqueue_style( 'custom-footer', get_template_directory_uri().'/css/custom-css/custom-footer.css', array(), $version);
    wp_enqueue_style('home-page-style',get_template_directory_uri().'/css/home-page.css', array(), $version);
    wp_enqueue_style( 'components-style', get_template_directory_uri().'/css/components.css', array(), $version);

    // js files
    wp_enqueue_script('custom', get_template_directory_uri().'/js/custom-js/all.js', array(), $version, true);
    wp_enqueue_script('home-page', get_template_directory_uri().'/js/custom-js/home-page.js', array(), $version, true);
    wp_enqueue_script('custom-header-footer',  get_template_directory_uri().'/js/custom-js/custom-header-footer.js', array(), $version, true);
}

// function add_js_in_footer() {
//    echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/custom-js/home-page.js"></script>';
//    echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/custom-js/custom-header-footer.js"></script>';
// }
// add_action( 'wp_footer', 'add_js_in_footer' );

// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
   register_sidebar( array(
                   'name'          => 'Sidebar',
                   'id'            => 'sidebar',
                   'before_widget' => '<div>',
                   'after_widget'  => '</div>',
                   'before_title'  => '<h2>',
                   'after_title'   => '</h2>',
   ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );

// Register a new navigation menu
function add_Main_Nav() {
   register_nav_menu('header-menu',__( 'Header Menu' ));
}

// Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );

// Get the post of the category
function get_category_posts($slug){
    global $wp_query;
    $args = array(
            'category_name' => $slug,
            'post_status' => 'publish',
            'posts_per_page' => 9
        );
    $posts_details = new WP_Query($args);
    return $posts_details->posts;
}

// Get the featured images
function getPostFeaturedImage($post_id){
    $img_url    = '';
    if(get_the_post_thumbnail_url($post_id,'full') == ''){
        $img_url    =   'https://math-media.byjusfutureschool.com/bfs-math/2023/08/28130437/default-post-template-two.webp';
    }else{
        $img_url    =   get_the_post_thumbnail_url($post_id,'full');
    }
    return $img_url;
}

function getPostOptimizedImage($post_id){
    $post_meta  =   get_post_meta($post_id, 'epcl_post', true );
    $img_url    =   '';

    if(!empty($post_meta) && isset($post_meta['optimized_image']) ){
        $optimized_image = $post_meta['optimized_image'];

        if( !empty($optimized_image) && isset($optimized_image['url']) ){
            $img_url    = $optimized_image['url'];
        }      
    }
    return $img_url;
}

function get_readtime_of_post($post_id){
    $article    = get_post_field( 'post_content', $post_id); //gets full text from article
    $wordcount  = str_word_count( strip_tags( $article ) ); //removes html tags
    $time       = ceil($wordcount / 250); //takes rounded of words divided by 250 words per minute
	
    if ($time == 1) { //grammar conversion
        $label = " minute";
    } else {
        $label = " minutes";
    }
	
    $totalString = $time . $label; //adds time with minute/minutes label
    return $totalString;
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination(){
    global $wp_query;
    $big = 999999999;
    echo paginate_links_blog(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

/* Pagination design for Blog */
function paginate_links_blog( $args = '' ) {
    global $wp_query, $wp_rewrite;

    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );

    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

    $defaults = array(
        'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format'             => $format, // ?page=%#% : %#% is replaced by the page number
        'total'              => $total,
        'current'            => $current,
        'aria_current'       => 'page',
        'show_all'           => false,
        'prev_next'          => true,
        'prev_text'          => __( '&laquo; Previous' ),
        'next_text'          => __( 'Next &raquo;' ),
        'end_size'           => 1,
        'mid_size'           => 3,
        'type'               => 'list',
        'add_args'           => array(), // array of query args to add
        'add_fragment'       => '',
        'before_page_number' => '',
        'after_page_number'  => '',
    );

    $args = wp_parse_args( $args, $defaults );

    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }

    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );

        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }

        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }

    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 5;
    }

    $add_args   = $args['add_args'];
    $r          = '';
    $page_links = array();
    $dots       = false;

    if ( $args['prev_next'] && $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        $link = str_replace("?amp", "", $link);
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];

        if(1 < $current){
            $page_links[] = sprintf(
                '<a class="prev page-link" href="%s">%s</a>',
                /**
                 * Filters the paginated links for the given archive pages.
                 *
                 * @since 3.0.0
                 *
                 * @param string $link The paginated link URL.
                 */
                esc_url( apply_filters( 'paginate_links', $link ) ),
                '<'
            );
        } else {
            $page_links[] = sprintf(
                '<a class="prev page-link" tabindex="-1">%s</a>',
                '<'
            );
        }
    endif;

    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
            $page_links[] = sprintf(
                '<a aria-current="%s" class="page-link current" tabindex="-1">%s</a>',
                esc_attr( $args['aria_current'] ),
                $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
            );

            $dots = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                $link = str_replace("?amp", "", $link);
                if ( $add_args ) {
                    $link = add_query_arg( $add_args, $link );
                }
                $link .= $args['add_fragment'];

                if($n==1){
                    global $wp;
                    $current_url =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $pos = strpos($current_url , '/page');
                    $finalurl = substr($current_url,0,$pos);
                    $parsed_url = parse_url($current_url);
                    $parsed_url = str_replace("?amp", "", $current_url);
                    $query_string = "";
                    if(isset($parsed_url['query']) && $parsed_url['query'] != ""){
                        $query_string = "?".$parsed_url['query'];
                    }

                    $page_links[] = sprintf(
                        '<a class="page-link" href="%s">%s</a>',
                        esc_url( $finalurl.$query_string ),
                        $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
                    );
                }else{
                    $page_links[] = sprintf(
                        '<a class="page-link" href="%s">%s</a>',
                        /** This filter is documented in wp-includes/general-template.php */
                        esc_url( apply_filters( 'paginate_links', $link ) ),
                        $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
                    );
                }

                $dots = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<span class="page-link dots">' . __( '&hellip;' ) . '</span>';

                $dots = false;
            endif;
        endif;
    endfor;

    if ( $args['prev_next'] && $current ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        $link = str_replace("?amp", "", $link);
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];

        if($current < $total){
            $page_links[] = sprintf(
                '<a class="next page-link" href="%s">%s</a>',
                /** This filter is documented in wp-includes/general-template.php */
                esc_url( apply_filters( 'paginate_links', $link ) ),
                '>'
            );
        }else{
            $page_links[] = sprintf(
                '<a class="next page-link" tabindex="-1">></a>',
                /** This filter is documented in wp-includes/general-template.php */
                '<'
            );
        }
    endif;

    switch ( $args['type'] ) {
        case 'array':
            return $page_links;

        case 'list':
            $r .= "<ul class='pagination pg-blue justify-content-center'>\n\t<li class='page-item'>";
            $r .= join( "</li>\n\t<li class='page-item'>", $page_links );
            $r .= "</li>\n</ul>\n";
            break;

        default:
            $r = join( "\n", $page_links );
            break;
    }

    return $r;
}

// Create the Custom Excerpts callback
function html5wp_excerpt_blog_page($length_callback = '', $more_callback = '',$post_id, $trunk=1, $dotted=true){
    if ($trunk && function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if ($trunk && function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt($post_id);
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    echo ($dotted) ? $output : str_replace('...','',$output);
}

function getCurrentPageurl($without_query_param=1, $remove_pagination=0){ 
    $server_host            =   (isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '';
    $request_uri            =   (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
    $http_request_scheme    =   'https://';
    if($without_query_param){
        $request_uri        =   parse_url($request_uri, PHP_URL_PATH);
    }
    $current_url            =   $http_request_scheme . $server_host . $request_uri;
    if($remove_pagination){
        $current_url        =   trim(explode('/page/', $current_url)[0],'/') . '/';
    }
    return $current_url;
}

function baseUrl(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

function getCountryCode(){
    return 'US';
}

function get_custom_seo_content($post_id){
   $get_custom_field_data   =   get_fields($post_id);
   return $get_custom_field_data;
}

function getArticleSchema($post_id, $type){
    $schema_type            =   $type ? $type : '';
    $current_page_url       =   getCurrentPageurl(1,1);
    $feature_img            =   getPostFeaturedImage($post_id);
    $content                =   get_the_excerpt($post_id);
    $seo_content            =   get_custom_seo_content($post_id);
    $custom_title           =   $seo_content['title'] ? $seo_content['title'] : '';
    $custom_desc            =   $seo_content['desc'] ? $seo_content['desc'] : '';
    $title                  =   $custom_title ? $custom_title : get_the_title();
    $description            =   $custom_desc ? $custom_desc : $content;
    $headline               =   substr($title,'0','110');
    $author_id              =   get_post_field ('post_author', $post_id);
    $post_author_name       =   get_the_author_meta( 'display_name' , $author_id );
    $published_date         =   get_the_date('Y-m-d', $post_id);
    $modified_date          =   get_the_modified_date('Y-m-d', $post_id);
    $published_time         =   get_the_time('h:i:s', $post_id);
    $modified_time          =   get_the_modified_time('h:i:s', $post_id);

    echo    '<script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "'.$schema_type.'",
                "mainEntityOfPage": {
                    "@type": "WebPage",
                    "@id": "'.$current_page_url.'"
                },
                "datePublished": "'.$published_date.'T'.$published_time.'+5:30",
                "dateModified": "'.$modified_date.'T'.$modified_time.'+5:30",
                "description": "'.$description.'",
                "headline": "'.$headline.'",
                "image":["'.$feature_img.'"],
                "author": {
                    "@type": "Person",
                    "name": "BYJU\'S Math Companion Tutor"
                },
                "publisher": {
                    "@type": "Organization",
                    "name": "BYJU\'S",
                    "logo": {
                        "@type": "ImageObject",
                        "url": "https://math-media.byjusfutureschool.com/bfs-math/2023/12/22184915/math_companion_logo.webp"
                    }
                }
            }
        </script>';
}

function getBreadcrumbSchema($schema_id, $type){
    $schema_type                =   $type ? $type : '';
    $current_page_url           =   getCurrentPageurl(1,1);

    if($schema_type != '' && $schema_type == 'Category'){
        $category_slug          =   get_category_parents($schema_id);
        $trim_cat_slug          =   rtrim($category_slug, '/');
        $category_name          =   explode('/', $trim_cat_slug);
        $category_name_count    =   count($category_name);
        $schema_data            =   [];
        $position               =   1;
        $first_item             =   '{
                                        "@type": "ListItem",
                                        "position": "'.$position.'",
                                        "name": "Home",
                                        "item": "https://byjus.com/us/math/"
                                    }';
            
        array_push($schema_data, $first_item);
        $position++;

        for($i=0; $i<=$category_name_count-1; $i++){ 
            
            $count              =   $position+$i;
            $item_link          =   get_category_link(get_cat_ID($category_name[$i]));
            $temp_data          =  '{
                                        "@type": "ListItem",
                                        "position": "'.$count.'",
                                        "name": "'.$category_name[$i].'",
                                        "item": "'.$item_link.'"
                                    }';
            
            array_push($schema_data, $temp_data);
        }
    }elseif($schema_type != '' && $schema_type == 'Article'){
        $category               =   get_the_category($schema_id);
        $schema_data            =   [];
        $position               =   1;
        $first_item             =   '{
                                        "@type": "ListItem",
                                        "position": "'.$position.'",
                                        "name": "Home",
                                        "item": "https://byjus.com/us/math/"
                                    }';
        array_push($schema_data, $first_item);

        // iterate all the categories/parent categories of the post
        foreach($category as $cat){
            $position           =   $position+1;
            $item_link          =   get_category_link($cat);
            $temp_data          =   '{
                                        "@type": "ListItem",
                                        "position": "'.$position.'",
                                        "name": "'.$cat->name.'",
                                        "item": "'.$item_link.'"
                                    }';
            
            array_push($schema_data, $temp_data);
        }

        // add post title , the active breadcrumb element
        $active_data            =   '{
                                        "@type": "ListItem",
                                        "position": "'.($position+1).'",
                                        "name": "'.get_the_title($schema_id).'",
                                        "item": "'.$current_page_url.'"
                                    }';
        array_push($schema_data, $active_data);
    }

    echo    '<script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": ['.implode(',', $schema_data).']
            }
        </script>';
}

function  getGeneralInfoSchema(){
    echo '<script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"Website",
            "name":"Byju\'s Math Companion",
            "@id":"https://byjus.com/us/math/blogs/",
            "headline":"Byju\'s Math Companion Blogs",
            "description":"Byju\'s Math Companion Blog website acts as an information guide for both parents &amp; kids who wants to know more tips and interesting thoughts related to Math. Mainly we have these categories - Tutoring, For Parents, Math Fun, Real World Maths",
            "url":"https://byjus.com/us/math/blogs/",
            "publisher": {
                "@type": "Organization",
                "name": "Byju\'s",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://math-media.byjusfutureschool.com/bfs-math/2023/12/22184915/math_companion_logo.webp",
                    "width": 468,
                    "height": 152
                }
            },
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://byjus.com/us/math/blogs/?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
        </script>';
}

require get_theme_file_path('/custom-api/custom-api.php');
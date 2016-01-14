<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=3" />
    <!--     <meta name="description" content="Welcome to The Daily Drawing, a blog of comics, cartoons and other nonsense art.">
    -->    <title><?php if ( is_category() ) {
    echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_tag() ) {
    echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_archive() ) {
    wp_title(''); echo ' Archive | ';
    } elseif ( is_search() ) {
    echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
    } elseif ( is_home() || is_front_page() ) {
    bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
    }  elseif ( is_404() ) {
    echo 'Error 404 Not Found | '; bloginfo( 'name' );
    } elseif ( is_single() ) {
    echo wp_title( ' | ', 'false', 'right' );
    } else {
    echo wp_title( ' | ', 'false', 'right' );
    } ?></title>
    <meta name="robots" content="NOODP">
    <link rel="author" href="https://plus.google.com/105289065610553841241/posts" />
    
    <link href="http://fonts.googleapis.com/css?family=Crete+Round:400,400italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=ABeeZee:400,400italic" rel="stylesheet" type="text/css">
    <!--     <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/zazzle/css/zstore.css" />
    -->    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css" />
    
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Comments Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />
    
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
    
    <?php wp_head(); ?>
    <?php   $urlPrepend = get_template_directory_uri();
      //set the post count
      $postCount = 0;
    ?>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-52111927-1', 'auto');
      ga('send', 'pageview');
      
    </script>
    <script>
        var jsPostCount; //this value is calculated within index.php, after the loop
      
          $( document ).ready(function() {
    var urlPrepend = "<?php echo $urlPrepend ?>";
    var shuffledConnectors = shuffleArray(['connector_brick.png','connector_chain.png','connector_goo.png','connector_rope.png']);
    var thePosts = $(".hentry");
    var ssba = $("div.ssba").detach();
    //find the number of posts on the page, then add the connector div to each except the last one
    // $('.post + .post-connector').last().remove();
    $('.hentry + .post-connector').last().remove();

    for (var i=0; i<thePosts.length-1; i++){
      $('#'+ thePosts[i].id + '+ .post-connector').append('<img src="' + urlPrepend +'/assets/' + shuffledConnectors[i%shuffledConnectors.length] + '"/>');
      var whichOne = ssba[i];
      $(whichOne).appendTo('#'+ thePosts[i].id + ' footer' );
      }
      function shuffleArray(array) {
      for (var i = array.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var temp = array[i];
      array[i] = array[j];
      array[j] = temp;
      }
      return array;
      }
      
      });
      
      
      </script>
      <?php // $ga = file_get_contents(get_template_directory_uri()."/includes/analyticstracking.php");
      // this threw a warning on 6/02/15 so I removed it temporarily
      // echo($ga); ?>
    </head>
    <body <?php body_class(); ?>>
      <!--  <img src="<?php/*  echo get_template_directory_uri();  */?>/assets/portfolioitalic.jpg"/> -->
      <div class="off-canvas-wrap">
        <div class="inner-wrap">
          <nav class="tab-bar show-for-small-only">
            <section class="left-small">
              <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
            </section>
            <section class="middle tab-bar-section">
              
              <div class="title">The Daily Drawing</div>
            </section>
          </nav>
          <aside class="left-off-canvas-menu">
            <?php foundationPress_mobile_off_canvas(); ?>
          </aside>
          
          <div class="top-bar-container contain-to-grid show-for-medium-up">
            <nav class="top-bar" data-topbar="">
              <ul class="title-area">
                <li class="name">
                  <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                </li>
              </ul>
              <section class="top-bar-section">
                <?php foundationPress_top_bar_l(); ?>
                <?php foundationPress_top_bar_r(); ?>
                   <ul class="show-for-medium-up" id="social-header">
                    <li><a target="_blank" href="https://www.facebook.com/thedailydrawing"><img width="50" height="50" src="<?php echo get_template_directory_uri(); ?>/assets/footer_facebook.png" alt="Facebook" title="Facebook"/></a></li>
                    <li><a target="_blank" href="http://www.twitter.com/thedailydrawing"><img width="50" height="50" src="<?php echo get_template_directory_uri(); ?>/assets/footer_twitter.png" alt="Twitter" title="Twitter"/></a></li>
                    <li><a target="_blank" href="http://instagram.com/thedailydrawing"><img width="50" height="50" src="<?php echo get_template_directory_uri(); ?>/assets/footer_instagram.png" alt="Instagram" title="Instagram"/></a></li>
                  </ul>
              </section>
            </nav>
          </div>
       
          <header class="row" role="banner">
            <div class="small-12 columns">
              <div class="the-sign"><img src="<?php echo get_template_directory_uri(); ?>/assets/the_sign.png" alt="Welcome" width="113" height="103" /></div>
              <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/masthead.png" alt="The Daily Drawing"/>
              </a></h1>
              <h4 class="subheader" style="display:none"><?php bloginfo('description'); ?></h4>
              
            </div>
          </header>
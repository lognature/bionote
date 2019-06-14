<?php
/*
Template Name: Homepage
*/

    $homepage = true;
?>

<?php get_header() ?>

<?php get_sidebar() ?>
<br><br>
<div class="ui container">
  <div class="ui two column grid">
    <div class="ui column no-padding">
      <div class="wrap-image min-padding hover-scale minus">
        <a href="<?php base_url() ?>/podcasts/">
          <img src="<?php echo get_bloginfo('template_directory'); ?>/img/podcast.jpg" alt="">
        </a>
      </div>

      <br>

      <div class="p-15">
        <h1 class="center black italic">ouça os últimos episódios:</h1>
        <div class="dividing-lines purple"></div>
        <div class="center">
          <img class="center svg home-icon" src="<?php echo get_bloginfo('template_directory'); ?>/img/blablabla.svg"
            id="post-blablabla" alt="">
        </div>
        <?php 
				$podcasts = get_cat_ID("podcast");
				$args = array(
					'posts_per_page'    => 3,
					'category'          => $podcasts
				);
				$catPost = get_posts($args);
                foreach ($catPost as $post) : setup_postdata($post); ?>
        <?php
                        $categoria = get_the_category($podcasts);
                        
                        $post_id = get_category($podcasts);
                        $gambiarra = 0;
                        
                        if (isset($categories[get_cat_ID($categoria)])) {
                            $gambiarra = $categories[get_cat_ID($categoria)];
                            $categories[get_cat_ID($categoria)] += 1;
                        } else {
                            $categories[get_cat_ID($categoria)] = 1;
                        }
                        
                        $post_id = $post_id->count - $gambiarra;
                        $titulo = get_the_title();
                        $titulo = explode(urldecode("%26%238211%3B"), $titulo)[1];
                    ?>
        <div class="hover-scale minus hover-purple">
          <div class="home thumbnail">
            <a href="<?php the_permalink() ?>">
              <?php the_post_thumbnail() ?>
            </a>
          </div>
          <h3 class="no-margin montserrat inherit">Episódio #<?php echo $post_id ?>:</h3>
          <h2 class="no-margin montserrat bold inherit"><?php echo $titulo ?></h2>
          <br>
        </div>
        <?php  endforeach;?>
        <div style="width: 100%; margin: 0 auto; text-align: center">
          <a href="<?php base_url() ?>/podcasts" class="three-points purple">. . .</a>
        </div>
      </div>
    </div>
    <div class="ui column no-padding">
      <div class="wrap-image min-padding hover-scale minus">
        <a href="<?php base_url() ?>/blog/">
          <img src="<?php echo get_bloginfo('template_directory'); ?>/img/blog.jpg" alt="">
        </a>
      </div>

      <br>

      <div class="p-15">
        <h1 class="center black italic">leia os últimos artigos:</h1>
        <div class="dividing-lines yellow"></div>
        <div class="center">
          <img class="center svg home-icon" src="<?php echo get_bloginfo('template_directory'); ?>/img/newspaper.svg"
            id="post-newspaper" alt="">
        </div>

        <?php 

                $categories = array();
				
				$args = array(
					'posts_per_page'    => 3,
					'category__not_in' 	=> $podcasts
				);
				$catPost = get_posts($args);
                foreach ($catPost as $post) : setup_postdata($post); ?>
        <?php
                        $titulo = get_the_title();
                        $categoria = get_the_category();

                        $categoria = $categoria[0]->name;

                        $post_id = get_category(get_cat_ID($categoria));
                        $gambiarra = 0;
                        
                        if (isset($categories[get_cat_ID($categoria)])) {
                            $gambiarra = $categories[get_cat_ID($categoria)];
                            $categories[get_cat_ID($categoria)] += 1;
                        } else {
                            $categories[get_cat_ID($categoria)] = 1;
                        }
                        
                        $post_id = $post_id->count - $gambiarra;
                    ?>
        <div class="hover-scale minus hover-yellow">
          <div class="home thumbnail">
            <a href="<?php the_permalink() ?>">
              <?php the_post_thumbnail() ?>
            </a>
          </div>
          <h3 class="no-margin montserrat inherit"><?php echo $categoria . " #" . $post_id ?>:</h3>
          <h2 class="no-margin montserrat bold inherit"><?php echo $titulo ?></h2>
          <br>
        </div>
        <?php  endforeach;?>
        <div style="width: 100%; margin: 0 auto; text-align: center">
          <a href="<?php base_url() ?>/blog" class="three-points yellow">. . .</a>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
  <div class="bio hr-title green">
    <h2><span class="from-left">categorias</span></h2>
    <div class="desktop">
      <br>
    </div>
  </div>
  <?php include 'snippets/categories.html' ?>
  <br><br><br>
  <div class="ui two column stackable grid">
    <div class="column">
      <div class="bio hr-title green">
        <h2><span class="from-left">assine o podcast:</span></h2>
      </div>
      <div class="ui two column grid">
        <!-- Spotify -->
        <div class="ui column">
          <a href="https://open.spotify.com/show/3H2XMQLpkCLQGKVoFF2oke?si=YbdoAxHXSFasCsAlo7QXGw"
            class="middle-align m-l-10 dark-grey">
            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/spotify-icon.svg" class="svg main-icon"
              alt="">
          </a>
          <a href="https://open.spotify.com/show/3H2XMQLpkCLQGKVoFF2oke?si=YbdoAxHXSFasCsAlo7QXGw"
            class="middle-align dark-grey m-l-10" style="padding-left: 1rem">
            <h2 class="raleway thin middle-align inline">spotify</h2>
          </a>
        </div>

        <!-- Android -->
        <div class="ui column">
          <a class="middle-align m-l-10 dark-grey"
            href="https://www.google.com/podcasts?feed=aHR0cHM6Ly93d3cuYmlvbm90ZS5jb20uYnIvZmVlZC9wb2RjYXN0Lw">
            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/google-podcasts-icon.svg"
              class="svg main-icon" alt="">
          </a>
          <a href="https://www.google.com/podcasts?feed=aHR0cHM6Ly93d3cuYmlvbm90ZS5jb20uYnIvZmVlZC9wb2RjYXN0Lw"
            class="middle-align dark-grey" style="padding-left: 1rem">
            <h2 class="raleway thin middle-align inline">google podcasts</h2>
          </a>
        </div>
      </div>
      <br>
      <div class="ui two column grid">
        <!-- Apple Podcasts -->
        <div class="ui column">
          <a class="middle-align m-l-10 dark-grey"
            href="https://itunes.apple.com/br/podcast/bionote/id1339439741?mt=2&ls=1">
            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/apple-podcasts-icon.svg"
              class="svg main-icon" alt="">
          </a>
          <a href="https://itunes.apple.com/br/podcast/bionote/id1339439741?mt=2&ls=1" class="middle-align dark-grey"
            style="padding-left: 1rem">
            <h2 class="raleway thin middle-align inline">apple podcasts</h2>
          </a>
        </div>

        <!-- RSS -->
        <div class="ui column">
          <a class="middle-align m-l-10 dark-grey" href="https://www.bionote.com.br/feed/podcast/">
            <img src="<?php echo get_bloginfo('template_directory'); ?>/img/rss-icon.svg" class="svg main-icon" alt="">
          </a>
          <a href="https://www.bionote.com.br/feed/podcast/" class="middle-align dark-grey" style="padding-left: 1rem">
            <h2 class="raleway thin middle-align inline">via RSS</h2>
          </a>
        </div>
      </div>
      <br>
      <div class="bio hr-title green">
        <h2><span class="from-left">assine a newsletter:</span></h2>
      </div>
      <a class="cursor" onclick="$('#m-newsletter').modal('show')">
        <img style="float: left" src="<?php echo get_bloginfo('template_directory'); ?>/img/message.svg" class=""
          id="newsletter" alt="">
      </a>
    </div>
    <div class="column">
      <a href="https://www.lognature.com.br">
        <img class="hover-scale minus" style="max-width: 100%"
          src="<?php echo get_bloginfo('template_directory'); ?>/img/site_log.png" alt="">
      </a>
    </div>
  </div>
  <div class="center">
    <br><br>
    <a class="bio black btn" onclick="$('#m-sugestao').modal('show')">
      clique aqui e <b>sugira um tema!</b>
    </a>
  </div>

  <?php include 'snippets/suggest-form.html' ?>
  <?php include 'snippets/newsletter-form.html' ?>

</div>



<br><br>

<?php get_footer() ?>
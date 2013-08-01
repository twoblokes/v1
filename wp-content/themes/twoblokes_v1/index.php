<?php get_header(); ?>

  <section class="first">
    <h2 class="byline">Website Design <br> and Development. <br> Leicester, UK.</h2>
    <div class="next-section">Work</div>
  </section>

  <section class="second">
    <h2 class="second-intro">Our hard work.</h2>
    <ul class="project-list">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <a>
        <li class="project">

          <?php $attachment_id = get_field('screenshot'); $size = "blur-image"; $image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
          <div class="blurred" style="background: url(<?php echo $image[0]; ?>) no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>

          <div class="overlay"></div>

          <div class="gradient"></div>

          <h2 class="title">
            <?php the_title(); ?>
          </h2>
          <div class="description">
            <p><?php the_field('description'); ?></p>
            <a class="visit-site" href="http://<?php the_field('link');?>" target="_blank">Visit site...</a>
          </div>
          
          <?php $screenshot = get_post_meta($post->ID, screenshot, true); if ($screenshot) { ?>
            <?php $attachment_id = get_field('screenshot'); $size = "medium"; $image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
            <div class="screenshot hover">
              <img src="<?php echo $image[0]; ?>">
            </div>
            <?php } ?>
        </li>
      </a>

    <?php endwhile; endif; ?>
    </ul>

    <section class="third">
      <h2 class="third-intro">We work hard. Let's meet.</h2>

      <form class="form" method="post" action="submit.php">
        
        <div>Name:</div>
        <div><input class="name" name="name" /></div>

        <div>Email:</div>
        <div><input class="email" name="email" /></div>

        <div class="fuck-spam">Leave this empty:
        <br><input name="url" /></div>

        <div>Your message to us:</div>
        <div><textarea class="message" name="message"></textarea></div>

        <div><input class="submit" type="submit" value="Send" /></div>

      </form>
    </section>
    
  </section>

<?php get_footer(); ?>


<?php $trailer = get_post_meta($post->ID, trailer, true); if ($trailer) { ?>
<li class="trailer"><a class="clickable"><i class="icon-film"></i> Watch the trailer</a></li>
<?php } else { ?>
<?php } ?>
<?php get_header(); ?>

  <section class="first">
    <h2 class="byline">Website Design and Development. Leicester, UK.</h2>
    <div class="next-section">Work</div>
  </section>

  <section class="second">
    <ul class="project-list">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <a href="<?php the_permalink() ?>">
        <li class="project">
          <h2 class="title">
            <?php the_title(); ?>
          </h2>
          <?php $screenshot = get_post_meta($post->ID, screenshot, true); if ($screenshot) { ?>
            <?php $attachment_id = get_field('screenshot'); $size = "medium"; $image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
            <div class="screenshot">
              <img src="<?php echo $image[0]; ?>">
            </div>
            <?php } ?>
        </li>
      </a>
    <?php endwhile; endif; ?>
    </ul>
  </section>

<?php get_footer(); ?>


<?php $trailer = get_post_meta($post->ID, trailer, true); if ($trailer) { ?>
<li class="trailer"><a class="clickable"><i class="icon-film"></i> Watch the trailer</a></li>
<?php } else { ?>
<?php } ?>
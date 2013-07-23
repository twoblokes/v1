<?php get_header(); ?>

  <section class="first">
    <h2 class="byline">Website Design and Development. Leicester, UK.</h2>
    <div class="next-section">Work</div>
  </section>

  <section class="second">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>
        <hr>
      </article>
    <?php endwhile; endif; ?>
  </section>

<?php get_footer(); ?>

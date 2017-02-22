<article>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail( $thumbnail_size ); ?>
        </a>
    <?php endif; ?>
	<?php if ( $post_term != 'photography' ) : ?>
        <h3><?php esc_html_e($post_title); ?></h3>
	<?php endif; ?>
</article>

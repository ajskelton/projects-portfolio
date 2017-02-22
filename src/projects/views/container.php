<?php use Ajskelton\ProjectsPortfolio\Projects\Shortcode as Shortcode; ?>

<div class="projects-portfolio--container project project-category--<?php esc_attr_e( $term_slug ); ?>">
<?php
	Shortcode\loop_and_render_projects( $query, $attributes, $config );
?>
</div>

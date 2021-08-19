<?php
/**
 * Single
 *
 * The template for displaying single-person posts.
 */
get_header(); ?>
	<main class="main-content person-one">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<!-- BEGIN of post content -->
				<div class="small-12 cell">
                    <h1 class="page-title entry__title"><?php the_title(); ?></h1>
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

                                <div class="entry__main">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div title="<?php the_title_attribute(); ?>" class="entry__thumb ">
                                            <?php the_post_thumbnail( 'large' ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="entry__content clearfix">
                                        <?php if ( $field = get_field( 'position' ) ): ?>
                                            <h6><?php echo $field; ?></h6>
                                        <?php endif; ?>
                                        <?php the_content( '', true ); ?>
                                    </div>
                                </div>
							</article>
                            <div class="entry__post">
                                <?php if ( $field = get_field( 'person_content' ) ): ?>
                                    <?php echo $field; ?>
                                <?php endif; ?>
                            </div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<!-- END of post content -->
				

			</div>
		</div>
	</main>

<?php get_footer(); ?>

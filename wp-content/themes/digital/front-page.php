<?php
get_header(); ?>

    <div class="container">
    <div class="row">
       <div class="col-sm-12">
           <?php dynamic_sidebar( 'body-1' ); ?>
       </div>
       <!-- <?php
/*        if ( have_posts() ) : while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', get_post_format() );

        endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; */?>
        -->
        <div class="col-sm-12">
            <?php
            $query = new WP_Query( array('post_type' => 'video', 'posts_per_page' => 100 ) );
            if ($query->have_posts()):?>
                <div class="container">
                    <div class="row">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="col-md-4">
                                <div class="embed-container">
                                    <?php the_field('video_from_youtube'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>


    </div>


<?php
get_footer();

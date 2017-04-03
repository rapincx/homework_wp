<?php

get_header(); ?>
    <section class="container-fluid contacts">
        <div class="container">
            <div class="row">
                <h1 class="mediafile"><?php wp_title('')?></h1>
            </div>
        </div>
    </section>
    <section class="container-fluid contacts">
        <div class="container">
            <div class="row">
                <?php
                $query = new WP_Query( array('post_type' => 'contacts', 'posts_per_page' => 100 ) );
                if ($query->have_posts()):?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-sm-4">
                        <?php the_post_thumbnail('full', 'class=img-responsive contimg'); ?>
                        <div class="region">
                            <?php the_title();?>
                        </div>
                        <div class="info">
                            <a class="name" href="#"><?php echo (get_post_meta($post->ID, 'name', true)); ?></a>
                            <?php the_content();?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
        <section class="container-fluid contacts">
            <div class="container">
                <div class="row">
                    <?php
                    $query = new WP_Query( array('post_type' => 'producer', 'posts_per_page' => 100 ) );
                    if ($query->have_posts()):?>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="col-sm-offset-4 col-sm-4" style="display: block">
                                <?php dynamic_sidebar( 'body-2' ); ?>
                                <div class="name">
                                    <a class="name" href="<?php the_permalink() ;?>"><?php the_title();?></a>
                                </div>
                                <div class="info">
                                    <?php the_content();?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>







<?php
get_footer();

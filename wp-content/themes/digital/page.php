<?php

get_header(); ?>
    <section class="container-fluid contacts">
        <div class="container">
            <div class="row">
                <h1 class="mediafile"><?php wp_title()?></h1>
            </div>
        </div>
    </section>
                <?php
                $query = new WP_Query( array('post_type' => 'director', 'posts_per_page' => 100 ) );
                if ($query->have_posts()):?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <section class="container-fluid contacts">
                            <div class="container">
                                <div class="row">
                                        <div class="col-sm-3 region">
                                            <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                                            <a class="directorname" href="<?php the_permalink() ;?>"><?php the_title();?></a>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php the_content();?>
                                            <?php the_category();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>







<?php
get_footer();

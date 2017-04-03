<?php
get_header(); ?>

<section class="container-fluid contacts">
    <div class="container">
        <div class="row">
            <h1 class="mediafile"><?php wp_title('', true, '') ?></h1>
        </div>
    </div>
</section>
<?php while ( have_posts() ) : the_post(); ?>
        <section class="container-fluid contacts">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                        <div class="placename">
                            <a class="directorname"><?php the_title();?></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        global $post;
                        $post_slug = $post->post_name;
                        $query = new WP_Query(array('post_type' => 'video',
                                                    'posts_per_page' => '1',
                                                     'tax_query' => array(
                                                         array (
                                                             'taxonomy' => 'taxonomy',
                                                             'field' => 'slug',
                                                             'terms' => $post_slug,
                                                           )
                                                       ),
                                                   ) );
                        while($query->have_posts()) : $query->the_post();?>
                            <div class="embed-container">
                                <?php the_field('video_from_youtube'); ?>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?php the_field('biography'); ?>"><?php the_title();?> BIO</a>
                    </div>
                </div>
            </div>
        </section>
<?php endwhile; ?>

<?php
get_footer();

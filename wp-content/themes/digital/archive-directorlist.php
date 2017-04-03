<?php
get_header(); ?>

    <section class="container-fluid contacts">
        <div class="container">
            <div class="row">
                <h1 class="mediafile"><?php wp_title('', true, '') ?></h1>
            </div>
        </div>
    </section>

<?php
$query = new WP_Query( array('post_type' => 'directorlist', 'posts_per_page' => 100 ) );
if ($query->have_posts()):?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <section class="container-fluid contacts">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="directorname directorlistname"><?php the_title();?></p>

                    </div>
                    <div class="col-sm-5">
                        <?php the_content();?>
                    </div>
                    <div class="col-sm-4 directorlistname arrow">
                        <a class="bio " href="<?php echo (get_post_meta($post->ID, 'link', true)); ?>"><?php echo (get_post_meta($post->ID, 'name', true)); ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

<?php
get_footer();

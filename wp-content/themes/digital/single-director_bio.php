<?php
get_header(); ?>

    <section class="container-fluid contacts">
        <div class="container">
            <div class="row">
                <h1 class="mediafile"><?php wp_title('')?></h1>
            </div>
        </div>
    </section>
<?php while (have_posts()) : the_post(); ?>
    <section class="container-fluid contacts">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                    <div class="placename">
                        <p class="directorname"><?php the_title();?></p>
                    </div>
                </div>
                <div class="col-sm-9">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php
get_footer();

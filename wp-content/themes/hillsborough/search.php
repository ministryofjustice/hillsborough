<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package hillsborough
 */
get_header();
?>
<?php get_sidebar(); ?>
<?php $s = $_GET['s']; ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <header class="page-header">
            <h1 class="page-title"><?php printf(__('Search Results for: %s', 'hillsborough'), '<span>' . get_search_query() . '</span>'); ?></h1>
        </header><!-- .page-header -->

        <?php /* Start the Loop */ ?>

        <h2>Hearings</h2>
        <?php
        $hearings_results = new WP_Query(array(
            'post_type' => 'hearing',
            's' => $s,
            'orderby' => 'meta_value',
            'meta_key' => 'hearing_date'
        ));
        ?>
        <?php if ($hearings_results->have_posts()) : ?>
            <?php while ($hearings_results->have_posts()) : $hearings_results->the_post(); ?>                        

                <?php get_template_part('content', 'search'); ?>

            <?php endwhile; ?>
        <?php else: ?>
            <p class='no-results'>No matching hearings found.</p>
        <?php endif; ?>


        <h2>Evidence</h2>
        <?php
        $evidence_results = new WP_Query(array(
            'post_type' => 'evidence',
            's' => $s
        ));
        ?>
        <?php if ($evidence_results->have_posts()) : ?>
            <?php while ($evidence_results->have_posts()) : $evidence_results->the_post(); ?>                        

                <?php get_template_part('content', 'search'); ?>

            <?php endwhile; ?>
        <?php else: ?>
            <p class='no-results'>No matching evidence found.</p>
        <?php endif; ?>

        <h2>Documents</h2>
        <?php
        $document_results = new WP_Query(array(
            'post_type' => 'document',
            's' => $s
        ));
        ?>
        <?php if ($document_results->have_posts()) : ?>
            <?php while ($document_results->have_posts()) : $document_results->the_post(); ?>                        

                <?php get_template_part('content', 'search'); ?>

            <?php endwhile; ?>       
        <?php else: ?>
            <p class='no-results'>No matching documents found.</p>
        <?php endif; ?>

        <?php //hillsborough_content_nav('nav-below'); ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>

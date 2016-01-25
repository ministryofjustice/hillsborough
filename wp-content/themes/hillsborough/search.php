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
        ));
        relevanssi_do_query($hearings_results);
        ?>
        <?php if ($hearings_results->have_posts()) : ?>
            <?php //while ($hearings_results->have_posts()) : $hearings_results->the_post(); ?>

                <?php //get_template_part('content', 'search'); ?>

                <?php

                // Check var for to see if month/year has changed
                $cur_day = $cur_month = $cur_year = null;
                // Toggle var for applying row highlight
                $highlight = true;

                // Generate list of hearings, broken down by date
                while ($hearings_results->have_posts()) {
                    $hearings_results->the_post();
                    // Tracks if current hearing date has am/pm sessions
                    $hearing_am = $hearing_pm = false;
                    if (isset($hearings_results->posts[$hearings_results->current_post + 1])) {
                        $next_post = $hearings_results->posts[ $hearings_results->current_post + 1];
                    } else {
                        $next_post = false;
                    }
                    // If the month/year has changed, print a new month/year heading
                    if (($cur_month != date("F", strtotime(get_post_meta($post->ID, 'hearing_date', true)))) || ($cur_year != date("Y", strtotime(get_post_meta($post->ID, 'hearing_date', true))))) {
                        if ($cur_month != null)
                            echo "</div></div>";
                        $cur_month = date("F", strtotime(get_post_meta($post->ID, 'hearing_date', true)));
                        $cur_year = date("Y", strtotime(get_post_meta($post->ID, 'hearing_date', true)));
                        echo "<div class='hearing-month'>";
                        echo "<h3>" . $cur_month . " " . $cur_year . "</h3>";
                        echo "<div>";
                        // Make first entry for each month have a highlight
                        $highlight = true;
                    }

                    $session = get_post_meta($post->ID, "hearing_session", true);
                    ${"hearing_$session"} = get_permalink($post->ID);
                    if ($next_post && get_post_meta($post->ID, 'hearing_date', true) == get_post_meta($next_post->ID, 'hearing_date', true)) {
                        $session = get_post_meta($next_post->ID, "hearing_session", true);
                        ${"hearing_$session"} = get_permalink($next_post->ID);
                        ?>
                        <div class='hearing-entry<?php echo ($highlight ? " shaded" : ""); ?>'>
                            <span class='hearing-date'><?php echo date('l j F Y', strtotime(get_post_meta($post->ID, 'hearing_date', true))); ?></span>
                            <span class='session-link'><a href="<?php echo $hearing_am; ?>">AM Session</a></span>
                            <span class='session-link'><a href="<?php echo $hearing_pm; ?>">PM Session</a></span>
                        </div>
                        <?php
                        $hearings_results->the_post();
                    } else {
                        ?>
                        <div class='hearing-entry<?php echo ($highlight ? " shaded" : ""); ?>'>
                            <span class='hearing-date'><?php echo date('l j F Y', strtotime(get_post_meta($post->ID, 'hearing_date', true))); ?></span>
                            <span class='session-link'><?php if ($hearing_am) { ?><a href="<?php echo $hearing_am; ?>">AM Session</a><?php } else { ?>No AM session<?php } ?></span>
                            <span class='session-link'><?php if ($hearing_pm) { ?><a href="<?php echo $hearing_pm; ?>">PM Session</a><?php } else { ?>No PM session<?php } ?></span>
                        </div>
                        <?php
                    }

                    $highlight = !$highlight;
                }
                echo "</div></div>";
                ?>

            <?php //endwhile; ?>
        <?php else: ?>
            <p class='no-results'>No matching hearings found.</p>
        <?php endif; ?>


        <h2>Evidence</h2>
        <?php
        $evidence_results = new WP_Query(array(
            'post_type' => 'evidence',
            's' => $s
        ));
        relevanssi_do_query($evidence_results);
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

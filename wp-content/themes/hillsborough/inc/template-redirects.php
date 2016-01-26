<?php

function hillsborough_kill_posts() {
    if (is_single() && get_post_type() == 'post') {
        header('HTTP/1.1 410 Gone');
        ?>

        <html>
        <body>
        <p>Sorry, that page does not exist.</p>
        <p><a href="<?php echo home_url(); ?>">Return to the Hillsborough Inquests website.</a></p>
        </body>
        </html>

        <?php
        exit;
    }
}
add_action('template_redirect', 'hillsborough_kill_posts');
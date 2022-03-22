<!-- START common/oak-comments.php -->
<section class="oak-comments oak-bg-unique-color-dark ptb-100 text-lg-left">
	<div class="container">
    <?php
        if (comments_open()) {
            comments_template();
        }
    ?>
    </div>
</section>
<!-- END common/oak-comments.php -->
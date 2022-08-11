<?php get_header(); ?>

    <section class="soon">
        <div class="container-fluid" style="background-image: url(<?php echo get_template_directory_uri() . '/src/img/soon-bg.png' ?>);">

        <div class="container">
            <img src="<?php echo get_template_directory_uri() . '/src/img/clock-left.png' ?>" class="clock-left">
            <img src="<?php echo get_template_directory_uri() . '/src/img/clock-right.png' ?>" class="clock-right"
                 alt="">
            <a href="<?php echo home_url(); ?>" class="link-back">← go home page</a>
            <div class="soon-wrapper">
                <div class="soon__text">
                    <h1>Coming soon</h1>
                    <p>Subscribe to keep up to date with new events</p>
                    <?php echo do_shortcode( '[contact-form-7 id="97" title="Subscribe our newsletter"]' ); ?>
                    <h3 class="message-span">Thank you!</h3>
<!--                    <form action="#" data-controller="">-->
<!--                        <div class="input input-wrapper required">-->
<!--                            <input type="mail" id="feedback-mail" name="MAIL" required-->
<!--                                   placeholder="E-mail ">-->
<!--                        </div>-->
<!--                        <button type="submit" class="ok_but btn">subscribe</button>-->
<!---->
<!--                    </form>-->
                </div>
            </div>
        </div>
        </div>

    </section>

<?php get_footer(); ?>

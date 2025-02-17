<?php $bastun_redux_demo = get_option('redux_demo');?>
<div class="copyright copyright--4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="copyright__left">
                    <p><?php if(isset($bastun_redux_demo['footer_copyright'])){?>
                        <?php echo html_entity_decode(esc_attr($bastun_redux_demo['footer_copyright']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Copyright © 2024 BASTUN. All Right Reserved', 'bastun' ); } ?></p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="headerarea__icon copyright__icon">
                    <ul>
                        <?php if(isset($bastun_redux_demo['facebook']) && $bastun_redux_demo['facebook'] != ''){?>
                        <li>
                            <a href="<?php echo esc_attr($bastun_redux_demo['facebook']);?>"><i class="icofont-facebook"></i></a>
                        </li>
                        <?php } ?>
                        <?php if(isset($bastun_redux_demo['twitter']) && $bastun_redux_demo['twitter'] != ''){?>
                        <li>
                            <a href="<?php echo esc_attr($bastun_redux_demo['twitter']);?>"><i class="icofont-twitter"></i></a>
                        </li>
                        <?php } ?>
                        <?php if(isset($bastun_redux_demo['skype']) && $bastun_redux_demo['skype'] != ''){?>
                        <li>
                            <a href="<?php echo esc_attr($bastun_redux_demo['skype']);?>"><i class="icofont-skype"></i></a>
                        </li>
                        <?php } ?>
                        <?php if(isset($bastun_redux_demo['linkedin']) && $bastun_redux_demo['linkedin'] != ''){?>
                        <li>
                            <a href="<?php echo esc_attr($bastun_redux_demo['linkedin']);?>"><i class="icofont-linkedin"></i></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright__arrow">
        <a href="#"><i class="icofont-arrow-up"></i></a>
    </div>
</div>
</main>
<?php wp_footer(); ?>
</body>
</html>
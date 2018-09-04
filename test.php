<?php if (is_user_logged_in()) : ?>
    <a href="<?php echo wp_logout_url(get_permalink('https://cas1.uvs.sn/cas/logout?service=http%3A%2F%2Fintranet.uvslocal.sn')); ?>">Deconnexion</a>
<?php endif;?>
<?php wp_head() ?>
    <div class="pt-3"></div>

    <!-- <footer class="container-fluid color-giants">
        <p class="text-white text-center" style="font-size: 1rem;">&copy; 2020 Zona Gigantes. Todos los derechos reservados</p>
    </footer> -->

    <footer class="container-fluid color-giants pt-4 text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-4 pt-4 text-center">
                    <img src="<?php bloginfo('template_url');?>/images/other-icons/logo-zonaGigantes.png" width="180" height="180" alt="Icono Zona Gigantes" loading="lazy">
                    <span class="navbar-brand pl-3 font-title pt-2">Zona Gigantes</span>
                </div>
                <div class="col-lg-4 col-xl-4 pl-4 pt-4 pt-sm-3 pt-md-3 text-center">
                    <span class="font-title navbar-brand">Siguenos</span>
                    <ul class="list-group footer-social">
                        <a href="https://twitter.com/zonagigantes" target="_blank" rel="nofollow" class="pt-1 text-decoration-none text-black-50">
                            <li class="list-group-item py-1">
                                <img src="<?php bloginfo('template_url');?>/images/other-icons/icon-twitter.png" width="40" height="30"></img>
                                <span class="pl-3">Twitter</span>
                            </li>
                        </a>
                        <a href="https://www.instagram.com/zonagigantes_/" target="_blank" rel="nofollow" class="pt-2 text-decoration-none text-black-50">
                            <li class="list-group-item py-1">
                                <img src="<?php bloginfo('template_url');?>/images/other-icons/logo-instagram.png" width="40" height="30"></img>
                                <span class="pl-3">Instagram</span>
                            </li>
                        </a>
                        <a href="https://www.facebook.com/ZonaGigantes1/" target="_blank" rel="nofollow" class="pt-2 text-decoration-none text-black-50">
                            <li class="list-group-item py-1">
                                <img src="<?php bloginfo('template_url');?>/images/other-icons/icon-facebook.png" width="40" height="30"></img>
                                <span class="pl-3">Facebook</span>
                            </li>
                        </a>
                        <a href="https://www.youtube.com/channel/UC9MUffNRPYDd3S2JlVXpBlw" target="_blank" rel="nofollow" class="pt-2 text-decoration-none text-black-50">
                            <li class="list-group-item py-1">
                                <img src="<?php bloginfo('template_url');?>/images/other-icons/youtube-icon.png" width="40" height="30"></img>
                                <span class="pl-3">Youtube</span>
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="col-lg-4 col-xl-4 pl-lg-5 pl-xl-5 pt-4 pt-sm-4 pt-md-4 pt-lg-3 pt-xl-3">
                    <span class="font-title navbar-brand w-100 text-center"> Secciones</span>
                    <ul class="list-unstyled footer-social">
                        <li class="text-center" style="padding: 3px;"><a href="<?php echo esc_url( get_category_link(get_cat_ID('noticias')) ); ?>" class="text-decoration-none text-white">Noticias</a></li>
                        <li class="text-center" style="padding: 3px;"><a href="<?php echo esc_url( get_category_link(get_cat_ID('cronicas')) ); ?>" class="text-decoration-none text-white">Crónicas</a></li>
                        <li class="text-center" style="padding: 3px;"><a href="<?php echo esc_url( get_category_link(get_cat_ID('videos')) ); ?>" class="text-decoration-none text-white">Videos</a></li>
                        <li class="text-center" style="padding: 3px;"><a href="<?php echo esc_url( get_category_link(get_cat_ID('equipo')) ); ?>" class="text-decoration-none text-white">Equipo</a></li>
                        <li class="text-center" style="padding: 3px;"><a href="<?php echo esc_url( get_category_link(get_cat_ID('tienda')) ); ?>" class="text-decoration-none text-white" rel="nofollow">Tienda</a></li>
                        <li class="text-center" style="padding: 3px;"><a href="<?php echo esc_url( get_category_link(get_cat_ID('contacto')) ); ?>" class="text-decoration-none text-white" rel="nofollow">Contacto</a></li>
                    </ul>

                </div>
            </div>
            <div class="row pt-3 pl-lg-5">
                <div class="col-md-12 copy">
                    <p class="text-center font-text">&copy; Copyright 2022 - Zona Gigantes.  All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</body>
</html>
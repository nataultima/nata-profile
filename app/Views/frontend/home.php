<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<!-- Featured Services Section -->
<section id="services" class="services section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p><span>Check Our</span> <span class="description-title">Services</span></p>
    </div><!-- End Section Title -->
    <div class="container">

        <div class="row gy-4">

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-speedometer2 icon"></i></div>
                    <h4><a href="" class="stretched-link">Smart Panel</a></h4>
                    <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-plug icon"></i></div>
                    <h4><a href="" class="stretched-link">Power Busway</a></h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-lightbulb icon"></i></div>
                    <h4><a href="" class="stretched-link">Energy Management</a></h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-gear-wide-connected icon"></i></div>
                    <h4><a href="" class="stretched-link">Automation</a></h4>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div>
            <!-- End Service Item -->

        </div>

    </div>

</section><!-- /Featured Services Section -->
<!-- Clients Section -->
<section id="clients" class="clients section light-background">

    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Clients</h2>
            <p>Our <span class="description-title">Clients</span></p>
        </div>
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 40
                        },
                        "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                        },
                        "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                        },
                        "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="frontend/assets/img/clients/ugm.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="frontend/assets/img/clients/uny.png" class="img-fluid" alt=""></div>
            </div>
        </div>

    </div>

</section><!-- /Clients Section -->
<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p><span>Check Our&nbsp;</span> <span class="description-title">Portfolio</span></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">Experience List</li>
                <li data-filter=".filter-product">Product</li>
                <li data-filter=".filter-list">List Product</li>
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <img src="frontend/assets/img/porto/pengalaman1.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Experience</h4>
                        <p>Experience List</p>
                        <a href="frontend/assets/img/porto/pengalaman1.png" title="Experience List" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portofolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
                <!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <img src="frontend/assets/img/product/produk1.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Product</h4>
                        <p>Floor Standing Panel</p>
                        <a href="frontend/assets/img/product/produk1.png" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portofolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <img src="frontend/assets/img/product/produk7.png" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Product</h4>
                    <p>Panel Active Harmonic Filter</p>
                    <a href="frontend/assets/img/product/produk7.png" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-list">
                    <img src="frontend/assets/img/listproduk.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Product</h4>
                        <p>List Product</p>
                        <a href="frontend/assets/img/listproduk.png" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div><!-- End Portfolio Item --><!-- End Portfolio Container -->

            </div>

        </div>

</section><!-- /Portfolio Section -->
<section id="certified" class="certified section light-background">
    <!-- Section Title -->
    <div class="section-title" data-aos="fade-up">
        <h2>Certified</h2>
        <p>Certified <span class="description-title">By</span></p>
        <!-- Logo Grid -->
        <div class="row justify-content-center align-items-center gy-4">
            <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                <img src="frontend/assets/img/certified/iso.png" class="img-fluid w-50" alt="ISO">
            </div>
        </div>
    </div>
</section>
<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container">

        <!-- Section Title -->
        <div class="section-title text-center" data-aos="fade-up">
            <h2>Contact</h2>
            <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
        </div>
        <!-- End Section Title -->

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

            <!-- Contact Info (50%) -->
            <div class="col-lg-6">
                <div class="info-wrap p-4 bg-light rounded shadow-sm">

                    <!-- Address -->
                    <div class="info-item d-flex align-items-center mb-6" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0 me-3 fs-4 text-primary"></i>
                        <div>
                            <h3 class="mb-1">Address</h3>
                            <p class="mb-0">Jl. Laksda Adisucipto No.37, Bantul 55711 Bantul Yogyakarta</p>
                        </div>
                    </div>

                    <!-- Call Us -->
                    <div class="info-item d-flex align-items-center mb-6" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0 me-3 fs-4 text-primary"></i>
                        <div>
                            <h3 class="mb-1">Call Us</h3>
                            <p class="mb-0">+62 88888888</p>
                        </div>
                    </div>

                    <!-- Email Us -->
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0 me-3 fs-4 text-primary"></i>
                        <div>
                            <h3 class="mb-1">Email Us</h3>
                            <p class="mb-0">nata@example.com</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Contact Info -->

            <!-- Google Maps (50%) -->
            <div class="col-lg-6">
                <div class="rounded shadow-sm overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.002260352298!2d110.33622679999999!3d-7.8948309000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5980ee850a9d%3A0x1eecf738ebb21e5!2sPT%20NATA%20ULTIMA%20ENGGAL!5e0!3m2!1sid!2sid!4v1740551345318!5m2!1sid!2sid"
                        frameborder="0"
                        style="border:0; width: 100%; height: 100%; min-height: 300px;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- End Google Maps -->

        </div>

    </div>
</section>
<!-- End Contact Section -->


<?= $this->endSection() ?>
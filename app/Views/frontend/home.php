<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>

<!-- Featured Services Section -->
<section id="services" class="services py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold text-uppercase">Our Services</h2>
        <p class="text-muted mb-5">Explore our <span class="text-primary fw-semibold">Professional Services</span></p>

        <div class="row g-4">
            <?php
            $services = [
                [
                    'title' => 'Smart Panel',
                    'icon' => 'bi-speedometer2',
                    'features' => [
                        'Design from France',
                        'Fully type tested to IEC 61439-1 & 2 standards',
                        'Switchboards up to 4000A, Icw 100kA rms/1s',
                        'Steel metal sheet enclosures',
                        'RAL 9001 White Color',
                        'Protection degree IP30 to IP55',
                    ]
                ],
                [
                    'title' => 'Power Busway',
                    'icon' => 'bi-plug',
                    'features' => [
                        'Busbar trunking up to 6300A',
                        'Modular & upgradeable system',
                        'Class B polyester, halogen-free with IP55',
                    ]
                ],
                [
                    'title' => 'Energy Management',
                    'icon' => 'bi-lightbulb',
                    'features' => [
                        'Complete power monitoring software',
                    ]
                ],
                [
                    'title' => 'Automation',
                    'icon' => 'bi-gear-wide-connected',
                    'features' => [
                        'Ethernet-based Programmable Automation & Safety PLC',
                    ]
                ],
            ];
            ?>

            <?php foreach ($services as $index => $service): ?>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?= 100 * ($index + 1) ?>">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body text-center">
                            <div class="icon-box bg-primary text-white rounded-circle mb-3 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi <?= $service['icon'] ?> fs-3"></i>
                            </div>
                            <h5 class="fw-bold"><?= $service['title'] ?></h5>
                            <ul class="text-start list-unstyled small mt-3 text-muted">
                                <?php foreach ($service['features'] as $feature): ?>
                                    <li><i class="bi bi-check-circle text-success me-2"></i><?= $feature ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- /Featured Services Section -->

<!-- Clients Section -->
<section id="clients" class="clients section light-background">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="fw-bold">Our Esteemed Clients</h2>
            <p class="text-muted">Trusted by <span class="text-primary">Industry Leaders</span></p>
        </div>
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 2000
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
                <?php foreach ($clients as $client): ?>
                    <div class="swiper-slide">
                        <img src="<?= base_url('uploads/clients/' . $client['image']) ?>" class="img-fluid" alt="Client Image">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section><!-- /Clients Section -->

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 class="fw-bold">Our Portfolio</h2>
        <p class="text-muted">See our <span class="text-primary">Best Works</span></p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-experience">Experience</li>
                <li data-filter=".filter-product">Product</li>
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($portfolios as $portfolio): ?>
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?= esc($portfolio['category']) ?>">
                        <div class="ratio ratio-4x3">
                            <img src="<?= base_url('uploads/portfolios/' . $portfolio['image']) ?>"
                                class="img-fluid"
                                alt="<?= esc($portfolio['title']) ?>"
                                style="object-fit: cover;">
                        </div>

                        <div class="portfolio-info">
                            <h4><?= esc($portfolio['title']) ?></h4>
                            <p><?= ucfirst($portfolio['category']) ?></p>

                            <a href="#"
                                class="preview-link"
                                data-bs-toggle="modal"
                                data-bs-target="#imageModal<?= $portfolio['id'] ?>">
                                <i class="bi bi-zoom-in"></i>
                            </a>

                            <?php if (!empty($portfolio['link'])): ?>
                                <a href="<?= esc($portfolio['link']) ?>"
                                    title="More Details"
                                    class="details-link"
                                    target="_blank">
                                    <i class="bi bi-link-45deg"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Modal with Description -->
                    <div class="modal fade" id="imageModal<?= $portfolio['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $portfolio['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= esc($portfolio['title']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="<?= base_url('uploads/portfolios/' . $portfolio['image']) ?>" class="img-fluid mb-3" alt="<?= esc($portfolio['title']) ?>">
                                    <p class="text-start text-muted"><?= nl2br(esc($portfolio['deskripsi'])) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><!-- End Portfolio Container -->
        </div>
    </div>
</section><!-- /Portfolio Section -->
<!-- Artikel -->
<section id="articles" class="articles section">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Latest Articles</h2>
        <p><span>Informasi & Insight Terbaru</span> <span class="description-title">dari Kami</span></p>
    </div>

    <div class="container">
        <div class="row gy-4">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="<?= base_url('uploads/articles/' . $article['image']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($article['title']) ?></h5>
                            <p class="card-text text-muted"><?= word_limiter($article['content'], 20) ?></p>
                        </div>
                        <div class="card-footer bg-white border-0 text-end">
                            <a href="<?= base_url('article/' . $article['slug']) ?>" class="btn btn-outline-primary btn-sm">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($articles)): ?>
            <p class="text-center text-muted">Belum ada artikel yang tersedia.</p>
        <?php endif; ?>
    </div>
</section>
<!-- end artikel section -->
<!-- Certified Section -->
<section id="certified" class="certified section light-background">
    <div class="section-title text-center" data-aos="fade-up">
        <h2>Certifications</h2>
        <p>Certified by <span class="description-title">Leading Authorities</span></p>
    </div><!-- End Section Title -->

    <div class="row justify-content-center align-items-center gy-2">
        <?php if (!empty($certifieds)): ?>
            <?php foreach ($certifieds as $certified): ?>
                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                    <img src="<?= base_url('uploads/certifieds/' . $certified['image']) ?>"
                        class="img-fluid w-50"
                        alt="<?= esc($certified['deskripsi']) ?>"
                        title="<?= esc($certified['deskripsi']) ?>">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">No certifications available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</section><!-- End Certified Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title text-center" data-aos="fade-up">
            <h2 class="fw-bold text-center">Contact Us</h2>
            <p class="text-center text-muted">Have Questions? <span class="text-primary">Get in Touch!</span></p>
        </div><!-- End Section Title -->

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
            <!-- Contact Info -->
            <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="info-wrap p-4 bg-light rounded shadow-sm w-100">
                    <!-- Address -->
                    <div class="info-item d-flex align-items-center mb-6">
                        <i class="bi bi-geo-alt flex-shrink-0 me-3 fs-4 text-primary"></i>
                        <div>
                            <h3 class="mb-1">Our Office</h3>
                            <p class="mb-0"><?= esc($setting['address'] ?? 'Address not set') ?></p>
                        </div>
                    </div>
                    <!-- Call Us -->
                    <div class="info-item d-flex align-items-center mb-6">
                        <i class="bi bi-telephone flex-shrink-0 me-3 fs-4 text-primary"></i>
                        <div>
                            <h3 class="mb-1">Phone</h3>
                            <p class="mb-0"><?= esc($setting['phone'] ?? 'Phone not set') ?></p>
                        </div>
                    </div>
                    <!-- Email Us -->
                    <div class="info-item d-flex align-items-center mb-6">
                        <i class="bi bi-envelope flex-shrink-0 me-3 fs-4 text-primary"></i>
                        <div>
                            <h3 class="mb-1">Email</h3>
                            <p class="mb-0"><?= esc($setting['email'] ?? 'Email not set') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="rounded shadow-sm overflow-hidden w-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.002260427593!2d110.3336518750061!3d-7.894830892127951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5980ee850a9d%3A0x1eecf738ebb21e5!2sPT%20NATA%20ULTIMA%20ENGGAL!5e0!3m2!1sid!2sid!4v1741052604440!5m2!1sid!2sid"
                        width="100%" height="100%" style="border: 0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Contact Section -->

<?= $this->endSection() ?>
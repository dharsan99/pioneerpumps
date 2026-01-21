<?php
include 'require/header.php';
$category_id = '31';


?>

<!-- Banner Section -->
<section class="banner-section banner-one">
  <div class="banner-carousel owl-theme owl-carousel">
    <!-- Slide Item -->
    <div class="slide-item">
      <div
        class="image-layer"
        style="background-image: url(assets/images/main-slider/slide_v1_1.jpg)"
      ></div>
      <div class="auto-container">
        <div class="content-box">
          <div class="content">
            <div class="inner">
              <div class="sub-title">Because water's a matter of the heart</div>
              <h1>
                Welcome to<br /><img
                  style="width: 40%"
                  src="assets/images/resources/logo-only-white.png"
                  alt="Awesome Image"
                />
                Pumps
              </h1>
              <div class="link-box">
                <a href="about.php" class="thm-btn">Discover More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Slide Item -->
    <div class="slide-item">
      <div
        class="image-layer"
        style="background-image: url(assets/images/main-slider/slide_v1_2.jpg)"
      ></div>
      <div class="auto-container">
        <div class="content-box">
          <div class="content">
            <div class="inner">
              <div class="sub-title">India's Trusted Agricultural Pumps</div>
              <h1>Caring for water with passion</h1>
              <div class="link-box">
                <a href="about.php" class="thm-btn">Discover More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide Item -->
    <div class="slide-item">
      <div
        class="image-layer"
        style="background-image: url(assets/images/main-slider/slide_v1_4.jpg)"
      ></div>
      <div class="auto-container">
        <div class="content-box">
          <div class="content">
            <div class="inner">
              <div class="sub-title">
                Custom Engineered Pumps for High Rise Buildings
              </div>
              <h1>Industrial Efficient &amp; Innovative</h1>
              <div class="link-box">
                <a href="about.php" class="thm-btn">Discover More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide Item -->
    <div class="slide-item">
      <div
        class="image-layer"
        style="background-image: url(assets/images/main-slider/slide_v1_5.jpg)"
      ></div>
      <div class="auto-container">
        <div class="content-box">
          <div class="content">
            <div class="inner">
              <div class="sub-title">
                The Most Reliable and Efficient pumps with Cutting-Edge
                Technology
              </div>
              <h1>Wide range of Domestic pumps</h1>
              <div class="link-box">
                <a href="about.php" class="thm-btn">Discover More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide Item -->
    <div class="slide-item">
      <div
        class="image-layer"
        style="background-image: url(assets/images/main-slider/slide_v1_3.jpg)"
      ></div>
      <div class="auto-container">
        <div class="content-box">
          <div class="content">
            <div class="inner">
              <div class="sub-title">
                No.1 Manufacturer of high speed water pumps
              </div>
              <h1>Uncompromised<br />quality &amp; Service</h1>
              <div class="link-box">
                <a href="about.php" class="thm-btn">Discover More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End Banner Section -->

<section class="about_one">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="about1_img">
          <div class="about1_shape_1"></div>
          <img src="assets/images/about/about-1-img-1.jpg" alt="About-Img" />
          <div class="about1_icon-box">
            <div class="circle">
              <span class="icon-focus"></span>
            </div>
          </div>
          <div class="about_img_2">
            <img src="assets/images/about/about-1-img-2.jpg" alt="" />
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6">
        <div class="block-title text-left">
          <p>
            About
            <img
              style="width: 120px; padding-bottom: 6px"
              src="assets/images/resources/logo-new-2.png"
              alt="Awesome Image"
            />
            Pumps
          </p>
          <h3>We’re leader in agricultural pumps</h3>
        </div>
        <div class="about_content">
          <div class="text">
            <p style="text-align: justify">
              Pioneer Products established in the year 1992 is today a
              distinguished manufacturer, supplier and exporter of wide range of
              Pumping Products under the brand name
              <img
                style="width: 120px; padding-bottom: 6px"
                src="assets/images/resources/logo-new-2.png"
                alt="Awesome Image"
              />. Since establishment, we are committed to provide our customers
              with the quickest service, the finest products, and the greatest
              value. Pumps Manufactured by us possess top class finishing, are
              highly durable and are engineered with finest grade raw material
              that is in adherence with the prescribed industry quality
              regulations and norms.
            </p>
          </div>

          <div class="bottom_text">
            <p style="text-align: justify">
              We are globalizing and exporting
              <img
                style="width: 120px; padding-bottom: 6px"
                src="assets/images/resources/logo-new-2.png"
                alt="Awesome Image"
              />
              Pumps to Middle Eastern Countries. As a trendsetter in the pumping
              field, the company has, from time to time, introduced innovations
              that have satisfied our customers. Our extensive domain knowledge
              and rich technical experience have enabled us to manufacture each
              and every product of
              <img
                style="width: 120px; padding-bottom: 6px"
                src="assets/images/resources/logo-new-2.png"
                alt="Awesome Image"
              />
              with extreme care & precision. We take pride in being accredited
              by our valid customers in commercial and as well as residential
              market for providing water pumps of superior quality. We are
              driven by quality systems in each and every aspect.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="service_one">
  <div class="container">
    <div class="block-title text-center">
      <p>Water Management Solutions</p>
      <h3>Our Products</h3>
    </div>
    <div class="row">
      <?php
                                            $SubcategoryRec = getAllRecords('subcategory','ORDER BY `tbid` DESC'); if ($SubcategoryRec && is_object($SubcategoryRec) && method_exists($SubcategoryRec, 'fetch')) { while ($SubcategoryDetails = $SubcategoryRec->fetch(PDO::FETCH_ASSOC)) { ?>

      <div class="col-xl-3 col-lg-3 col-md-6">
        <div class="service_1_single wow fadeInUp">
          <div class="content">
            <p><?php echo $SubcategoryDetails['subcategory_name'] ?></p>
          </div>
          <div class="service_1_img">
            <img
              src="https://dharsan.in/dhya_clients/pioneerpumps/PioneerPumps_latest/images/subcategory/<?php echo $SubcategoryDetails['image']; ?>"
              alt="Service Image"
            />
            <div class="hover_box">
              <a
                href="product-list.php?id=<?php echo $SubcategoryDetails['tbid']?>"
                ><span class="icon-left-arrow"></span
              ></a>
            </div>
          </div>
        </div>
      </div>

      <?php } } ?>
    </div>
  </div>
</section>

<!--<div class="brand-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="brand-one-carousel owl-carousel">
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-1.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-2.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-3.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-4.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-5.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-1.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-2.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-3.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-4.png" alt="brand"></a>
                            </div>
                            <div class="single_brand_item">
                                <a href="#"><img src="assets/images/resources/brand-1-5.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

<!--<section class="featured-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 wow slideInLeft" data-wow-delay="100ms">
                        <div class="single_featured_box">
                          <span>We are a </span>
                        </div>
                    </div>
                    <div class="col-xl-6 wow slideInRight" data-wow-delay="100ms">
                        <div class="single_featured_box">
                            <span>We have 30+ years of experience
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

<section
  class="video-one"
  style="background-image: url(assets/images/resources/video-bg-1.jpg)"
>
  <div class="container text-center">
    <p>Modern agriculture requires modern Solutions</p>
    <h3>Agriculture matters to the<br />future of development</h3>
  </div>
</section>

<section class="testimonials-one">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="testimonials_one_left">
          <div class="block-title text-left">
            <p>testimonails</p>
            <h3>What our customers are<br />talking about</h3>
          </div>
          <div class="testimonials_one_text">
            <p>
              Pioneer Products is a company that is committed to study, to
              develop and to manufacture pumps and pumping systems. We want to
              continue that which was started many years ago.
            </p>
          </div>
          <div class="project_counted wow fadeInUp" data-wow-delay="300ms">
            <div class="icon_box">
              <span class="icon-farmer"></span>
            </div>
            <div class="project-content">
              <h3 class="counter">25,00,000</h3>
              <p>Happy customers throughout the world</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6">
        <div class="testimonials_one_content">
          <div class="testimonials_one_carousel owl-theme owl-carousel">
            <div class="testimonials_one_single_item">
              <div class="text">
                <p>
                  Good customer support, Prompt response, Knowledgable, Timely
                  delivery & Installation. Very much satisfied with their
                  service. I would strongly recommend to others.
                </p>
              </div>
              <div class="client_thumbnail">
                <div class="client_img">
                  <img
                    src="assets/images/testimonials/testimonial-1-img-1.jpg"
                    alt="testimonial1-img"
                  />
                </div>
                <div class="client_title">
                  <h4>Dharsan Kumar</h4>
                  <p>Customer</p>
                </div>
              </div>
            </div>
            <div class="testimonials_one_single_item">
              <div class="text">
                <p>
                  Good customer support, Prompt response, Knowledgable, Timely
                  delivery & Installation. Very much satisfied with their
                  service. I would strongly recommend to others.
                </p>
              </div>
              <div class="client_thumbnail">
                <div class="client_img">
                  <img
                    src="assets/images/testimonials/testimonial-1-img-1.jpg"
                    alt="testimonial1-img"
                  />
                </div>
                <div class="client_title">
                  <h4>Dharsan Kumar</h4>
                  <p>Customer</p>
                </div>
              </div>
            </div>
            <div class="testimonials_one_single_item">
              <div class="text">
                <p>
                  Good customer support, Prompt response, Knowledgable, Timely
                  delivery & Installation. Very much satisfied with their
                  service. I would strongly recommend to others.
                </p>
              </div>
              <div class="client_thumbnail">
                <div class="client_img">
                  <img
                    src="assets/images/testimonials/testimonial-1-img-1.jpg"
                    alt="testimonial1-img"
                  />
                </div>
                <div class="client_title">
                  <h4>Dharsan Kumar</h4>
                  <p>Customer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="recent-project">
  <div class="container">
    <div class="block-title text-center">
      <h3>News &amp; Updates</h3>
    </div>
    <div class="row">
      <?php
                    $ProductRec = getAllRecords('news_events','ORDER BY `tbid` DESC'); if ($ProductRec && is_object($ProductRec) && method_exists($ProductRec, 'fetch')) { while ($ProductDetails = $ProductRec->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="col-xl-4 col-lg-4">
        <div class="recent_project_single wow fadeInUp" data-wow-delay="300ms">
          <div class="project_img_box">
            <img
                                src="https://dharsan.in/dhya_clients/pioneerpumps/PioneerPumps_latest/images/news_events/banner_image/<?php echo $ProductDetails['banner_image']; ?>"
              alt="Recent Project Img"
            />
            <div class="project_content">
              <h3><?php echo $ProductDetails['title']; ?></h3>
            </div>
            <div class="hover_box">
              <a href="news.php?id=<?php echo $ProductDetails['tbid']?>"
                ><span class="icon-left-arrow"></span
              ></a>
            </div>
          </div>
        </div>
      </div>

      <?php } } ?>
    </div>
  </div>
</section>

<section class="benefits">
  <div
    class="benefits_bg"
    style="background-image: url(assets/images/resources/benifits_bg.png)"
  ></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-4">
        <div class="block-title text-left">
          <p>Our benefits</p>
          <h3>
            Efficient &<br />
            Advanced Farming
          </h3>
        </div>
      </div>
      <div class="col-xl-8 d-flex">
        <div class="my-auto">
          <div class="benefits_text">
            <p style="text-align: justify">
              <img
                style="width: 120px; padding-bottom: 6px"
                src="assets/images/resources/logo-new-2.png"
                alt="Awesome Image"
              />
              pumps are excellent in performance and comes in wide range that
              includes Self Priming Pumps, Centrifugal Pumps, Open Well,
              Submersible Pumps, Jet Pumps (Regular / Packer) and Shallow well
              etc., Our
              <img
                style="width: 120px; padding-bottom: 6px"
                src="assets/images/resources/logo-new-2.png"
                alt="Awesome Image"
              />
              water pumps are widely in demand owing to its reliability,
              effective performance, long service life and reduced energy
              consumption. With over 20 years of experience in pumps
              manufacturing we have made several improvements / modifications in
              our pumps so as to suit the customer's requirements.
            </p>
          </div>
        </div>
        <!-- /.my-auto -->
      </div>
    </div>
    <div class="benefits_bottom_part">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6">
          <div class="benefits_single wow fadeInUp" data-wow-delay="300ms">
            <div class="icon-box">
              <span class="icon-tractor"></span>
            </div>
            <h3>Robust and efficient latest technology</h3>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
          <div class="benefits_single wow fadeInUp" data-wow-delay="600ms">
            <div class="icon-box">
              <span class="icon-cart"></span>
            </div>
            <h3>professional technicians</h3>
            <p></p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
          <div class="benefits_single wow fadeInUp" data-wow-delay="900ms">
            <div class="icon-box">
              <span class="icon-watering-can"></span>
            </div>
            <h3>ISO 9001:2015 certified company</h3>
            <p></p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
          <div class="benefits_single wow fadeInUp" data-wow-delay="1200ms">
            <div class="icon-box">
              <span class="icon-log"></span>
            </div>
            <h3>Distribution & service throughout india</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="product-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="product_img">
                            <img src="assets/images/resources/product-1-img-1.jpg" alt="Product One Img">
                            <div class="experience_box">
                                <h2>40 Year</h2>
                                <p>Of Experience</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="growing_product">
                            <div class="block-title text-left">
                                <p>fresh products</p>
                                <h3>Growing products</h3>
                                <div class="leaf">
                                    <img src="assets/images/resources/leaf.png" alt="">
                                </div>
                            </div>
                            <div class="growing_product_text">
                                <p>Lorem ipsum dolor sit amet nsectetur cing elit. Suspe ndisse suscipit sagittis leo
                                    sit met entum estibu dignissim posuere cubilia durae. Leo sit met entum cubilia crae
                                    onec.</p>
                            </div>
                            <div class="progress-levels">
                               
                                <div class="progress-box">
                                    <div class="inner count-box">
                                        <div class="text">Agriculture</div>
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="skill-percent">
                                                    <span class="count-text" data-speed="3000" data-stop="68">0</span>
                                                    <span class="percent">%</span>
                                                </div>
                                                <div class="bar-fill" data-percent="68"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="progress-box">
                                    <div class="inner count-box">
                                        <div class="text">Organic</div>
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="skill-percent">
                                                    <span class="count-text" data-speed="3000" data-stop="98">0</span>
                                                    <span class="percent">%</span>
                                                </div>
                                                <div class="bar-fill" data-percent="98"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

<!--  <section class="blog-one">
            <div class="container">
                <div class="block-title text-center">
                    <p>from the blog</p>
                    <h3>News & Articles</h3>
                    <div class="leaf">
                        <img src="assets/images/resources/leaf.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="blog_one_single wow fadeInUp" data-wow-delay="300ms">
                            <div class="blog_one_image">
                                <div class="blog_image">
                                    <img src="assets/images/blog/blog-1-img-1.jpg" alt="Blog One Image">
                                    <div class="blog_one_date_box">
                                        <p>30 Oct, 2019</p>
                                    </div>
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                        <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                        </li>
                                    </ul>
                                    <h3><a href="news_detail.html">Agriculture Miracle you<br>Don't Know About</a></h3>
                                    <div class="blog_one_text">
                                        <p>There are lorem ipsum is simply free many variations of ipsum the majority
                                            suffered.</p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="#"><i class="fa fa-angle-right"></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="blog_one_single wow fadeInUp" data-wow-delay="600ms">
                            <div class="blog_one_image">
                                <div class="blog_image">
                                    <img src="assets/images/blog/blog-1-img-2.jpg" alt="Blog One Image">
                                    <div class="blog_one_date_box">
                                        <p>30 Oct, 2019</p>
                                    </div>
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                        <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                        </li>
                                    </ul>
                                    <h3><a href="news_detail.html">Amount of Freak Bread<br>or Other Fruits</a></h3>
                                    <div class="blog_one_text">
                                        <p>There are lorem ipsum is simply free many variations of ipsum the majority
                                            suffered.</p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="#"><i class="fa fa-angle-right"></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="blog_one_single wow fadeInUp" data-wow-delay="900ms">
                            <div class="blog_one_image">
                                <div class="blog_image">
                                    <img src="assets/images/blog/blog-1-img-3.jpg" alt="Blog One Image">
                                    <div class="blog_one_date_box">
                                        <p>30 Oct, 2019</p>
                                    </div>
                                </div>
                                <div class="blog-one__content">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                        <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                        </li>
                                    </ul>
                                    <h3><a href="news_detail.html">Winter Wheat Harvest<br>Gathering Momentum</a></h3>
                                    <div class="blog_one_text">
                                        <p>There are lorem ipsum is simply free many variations of ipsum the majority
                                            suffered.</p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="#"><i class="fa fa-angle-right"></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

<section
  class="cta-one"
  style="background-image: url(assets/images/resources/cta_one_bg-1.jpg)"
>
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="cta_one_content">
          <h1>
            <img
              style="width: 300px; padding-bottom: 16px"
              src="assets/images/resources/logo-only-white.png"
              alt="Awesome Image"
            />
            Provides you with Highest Quality Pumps<br />that Meets your
            Expectation
          </h1>
          <p>
            Aqualand is a trusted brand throughout India. State of the art
            Customer service with 8+ Regional branches
          </p>
          <div class="cta_one__button-block">
            <a href="quality.php" class="thm-btn cta_one__btn">Discover More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include 'require/footer.php'
?>

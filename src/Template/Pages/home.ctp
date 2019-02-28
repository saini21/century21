<?= $this->element('book_an_appointment') ?>

<div class="float-left w-100 banner-bg p-tb-80">
    <img class="bnr-arrow" src="<?=SITE_URL; ?>img/bnr-arrow.svg">
    <canvas id="canvas" style="position:absolute; top: 0; z-index: 100; pointer-events: none; left: 0px; width: 100%; height: 100%;"></canvas>
    <script type="text/javascript">
        window.onload=function(){function a(){t.clearRect(0,0,d,o),t.fillStyle="rgba(230, 230, 230, 1)",t.beginPath();for(var a=0;h>a;a++){var n=e[a];t.moveTo(n.x,n.y),t.arc(n.x,n.y,n.r,0,2*Math.PI,!0)}t.fill(),r()}function r(){M+=.01;for(var a=0;h>a;a++){var r=e[a];r.y+=Math.cos(M+r.d)+1+r.r/2,r.x+=2*Math.sin(M),(r.x>d+5||r.x<-5||r.y>o)&&(a%3>0?e[a]={x:Math.random()*d,y:-10,r:r.r,d:r.d}:Math.sin(M)>0?e[a]={x:-5,y:Math.random()*o,r:r.r,d:r.d}:e[a]={x:d+5,y:Math.random()*o,r:r.r,d:r.d})}}var n=document.getElementById("canvas"),t=n.getContext("2d"),d=window.innerWidth,o=window.innerHeight;n.width=d,n.height=o;for(var h=25,e=[],i=0;h>i;i++)e.push({x:Math.random()*d,y:Math.random()*o,r:4*Math.random()+1,d:Math.random()*h});var M=0;setInterval(a,33)};
    </script>
    <div class="banner-outer">
        <div class="banner-left">
            <h4 class="float-left w-100"> find properties </h4>
            <div class="banner-search float-left w-100">
                <input type="text" name="" placeholder="City, Neighbourhood, Address, School, Postal Code, MLS®#">
                <button class="btn bnr-srh-btn"> Search <i class="fas fa-search"></i> </button>
            </div>
        </div>
        <div class="banner-right">
            
            <div class="bnr-img">
                <?php if(strtolower($content['Banner Preffrence Video / Image']) == "image") { ?>
                    <img src="<?=SITE_URL; ?><?= $content['Banner Image']; ?>">
                <?php } else {  ?>
                        //Video will be here
                        <?= $content['Banner Video']; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="float-left w-100 p-tb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="row align-items-center">
                    <div class="col-sm-6 agent-img">
                        <div class="img-cul-inr">
                            <img src="<?=SITE_URL; ?><?= $content['My Image']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 agent-left-content">
                        <h4 class="title"> <?= $content['My Name']; ?> </h4>
                        <h5> <?= $content['My Designation']; ?> </h5>
                        <ul class="float-left w-100">
                            <li>
                                <a href="tel:+1(647)2977179"> <i class="fas fa-phone"></i> <?= $content['My Phone Number']; ?> </a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 agent-right-content">
                <h4> <?= $content['Investing in real estate heading']; ?></h4>
                <p>
                    <?= $content['Investing in real estate content']; ?>
                </p>
                <a class="btn btn-large" href="#" data-toggle="modal" data-target="#bookAnAppointment"> Book an Appointment </a>
            </div>
        </div>
    </div>
</div>

<div class="float-left w-100 p-tb-80 bg-grey">
    <div class="container">
        <div class="float-left w-100 common-heading text-center">
            <h4 class="heading"> Our Office Featured Listings </h4>
        </div>
        <div class="float-left w-100">
            <div class="owl-carousel">
                <div>
                    <div class="block-slider-img">
                        <span class="block-sale"> For sale </span>
                        <img src="<?=SITE_URL; ?>img/categories-1.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li>
                                <i class="fas fa-bed"></i>
                                <p> 3 bedroom </p>
                            </li>
                            <li>
                                <i class="fas fa-bath"></i>
                                <p> 3 bathroom </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> $2.500.000 </h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="block-slider-img">
                        <span class="block-sale"> For sale </span>
                        <img src="<?=SITE_URL; ?>img/categories-2.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li>
                                <i class="fas fa-bed"></i>
                                <p> 3 bedroom </p>
                            </li>
                            <li>
                                <i class="fas fa-bath"></i>
                                <p> 3 bathroom </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> $2.500.000 </h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="block-slider-img">
                        <span class="block-sale"> For sale </span>
                        <img src="<?=SITE_URL; ?>img/categories-3.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li>
                                <i class="fas fa-bed"></i>
                                <p> 3 bedroom </p>
                            </li>
                            <li>
                                <i class="fas fa-bath"></i>
                                <p> 3 bathroom </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> $2.500.000 </h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="block-slider-img">
                        <span class="block-sale"> For sale </span>
                        <img src="<?=SITE_URL; ?>img/categories-4.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li>
                                <i class="fas fa-bed"></i>
                                <p> 3 bedroom </p>
                            </li>
                            <li>
                                <i class="fas fa-bath"></i>
                                <p> 3 bathroom </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> $2.500.000 </h2>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>

<div class="float-left w-100 p-tb-80">
    <div class="container">
        <div class="float-left w-100 common-heading text-center">
            <h4 class="heading"> Featured Pre-Construction Projects </h4>
        </div>
        <div class="float-left w-100">
            <div class="owl-carousel">
                <div>
                    <div class="block-slider-img">
                        <img src="<?=SITE_URL; ?>img/categories-3.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li class="text-left">
                                <p> Type: High Rise </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> Occupy : 2018 </h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="block-slider-img">
                        <img src="<?=SITE_URL; ?>img/categories-4.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li class="text-left">
                                <p> Type: High Rise </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> Occupy : 2018 </h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="block-slider-img">
                        <img src="<?=SITE_URL; ?>img/categories-5.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li class="text-left">
                                <p> Type: High Rise </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> Occupy : 2018 </h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="block-slider-img">
                        <img src="<?=SITE_URL; ?>img/categories-6.jpg">
                    </div>
                    <div class="block-slider-content float-left w-100">
                        <h4 class="title"> <i class="fas fa-map-marker-alt"></i> 1929 - 165 Legion Rd </h4>
                        <h5 class="title"> <i class="fas fa-city"></i> Toronto </h5>
                        <ul class="float-left w-100">
                            <li class="text-left">
                                <p> Type: High Rise </p>
                            </li>
                        </ul>
                        <div class="review-outer float-left w-100">
                            <div class="review-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review-btn">
                                <h2> Occupy : 2018 </h2>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>

<div class="float-left w-100 p-tb-80 bg-grey">
    <div class="container">
        <div class="text-center">
            <div class="float-left w-100 common-heading text-center">
                <h4 class="heading"> Additional tools </h4>
            </div>
            <div class="text-center add-block-outer">
                <i class="fas fa-home"></i>
                <h4> Find Your Dream Home </h4>
            </div>
            <div class="text-center add-block-outer">
                <i class="fas fa-bell"></i>
                <h4> Neighbourhood Buzzer </h4>
            </div>
            <div class="text-center add-block-outer">
                <i class="fas fa-map-marker-alt"></i>
                <h4> Map Search </h4>
            </div>
            <div class="text-center add-block-outer">
                <i class="far fa-check-circle"></i>
                <h4> Free Home Evaluation </h4>
            </div>
        </div>
    </div>
</div>

<div class="float-left w-100 p-tb-80">
    <div class="container">
        <div class="row justify-content-center real-report">
            <div class="col-lg-12">
                <div class="float-left w-100 common-heading text-center">
                    <h4 class="heading"> Free Real Estate Reports </h4>
                </div>
            </div>
            <div class="col-lg-4 inp-out">
                <input class="form-control" type="text" name="" placeholder="Enter Your Name">
            </div>
            <div class="col-lg-4 inp-out">
                <input class="form-control" type="text" name="" placeholder="Enter Your Email">
            </div>
            <div class="col-lg-2">
                <input class="float-left w-100 btn" type="submit" name="">
            </div>
        </div>
    </div>
</div>

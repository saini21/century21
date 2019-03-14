<div class="header-outer">
    
    <div class="float-left w-100 header-top">
        <div class="header-name-outer">
            <img src="<?=SITE_URL; ?><?= $header['Top Left Logo'] ?>">
            <h4> <span><?= $header['Top Left Name'] ?></span> </h4>
        </div>
        <div class="header-phone-outer text-right">
            <ul>
                <li>
                    <a href="tel:+1(647)2977179"> <i class="fas fa-phone"></i> <?= $header['Top Right Phone Number'] ?> </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="float-left w-100">
        <div class="">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="<?= SITE_URL; ?>"><img src="<?=SITE_URL; ?>img/lg.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i> </span>
                </button>
                <div class="collapse navbar-collapse flex-row-reverse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Featured Listings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Find Property</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Find Commercial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']); ?>">About me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>">Contact me</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

</div>

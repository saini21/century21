<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= SITE_TITLE ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    
    <script type="text/javascript">
        var SITE_URL = '<?= SITE_URL ?>';
    </script>
    
    
    <?= $this->Html->css([
        'bootstrap',
        'owl.carousel.min',
        'owl.theme.default.min',
        'css/all.min',
        'style'
        
    ]) ?>
    
    
    
    <?= $this->Html->script([
        'jquery.3.3.1.min',
        'bootstrap',
        'owl.carousel.min',
        'jquery.validate.min',
        'custom',
    ]) ?>
    
    
    
    <?= $this->fetch('script') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
<main>
    <?= $this->element('default_header') ?>
    <main class="container-fluid px-0 g-pt-65">
        <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
            <?= $this->element('default_sidebar') ?>
            <?= $this->Flash->render() ?>
            <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
                <section class="g-pa-20">
                    <section class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md g-mb-30">
                        <?= $this->fetch('content') ?>
                    </section>
                </section>
                <?= $this->element('default_footer') ?>
            </div>
        </div>
    </main>
</main>
<script>
    $(document).on('ready', function () {
        // initialization of custom select
        $('.js-select').selectpicker();
        
        // initialization of hamburger
        $.HSCore.helpers.HSHamburgers.init('.hamburger');
        
        // initialization of charts
        $.HSCore.components.HSAreaChart.init('.js-area-chart');
        $.HSCore.components.HSDonutChart.init('.js-donut-chart');
        $.HSCore.components.HSBarChart.init('.js-bar-chart');
        
        // initialization of sidebar navigation component
        $.HSCore.components.HSSideNav.init('.js-side-nav', {
            afterOpen: function () {
                setTimeout(function () {
                    $.HSCore.components.HSAreaChart.init('.js-area-chart');
                    $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                    $.HSCore.components.HSBarChart.init('.js-bar-chart');
                }, 400);
            },
            afterClose: function () {
                setTimeout(function () {
                    $.HSCore.components.HSAreaChart.init('.js-area-chart');
                    $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                    $.HSCore.components.HSBarChart.init('.js-bar-chart');
                }, 400);
            }
        });
        
        // initialization of range datepicker
        $.HSCore.components.HSRangeDatepicker.init('#rangeDatepicker, #rangeDatepicker2, #rangeDatepicker3');
        
        
        // initialization of HSDropdown component
        $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});
        
        // initialization of custom scrollbar
        $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));
        
    });
</script>

</body>
</html>

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
        'animate',
        'owl.carousel.min',
        'owl.theme.default.min',
        'all.min',
        'style'
    
    ]) ?>
    
    
    
    <?= $this->Html->script([
        'jquery.3.3.1.min',
        'bootstrap',
        'owl.carousel.min',
        'jquery.validate.min',
        'wow.min',
        'custom',
    ]) ?>
    
    
    
    <?= $this->fetch('script') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
</body>
</html>

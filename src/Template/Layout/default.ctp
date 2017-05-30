<?php
use Cake\Core\Configure;

if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s">', Configure::read('App.language'));
    $this->end();
}

if (!$this->fetch('title') && Configure::read('App.title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}
// Always append App.title to current page title
elseif ($this->fetch('title') && Configure::read('App.title')) {
    $this->append('title', sprintf(' | %s', Configure::read('App.title')));
}

// Prepend some meta tags
$this->prepend('meta', $this->Html->meta('icon'));
$this->prepend('meta', $this->Html->meta('viewport', 'width=device-width, initial-scale=1'));
if (Configure::read('App.author')) {
    $this->prepend('meta', $this->Html->meta('author', null, [
        'name'    => 'author',
        'content' => Configure::read('App.author')
    ]));
}

// Prepend scripts required by the navbar
$this->prepend('script', $this->Html->script([
    '//code.jquery.com/jquery-2.1.1.min.js',
    '/js/transition',
    '/js/collapse',
    '/js/dropdown',
    '/js/alert'
]));

?>
<!DOCTYPE html>
<?= $this->fetch('html'); ?>
<head>
    <?= $this->Html->charset(); ?>
    <?= $this->Html->css(['footer']);?>
    
    <title>
        German - Movie Collection - <?= $this->fetch('title'); ?>
    </title>
    <?php
        // Meta
        echo $this->fetch('meta');

        // Styles
        echo $this->Less->less([
            'Bootstrap.less/bootstrap.less'
            // 'Bootstrap.less/cakephp/styles.less'
        ]);
        echo $this->fetch('css');

        // Sometimes we'll want to send scripts to the top (rarely..)
        echo $this->fetch('script.top');
    ?>
</head>
<body>
    <?php echo $this->element('header'); ?>
        
    <div class="container">
        <div id="content" class="row">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content'); ?>
        </div>
    </div>

    <?= $this->fetch('script'); ?>
    <?= $this->element('footer'); ?>
</body>
</html>

<?php $title = 'Dashboard | CIS'; ?>
<?php ob_start();?>

<h1>Dashboard</h1>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__.'/../layouts/app.php'; ?>
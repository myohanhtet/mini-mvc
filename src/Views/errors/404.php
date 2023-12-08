<?php $title = '404 | Not Found'; ?>
<?php ob_start(); ?>
<div class="page-error tile">
    <h1 class="text-danger"><i class="bi bi-exclamation-circle"></i> Error 404: Page not found</h1>
    <p>The page you have requested is not found.</p>
    <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__.'/../layouts/app.php'; ?>

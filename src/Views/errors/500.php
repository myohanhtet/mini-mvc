<?php $title = '500 | Internal Server Error'; ?>
<?php ob_start(); ?>
<div class="page-error tile">
    <h1 class="text-danger"><i class="bi bi-exclamation-circle"></i> Error 500: Internal Server Error</h1>
    <p>Your request cannot be completed due to a server error.</p>
    <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__.'/../layouts/app.php'; ?>

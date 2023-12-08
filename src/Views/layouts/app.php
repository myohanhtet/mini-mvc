<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title><?php echo $title ?? 'CIS - Web' ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="description" content=""/>
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/toastr.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/select2-bootstrap-5-theme.min.css"/>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.ico/">
    <meta name="theme-color" content="">
    <link rel="manifest" href="/manifest.webmanifest">
</head>
<body class="app sidebar-mini">
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<main class="app-content">
    <?php
    // Display flash messages
    $successMessage = \Myohanhtet\Libs\Flash::get('success');
    $validateError = \Myohanhtet\Libs\Flash::get('validateError');
    $error = \Myohanhtet\Libs\Flash::get('error');
    $warning = \Myohanhtet\Libs\Flash::get('warning');

    if ($successMessage) {
        echo '<div class="alert alert-success mt-2">' . $successMessage . '</div>';
    }elseif ($validateError) {
        echo '<div class="alert alert-warning mt-2">';
        foreach ($validateError as $error)
        {
            echo '<li>'.$error.'</li>';
        }
        echo '</div>';
    } elseif ($error) {
        echo '<div class="alert alert-danger mt-2">' . $error . '</div>';
    } elseif ($warning) {
        echo '<div class="alert alert-warning mt-2">' . $error . '</div>';
    }
    ?>
    <?php echo $content ?? '' ?>
</main>
<!--[if IE]><div style="width: 100%; position: fixed; z-index: 1000; bottom: 0; left: 0; background: lightgray;"><p>Outdated browser dectected. Please use a modern browser for a better browsing experience.</p><div onClick="parentNode.remove()">Close [X]</div></div><![endif]-->
<script src="/js/jquery-3.7.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/toastr.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/select2.full.min.js"></script>
</body>
</html>
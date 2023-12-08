<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login | CIS </title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/favicon/apple-touch-icon.png/">
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.ico">
    <meta name="theme-color" content="">
    <link rel="manifest" href="manifest.webmanifest">
</head>
<body>

<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>Clinical Information System</h1>
<!--        <h3>Web Portal</h3>-->
    </div>
    <div class="login-box">
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
        <form class="login-form" method="POST" action="/login/post">
            <h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN IN</h3>
            <div class="mb-3">
                <label class="form-label">User Code</label>
                <input class="form-control" name="user_code" type="text" placeholder="User Code" autofocus required autocomplete="user_code">
            </div>
            <div class="mb-3">
                <label class="form-label">PASSWORD</label>
                <input class="form-control" name="password" type="password" placeholder="Password" required autocomplete="current-password">
            </div>
            <div class="mb-3">
                <div class="utility">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input name="remember" class="form-check-input" type="checkbox"><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3 btn-container d-grid">
                <button class="btn btn-primary btn-block"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>SIGN IN</button>
            </div>
        </form>
    </div>
</section>

<script src="/js/jquery-3.7.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>


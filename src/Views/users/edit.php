<?php $title = 'Create User | CIS'; ?>
<?php ob_start(); ?>
<div class="tile">
    <h3 class="tile-title">User Form</h3>
    <form action="/users/<?php echo $data['id'] ?>/update" method="POST">
        <div class="tile-body">
            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label">Name</label>
                    <input class="form-control " value="<?php echo $data['name'] ?>" name="name" type="text" required="" placeholder="Enter Name">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">User Code</label>
                    <input class="form-control " value="<?php echo $data['user_code'] ?>" name="user_code" type="text" required="" placeholder="Enter full name">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Password</label>
                    <input class="form-control " value="" name="password" type="password" placeholder="Enter password">
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and numbers, and must include at least one special character.
                    </div>
                </div>
            </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/users"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__.'/../layouts/app.php'; ?>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?php echo $_SESSION['user_code'] ?></p>
            <p class="app-sidebar__user-designation">CIS</p>
        </div>
    </div>
    <?php include 'menu.php'; ?>
</aside>

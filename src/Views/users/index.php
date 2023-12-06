<?php $title = 'Users | CIS'; ?>
<?php ob_start(); ?>
    <div class="tail">
        <div class="card mt-2">
            <div class="card-header">
                <span>Users</span>
                    <a href="/users/create" class="text-end btn btn-primary">
                        <i class="bi bi-plus-square me-2"></i> Add Users</a>
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>User Code</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php foreach ($data as $user) {
                        echo "<tr class='text-center'>";
                        echo "<td>". $user['name'] ."</td>";
                        echo "<td>". $user['user_code']."</td>";
                        echo "<td>". $user['created_at']."</td>";
                        echo '<td class="text-center"><div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                  <a type="button" href="'."users/".$user['id']."/show".'" class="btn btn-outline-info"><i class="bi bi-eye-fill"></i></a>
                  <a type="button" href="'."users/".$user['id']."/edit".'" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></a>
                  <a type="button" href="'."users/".$user['id']."/delete".'" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
                </div></td>';
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__.'/../layouts/app.php'; ?>
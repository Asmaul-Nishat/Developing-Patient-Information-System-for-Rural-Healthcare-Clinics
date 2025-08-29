<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../php/functions.php';
require_once '../php/db.php';
checkLogin();
checkRole('Admin');


// Fetch all users with roles
$stmt = $pdo->query("SELECT u.id, u.fullname, u.email, r.name AS role 
                     FROM users u
                     JOIN user_roles ur ON u.id = ur.user_id
                     JOIN roles r ON ur.role_id = r.id
                     ORDER BY u.id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
<div class="row">
<nav class="col-md-2 bg-light vh-100 p-3">
<h4>Admin Menu</h4>
<ul class="nav flex-column">
<li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
<li class="nav-item"><a class="nav-link" href="#">Manage Users</a></li>
<li class="nav-item"><a class="nav-link" href="#">Appointments</a></li>
<li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
</ul>
</nav>

<main class="col-md-10 p-4">
<h1>Welcome, Admin!</h1>
<h3>All Users</h3>
<table class="table table-bordered mt-3">
<thead class="table-light">
<tr>
<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Role</th>
</tr>
</thead>
<tbody>
<?php foreach($users as $user): ?>
<tr>
<td><?= $user['id']; ?></td>
<td><?= htmlspecialchars($user['fullname']); ?></td>
<td><?= htmlspecialchars($user['email']); ?></td>
<td><?= $user['role']; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</main>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php require_once __DIR__ . '/../layout/header.php'; ?>

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php?controller=auth&action=login');
    exit;
}
?>

<div class="container mt-5">
    <h2>Listado de Ciudades</h2>
    <a href="index.php?controller=city&action=create" class="btn btn-success mb-3">Agregar Ciudad</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>Ciudad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($cities as $city): ?>
                <tr>
                    <td><?= htmlspecialchars($city['city']) ?></td>
                    <td>
                        <a href="index.php?controller=city&action=edit&id=<?= $city['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?controller=city&action=delete&id=<?= $city['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta ciudad?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<a href="index.php?controller=auth&action=logout" style="color: red; float: right;">Cerrar sesión</a>


<?php require_once __DIR__ . '/../layout/footer.php'; ?>

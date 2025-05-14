<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-5">
    <h2>Agregar Ciudad</h2>
    <form method="POST" action="index.php?controller=city&action=create">
        <div class="mb-3">
            <label for="city" class="form-label">Nombre de la ciudad</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="index.php?controller=city&action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
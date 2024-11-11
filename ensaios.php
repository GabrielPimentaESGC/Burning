<?php
include 'db_config.php';
include 'templates/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $local = $_POST['local'];
    $musicas = implode(", ", $_POST['musicas']);

    $sql = "INSERT INTO ensaios (data, hora, local, musicas) VALUES ('$data', '$hora', '$local', '$musicas')";
    $conn->query($sql);
}

$ensaios = $conn->query("SELECT * FROM ensaios");
?>

<div class="container mt-5">
    <h2>Ensaios</h2>
    <form method="POST">
        <input type="date" class="form-control mb-2" name="data" required>
        <input type="time" class="form-control mb-2" name="hora" required>
        <input type="text" class="form-control mb-2" name="local" placeholder="Local" required>
        <input type="text" class="form-control mb-2" name="musicas" placeholder="Músicas (separadas por vírgula)" required>
        <button type="submit" class="btn btn-primary">Criar Ensaio</button>
    </form>

    <ul class="list-group mt-4">
        <?php while ($row = $ensaios->fetch_assoc()) { ?>
            <li class="list-group-item">
                <?php echo "{$row['data']} - {$row['hora']} @ {$row['local']}"; ?>
                <br>Músicas: <?php echo $row['musicas']; ?>
            </li>
        <?php } ?>
    </ul>
</div>

<?php include 'templates/footer.php'; ?>

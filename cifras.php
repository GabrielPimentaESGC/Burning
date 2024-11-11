<?php
include 'db_config.php';
include 'templates/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdf'])) {
    $fileName = $_FILES['pdf']['name'];
    $fileTmpName = $_FILES['pdf']['tmp_name'];
    $uploadPath = "assets/pdfs/" . basename($fileName);

    if (move_uploaded_file($fileTmpName, $uploadPath)) {
        $sql = "INSERT INTO cifras (titulo, arquivo) VALUES ('$fileName', '$uploadPath')";
        $conn->query($sql);
    }
}

$cifras = $conn->query("SELECT * FROM cifras");
?>

<div class="container mt-5">
    <h2>Cifras</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="file" class="form-control" name="pdf" accept=".pdf">
        </div>
        <button type="submit" class="btn btn-success">Upload Cifra</button>
    </form>

    <ul class="list-group mt-4">
        <?php while ($row = $cifras->fetch_assoc()) { ?>
            <li class="list-group-item">
                <a href="<?php echo $row['arquivo']; ?>" download><?php echo $row['titulo']; ?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<?php include 'templates/footer.php'; ?>

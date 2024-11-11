<?php include 'templates/header.php'; ?>
<div class="container mt-5 text-center">
    <h2>Selecione o Usuário</h2>
    <form method="POST" action="cifras.php">
        <select class="form-select w-50 mx-auto my-4" name="user">
            <option value="Sanches">Sanches</option>
            <option value="Pimenta">Pimenta</option>
            <option value="Tiago">Tiago</option>
            <option value="Simão">Simão</option>
        </select>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<?php include 'templates/footer.php'; ?>

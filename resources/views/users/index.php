<header>
    <div class="container">
        <h1>Index de usuario</h1>
        <div class="offset-4 col-4">
            <?php if (empty($users)): ?>
                <div>
                    No hay usuarios registrados
                </div>
            <?php else:?>
                <div>
                    Si hay datos
                    <?php for ($i = 0; $i < count($users); $i++): ?>
                        <p><?= $i +1 ?></p>
                        <br>
                        <p><?= $users[$i]['name'] ?></p>
                        <br>
                        <p><?= $users[$i]['email'] ?></p>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

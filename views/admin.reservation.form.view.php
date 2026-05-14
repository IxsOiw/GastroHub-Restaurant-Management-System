
<?php require __DIR__ . '/partials/admin-head.php'; ?>

<body>
<div class="admin-layout">

    <?php require __DIR__ . '/partials/admin-header.php'; ?>
    <?php require __DIR__ . '/partials/admin-sidebar.php'; ?>

    <main class="admin-main">
    <div class="card">
        <div class="card-header">
            <div class="card-title"><?= isset($reservation) ? 'Upraviť rezerváciu' : 'Nová rezervácia' ?></div>
        </div>

        <form method="POST" action="<?= isset($reservation) ? '/admin/reservation/update' : '/admin/reservation/store' ?>">
            <?php if (isset($reservation)): ?>
                <input type="hidden" name="id" value="<?= $reservation['reservation_id'] ?>">
            <?php endif; ?>

            <div class="form-group">
                <label>Meno</label>
                <input type="text" name="name" value="<?= isset($reservation) ? htmlspecialchars($reservation['name']) : '' ?>">
            </div>
            <div class="form-group">
                <label>Telefón</label>
                <input type="text" name="phone" value="<?= isset($reservation) ? htmlspecialchars($reservation['phone']) : '' ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= isset($reservation) ? htmlspecialchars($reservation['email']) : '' ?>">
            </div>
            <div class="form-group">
                <label>Stôl</label>
                <select name="table_id">
                    <?php foreach ($tables as $table): ?>
                        <option value="<?= $table['table_id'] ?>" <?= isset($reservation) && $reservation['table_id'] == $table['table_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($table['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Dátum</label>
                <input type="date" name="date" value="<?= isset($reservation) ? $reservation['date'] : '' ?>">
            </div>
            <div class="form-group">
                <label>Čas</label>
                <input type="time" name="time" value="<?= isset($reservation) ? $reservation['time'] : '' ?>">
            </div>
            <div class="form-group">
                <label>Počet hostí</label>
                <input type="number" name="guests" value="<?= isset($reservation) ? $reservation['number_of_guests'] : '' ?>">
            </div>
            <div class="form-group">
                <label>Poznámka</label>
                <textarea name="note"><?= isset($reservation) ? htmlspecialchars($reservation['note']) : '' ?></textarea>
            </div>

            <button type="submit" class="btn btn-success">Uložiť</button>
            <a href="/admin" class="btn btn-outline">Zrušiť</a>
        </form>
    </div>


    </main>

</div>
</body>
</html>


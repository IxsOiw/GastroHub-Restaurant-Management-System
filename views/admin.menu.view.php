<?php require __DIR__ . '/partials/admin-head.php'; ?>

<body>
<div class="admin-layout">

    <?php require __DIR__ . '/partials/admin-header.php'; ?>
    <?php require __DIR__ . '/partials/admin-sidebar.php'; ?>

    <main class="admin-main">

        <div class="card-header" style="margin-bottom: 20px;">
            <div class="card-title">Menu položky</div>
            <a href="/admin/menu/create" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Pridať položku
            </a>
        </div>

        <div class="card">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Názov</th>
                        <th>Kategória</th>
                        <th>Cena</th>
                        <th>Dostupnosť</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['category_name']) ?></td>
                        <td style="font-weight:800; color:var(--primary)">€<?= number_format($item['price'], 2) ?></td>
                        <td>
                            <?php if ($item['available']): ?>
                                <span class="badge badge-confirmed">Dostupné</span>
                            <?php else: ?>
                                <span class="badge badge-cancelled">Nedostupné</span>
                            <?php endif; ?>
                        </td>
                        <td style="display:flex; gap:8px;">
                            <a href="/admin/menu/edit?id=<?= $item['food_id'] ?>" class="btn btn-outline btn-sm">Upraviť</a>

                            <form method="POST" action="/admin/menu/delete" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $item['food_id'] ?>">
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Naozaj zmazať?')">🗑</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>

</div>
</body>
</html>

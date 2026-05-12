<?php require __DIR__ . '/partials/admin-head.php'; ?>

<body>
<div class="admin-layout">

    <?php require __DIR__ . '/partials/admin-header.php'; ?>
    <?php require __DIR__ . '/partials/admin-sidebar.php'; ?>

    <main class="admin-main">

        <div class="card-header" style="margin-bottom: 20px;">
            <div class="card-title"><?= isset($item) ? 'Upraviť položku' : 'Nová položka' ?></div>
            <a href="/admin/menu" class="btn btn-outline">← Späť</a>
        </div>

        <div class="card" style="padding: 24px;">
            <form method="POST" action="<?= isset($item) ? '/admin/menu/update' : '/admin/menu/store' ?>">

                <?php if (isset($item)): ?>
                    <input type="hidden" name="id" value="<?= $item['food_id'] ?>">
                <?php endif; ?>

                <div style="margin-bottom: 16px;">
                    <label style="display:block; margin-bottom:6px;">Názov</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($item['name'] ?? '') ?>" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:6px;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display:block; margin-bottom:6px;">Popis</label>
                    <textarea name="description" rows="3" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:6px;"><?= htmlspecialchars($item['description'] ?? '') ?></textarea>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display:block; margin-bottom:6px;">Cena (€)</label>
                    <input type="number" name="price" step="0.01" min="0" value="<?= $item['price'] ?? '' ?>" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:6px;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display:block; margin-bottom:6px;">Kategória</label>
                    <select name="food_category_id" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:6px;">
                        <option value="">-- vyber --</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['food_category_id'] ?>" 
                                <?= (isset($item) && $item['food_category_id'] == $cat['food_category_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="margin-bottom: 24px;">
                    <label style="display:flex; align-items:center; gap:8px;">
                        <input type="checkbox" name="available" value="1" <?= (!isset($item) || $item['available']) ? 'checked' : '' ?>>
                        Dostupné
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <?= isset($item) ? 'Uložiť zmeny' : 'Pridať položku' ?>
                </button>

            </form>
        </div>

    </main>

</div>
</body>
</html>

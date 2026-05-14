<?php require __DIR__ . '/partials/admin-head.php'; ?>

<body>
<div class="admin-layout">

    <?php require __DIR__ . '/partials/admin-header.php'; ?>
    <?php require __DIR__ . '/partials/admin-sidebar.php'; ?>

    <main class="admin-main">

        <div class="card-header" style="margin-bottom: 20px;">
            <div class="card-title">Objednávky</div>
        </div>

        <div class="card">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Zákazník</th>
                        <th>Telefón</th>
                        <th>Položky</th>
                        <th>Dátum</th>
                        <th>Stav</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>#<?= $order['order_id'] ?></td>
                        <td><?= htmlspecialchars($order['name']) ?></td>
                        <td><?= htmlspecialchars($order['phone']) ?></td>
                        <td><?= htmlspecialchars($order['items'] ?? '-') ?></td>
                        <td><?= date('d.m.Y H:i', strtotime($order['created_at'])) ?></td>
                        <td>
                            <?php
                            $statusMap = [
                                'Prijatá'        => 'badge-new',
                                'Pripravuje sa'  => 'badge-pending',
                                'Doručená'       => 'badge-confirmed',
                                'Zrušená'        => 'badge-cancelled',
                            ];
                        $statusName  = $order['status_name'] ?? 'Prijatá';
                        $badgeClass  = $statusMap[$statusName] ?? 'badge-new';
                        ?>
                            <span class="badge <?= $badgeClass ?>"><?= $statusName ?></span>
                        </td>
                        <td>
                            <form method="POST" action="/admin/orders/update-status" style="display:flex; gap:6px;">
                                <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                <select name="status_id" class="input" style="padding:4px 8px;">
                                    <option value="1">Prijatá</option>
                                    <option value="2">Pripravuje sa</option>
                                    <option value="3">Doručená</option>
                                    <option value="4">Zrušená</option>
                                </select>
                                <button class="btn btn-primary btn-sm">Uložiť</button>
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

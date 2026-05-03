<?php require __DIR__ . '/partials/admin-head.php'; ?>

<body>
<div class="admin-layout">

    <?php require __DIR__ . '/partials/admin-header.php'; ?>
    <?php require __DIR__ . '/partials/admin-sidebar.php'; ?>

    <main class="admin-main">

        <?php require __DIR__ . '/partials/stats-cards.php'; ?>

        <div class="two-col">
            <?php require __DIR__ . '/partials/reservations-table.php'; ?>
            <?php require __DIR__ . '/partials/messages-list.php'; ?>
        </div>

        <?php require __DIR__ . '/partials/menu-overview.php'; ?>

    </main>

</div>
</body>
</html>

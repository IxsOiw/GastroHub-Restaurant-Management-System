<?php require __DIR__ . '/partials/head.php'; ?>

<body>

<?php require __DIR__ . '/partials/header.php'; ?>

<section class="tw-bg-[#efefef] tw-p-8 tw-px-[10%]">

    <div class="tw-flex tw-flex-col tw-gap-2 tw-mb-8">
        <h2 class="primary-text-color tw-text-3xl tw-font-medium">order</h2>
        <h3 class="tw-text-5xl max-md:tw-text-3xl">order online</h3>
    </div>

    <?php if (isset($_GET['success'])): ?>
        <div class="tw-bg-green-100 tw-border tw-border-green-400 tw-text-green-700 tw-rounded tw-p-4 tw-mb-6">
            <p>order successfully submitted! we will contact you shortly.</p>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="tw-bg-red-100 tw-border tw-border-red-400 tw-text-red-700 tw-rounded tw-p-4 tw-mb-6">
            <?php foreach ($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/order/store">

        <div class="tw-grid tw-grid-cols-3 tw-gap-4 tw-mb-8 max-md:tw-grid-cols-1">
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="tw-text-gray-500">name</div>
                <input type="text" name="name" class="input" placeholder="your name" value="<?= htmlspecialchars($name ?? '') ?>"/>
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="tw-text-gray-500">phone</div>
                <input type="text" name="phone" class="input" placeholder="your phone" value="<?= htmlspecialchars($phone ?? '') ?>"/>
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="tw-text-gray-500">email</div>
                <input type="email" name="email" class="input" placeholder="your email" value="<?= htmlspecialchars($email ?? '') ?>"/>
            </div>
        </div>

        <?php foreach ($categories as $category): ?>
            <?php
            $categoryfoods = array_filter($foods, fn ($f) => $f['food_category_id'] === $category['food_category_id']);
            if (empty($categoryfoods)) {
                continue;
            }
            ?>
            <h4 class="tw-text-xl tw-font-medium tw-mb-3 tw-mt-6"><?= htmlspecialchars($category['name']) ?></h4>
            <div class="tw-grid tw-grid-cols-3 tw-gap-4 max-md:tw-grid-cols-1">
                <?php foreach ($categoryfoods as $food): ?>
                <div class="tw-bg-white tw-rounded-lg tw-p-4 tw-flex tw-flex-col tw-gap-2">
                    <div class="tw-font-medium"><?= htmlspecialchars($food['name']) ?></div>
                    <?php if ($food['description']): ?>
                        <div class="tw-text-gray-500 tw-text-sm"><?= htmlspecialchars($food['description']) ?></div>
                    <?php endif; ?>
                    <div class="primary-text-color tw-font-bold">€<?= number_format($food['price'], 2) ?></div>
                    <div class="tw-flex tw-items-center tw-gap-2 tw-mt-auto">
                        <label class="tw-text-gray-500 tw-text-sm">qty:</label>
                        <input type="number" name="items[<?= $food['food_id'] ?>]" min="0" max="10" value="0" class="input tw-w-20"/>
                    </div>
                </div>
                  <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn tw-mt-8">
            <span>Place order</span>
            <i class="bi bi-arrow-right"></i>
        </button>

    </form>

</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html>

<?php require __DIR__ . '/partials/head.php'; ?>
<body>
<?php require __DIR__ . '/partials/header.php'; ?>
<?php require __DIR__ . '/partials/hero.php'; ?>

<main class="tw-min-h-screen tw-px-[5%] tw-py-[10%]">
  <h2 class="primary-text-color tw-text-4xl tw-font-semibold tw-mb-8"><?= $categoryTitle ?></h2>

  <?php if (empty($items)): ?>
    <p class="tw-text-gray-500">No items found in this category.</p>
  <?php else: ?>
    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-6">
      <?php foreach ($items as $item): ?>
        <div class="tw-rounded-lg tw-overflow-hidden tw-shadow-md tw-bg-white">
          <?php if ($item['image']): ?>
            <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>"
              class="tw-w-full tw-h-[200px] tw-object-cover" />
          <?php endif; ?>
          <div class="tw-p-4">
            <h3 class="tw-text-xl tw-font-semibold"><?= $item['name'] ?></h3>
            <p class="tw-text-gray-500 tw-text-sm tw-mt-1"><?= $item['description'] ?></p>
            <p class="primary-text-color tw-font-bold tw-mt-2">€<?= number_format($item['price'], 2) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html>

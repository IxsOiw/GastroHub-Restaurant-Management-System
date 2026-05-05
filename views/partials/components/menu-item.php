<a href="/menu/<?= strtolower($title) ?>" class="tw-block tw-w-[80%] max-md:tw-w-full">
  <div class="menu-item-container tw-relative tw-h-[450px] tw-w-[80%] tw-cursor-pointer tw-overflow-clip tw-rounded-lg max-md:tw-w-full">
    <img
      src="<?= $image ?>"
      alt="<?= $title ?>"
      class="tw-h-full tw-w-full tw-object-cover tw-transition-[scale] tw-duration-[0.4s]"
    />

    <div class="menu-btn tw-text-xl"><?= $title ?></div>
  </div>
</a>

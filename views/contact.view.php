<?php require __DIR__ . '/partials/head.php'; ?>

<body>

<?php require __DIR__ . '/partials/header.php'; ?>

<?php require __DIR__ . '/partials/hero.php'; ?>

<section class="tw-flex tw-w-full tw-place-content-center tw-place-items-center tw-gap-[10%] tw-overflow-hidden tw-bg-[#EFEFEF] tw-p-4 tw-px-[10%] max-md:tw-flex-col">
  <div class="tw-mt-[5%] tw-flex tw-h-full tw-flex-col tw-gap-[5%]">
    <form method="POST" action="/contact/store" class="tw-flex tw-flex-col tw-gap-4 tw-mt-6">
        <input type="text" name="name" placeholder="Name" required class="tw-p-3 tw-border tw-rounded">
        <input type="email" name="email" placeholder="Email" required class="tw-p-3 tw-border tw-rounded">
        <textarea name="message" placeholder="Message" required rows="5" class="tw-p-3 tw-border tw-rounded"></textarea>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>
</section>


<section class="tw-flex tw-w-full tw-place-content-center tw-place-items-center tw-gap-[10%] tw-overflow-hidden tw-bg-[#EFEFEF] tw-p-4 tw-px-[10%] max-md:tw-flex-col">
  <div class="tw-mt-[5%] tw-flex tw-h-full tw-flex-col tw-gap-[5%]">
    <h2 class="primary-text-color tw-text-3xl tw-font-medium">Contact us</h2>
    <h3 class="tw-text-5xl max-md:tw-text-3xl">Get in touch</h3>
    <p class="tw-mt-4 tw-text-gray-600">📍 2 Lord Edward St, D02 P634</p>
    <p class="tw-text-gray-600">📞 +123 232 123</p>
    <p class="tw-text-gray-600">✉️ info@bistro.sk</p>
  </div>
</section>

<?php require __DIR__ . '/partials/newsletter.php'; ?>
<?php require __DIR__ . '/partials/footer.php'; ?>
<?php require __DIR__ . '/partials/modal.php'; ?>

</body>
</html>

<?php require __DIR__ . '/partials/head.php'; ?>

<body>

<?php require __DIR__ . '/partials/header.php'; ?>

  <section class="tw-flex tw-w-full tw-place-content-center tw-place-items-center tw-gap-[10%] tw-overflow-hidden tw-bg-[#EFEFEF] tw-p-4 tw-px-[10%] max-md:tw-flex-col">  

  <div class="tw-mt-[5%] tw-flex tw-h-full tw-flex-col tw-gap-[5%]">
      <div class="tw-flex tw-flex-col tw-gap-2">
        <h2
          class="primary-text-color tw-text-3xl tw-font-medium max-md:tw-text-xl"
        >
          Reservation
        </h2>
        <h3 class="tw-text-5xl max-md:tw-text-3xl">Book your table</h3>
      </div>

      <form method="post" class="tw-mt-4 tw-flex tw-max-w-[350px] tw-flex-col tw-gap-3">

          <?php if (!empty($errors)): ?>
              <div class="tw-bg-red-100 tw-border tw-border-red-400 tw-text-red-700 tw-rounded tw-p-3 tw-mb-4">
                  <?php foreach ($errors as $error): ?>
                      <p><?= $error ?></p>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>

          <?php if (isset($_GET['success'])): ?>
              <div class="tw-bg-green-100 tw-border tw-border-green-400 tw-text-green-700 tw-rounded tw-p-3 tw-mb-4">
                  <p>Reservation successfully submitted!</p>
              </div>
          <?php endif; ?>

        <div class="tw-flex tw-flex-col tw-gap-4">
          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Name</div>
            <input
              type="text"
              name="name"
              class="input"
              maxlength="10"
              placeholder="name"
            />
          </div>

          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Phone</div>
            <input 
              type="text" 
              name="phone"
              class="input" 
              placeholder="phone" 
            />
          </div>

          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Email</div>
            <input
              type="email"
              name="email"
              class="input"
              placeholder="email"
              id="email"
            />
          </div>

        </div>

        <div class="tw-flex tw-gap-4">
          <div class="tw-flex tw-w-full tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Time</div>
            <select name="time" class="input"> 
                <?php foreach (['12:00','13:00','14:00','15:00','16:00','17:00','18:00'] as $t): ?>
                    <option value="<?= $t ?>" <?= $time === $t ? 'selected' : '' ?>><?= $t ?></option>
                <?php endforeach; ?> 
            </select>
          </div>

          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Date</div>
                <input type="date" name="date" class="input" value="<?= htmlspecialchars($date) ?>"/>
          </div>
        </div>

        <div class="tw-flex tw-w-full tw-gap-4 max-md:tw-flex-col">
          <div class="tw-flex tw-w-full tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Guests</div>
                <input type="number" name="guests" value="<?= htmlspecialchars($guests) ?: '2' ?>" min="1" max="15" class="input"/>
          </div>
        </div>
        
        <div class="tw-flex tw-w-full tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Table</div>
            <select name="table_id" class="input">
                <option value="">-- select --</option>
                <?php foreach ($tables as $table): ?>
                    <option value="<?= $table['table_id'] ?>" <?= $tableId == $table['table_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($table['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Note</div>
            <textarea name="note" class="input" rows="3" placeholder="Special requests..."><?= htmlspecialchars($note) ?></textarea>
          </div>

          <button type="submit" class="btn tw-ml-auto tw-mt-5 tw-transition-transform tw-duration-[0.3s] hover:tw-translate-x-2">
            <span>Book table</span>
            <i class="bi bi-arrow-right"></i>
        </button>

  </form>

      <div class="tw-mt-4 tw-flex tw-flex-col tw-gap-2 tw-text-center">

        <h3 class="tw-text-xl">To book call</h3>
        <div class="primary-text-color tw-text-3xl">+123 232 123</div>

      </div>

</section>

<?php require __DIR__ . '/partials/reservation.php'; ?>
<?php require __DIR__ . '/partials/footer.php'; ?>
<?php require __DIR__ . '/partials/modal.php'; ?>
</body>
</html>

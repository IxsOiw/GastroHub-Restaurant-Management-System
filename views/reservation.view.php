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
        <div class="tw-flex tw-flex-col tw-gap-4">
          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Name</div>
            <input
              type="text"
              name="name"
              class="input"
              maxlength="10"
              required
              placeholder="name"
            />
          </div>

          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Phone</div>
            <input 
              type="text" 
              name="phone"
              class="input" 
              required placeholder="phone" 
            />
          </div>

          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Email</div>
            <input
              type="email"
              name="email"
              class="input"
              required
              placeholder="email"
              id="email"
            />
          </div>

        </div>

        <div class="tw-flex tw-gap-4">
          <div class="tw-flex tw-w-full tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Time</div>
            <select name="timings" id="timings" class="input"> 
             <option value="1">1</option>    
             <option value="2">2</option>    
             <option value="3">3</option>    
             <option value="4">4</option>    
             <option value="5">5</option>    
             <option value="6">6</option>    
            </select>
          </div>

          <div class="tw-flex tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">Date</div>
            <input
              type="date"
              name="date"
              class="input"
              required
              placeholder="date"
              id="date"
            />
          </div>
        </div>

        <div class="tw-flex tw-w-full tw-gap-4 max-md:tw-flex-col">
          <div class="tw-flex tw-w-full tw-flex-col tw-gap-1">
            <div class="tw-text-gray-500">People</div>
            <input 
              type="number" 
              name="people"
              value="2" 
              min="0" 
              max="15" 
              class="input" 
            />
          </div>
        </div>

        <button
          type="submit"
          class="btn tw-ml-auto tw-mt-5 tw-transition-transform tw-duration-[0.3s] hover:tw-translate-x-2"
        >
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

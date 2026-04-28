<section class="tw-flex tw-w-full tw-flex-col tw-place-content-center tw-place-items-center tw-bg-[#fff] tw-p-[5%] max-md:tw-px-[5%]">

  <h2 class="tw-text-xl tw-italic">Discover Authentic English Flavours</h2>
  <h3 class="primary-text-color tw-text-4xl tw-font-semibold">
    Explore our menu
  </h3>

  <div class="tw-mt-[5%] tw-flex tw-w-full tw-place-content-center tw-gap-5 max-md:tw-flex-wrap">

    <div class="tw-flex tw-max-w-[650px] tw-flex-col tw-gap-5">

      <div class="tw-flex tw-gap-5 max-md:tw-flex-col">

        <?php
          $image = "/assets/images/homepage/coffee.jpg";
        $title = "Coffee";
        require __DIR__ . '/components/menu-item.php';
        ?>

        <?php
          $image = "/assets/images/homepage/lunch.jpg";
        $title = "Lunch";
        require __DIR__ . '/components/menu-item.php';
        ?>

      </div>

      <?php
        $image = "/assets/images/homepage/dinner.jpg";
        $title = "Dinner";
        require __DIR__ . '/components/menu-item.php';
        ?>

    </div>

    <div class="tw-flex tw-flex-col tw-gap-5">

      <?php
          $image = "/assets/images/homepage/breakfast.jpg";
        $title = "Breakfast";
        require __DIR__ . '/components/menu-item.php';
        ?>

      <?php
          $image = "/assets/images/homepage/wine.jpeg";
        $title = "Drinks";
        require __DIR__ . '/components/menu-item.php';
        ?>

      <?php
          $image = "/assets/images/homepage/dessert.jpg";
        $title = "Desserts";
        require __DIR__ . '/components/menu-item.php';
        ?>

    </div>

  </div>
</section>

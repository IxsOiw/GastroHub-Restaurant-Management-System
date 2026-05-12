
    <header
      class="tw-fixed tw-top-0 tw-z-20 tw-flex tw-h-[60px] tw-w-full tw-px-[10%] max-md:tw-mr-auto md:tw-justify-around"
    >
      <div
        class="tw-absolute tw-left-0 tw-top-0 tw-z-[-1] tw-h-0 tw-w-full tw-bg-white tw-shadow-lg"
        id="expanding-header-bg"
      >
        <!-- expands the white background as scroll -->
      </div>

      <div class="tw-h-[50px] tw-w-[150px] tw-p-[4px]">
        <img
          src="./assets/bistro.svg"
          alt="logo"
          class="tw-object tw-h-full tw-w-full"
        />
      </div>
      <div class="collapsible-header animated-collapse" id="collapsed-items">
        <div
          class="tw-flex tw-h-full tw-w-max tw-gap-5 tw-text-base tw-text-white max-md:tw-mt-[30px] max-md:tw-flex-col max-md:tw-place-items-end max-md:tw-gap-5 md:tw-mx-auto md:tw-place-items-center"
        >
          <a class="header-links" href="/"> Home </a>
          <a class="header-links" href="/about"> About us </a>
          <a class="header-links" href="/menu"> Menu </a>
          <a class="header-links" href="/reservation"> Reservation </a>
          <a class="header-links" href="/contact"> Contact us </a>
          <a class="header-links" href="/order">Order online</a>
        </div>
        <div
          class="tw-flex tw-place-items-center tw-gap-[20px] tw-text-xl max-md:tw-w-full max-md:tw-place-content-center max-md:!tw-text-white"
        >
          <a
            href="https://www.facebook.com/"
            target="_blank"
            rel="no-referrer"
            area-label="facebook"
            class="header-links tw-transition-colors tw-duration-[0.3s]"
          >
            <i class="bi bi-facebook"></i>
          </a>

          <a
            href="https://www.instagram.com/"
            target="_blank"
            rel="no-referrer"
            area-label="twitter"
            class="header-links tw-transition-colors tw-duration-[0.3s]"
          >
            <i class="bi bi-instagram"></i>
          </a>
        </div>
      </div>
      <button
        class="bi bi-list tw-absolute tw-right-3 tw-top-3 tw-z-50 tw-text-3xl tw-text-white md:tw-hidden"
        onclick="toggleHeader()"
        aria-label="menu"
        id="collapse-btn"
      >
        <!-- <i class="bi bi-list"></i> -->
      </button>
    </header>

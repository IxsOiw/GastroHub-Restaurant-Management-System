
<div
  class="tw-fixed tw-left-[50%] tw-top-[50%] tw-z-40 tw-flex tw-hidden tw-max-h-[450px] tw-w-[450px] tw-translate-x-[-50%] tw-translate-y-[-50%] tw-flex-col tw-rounded-md tw-bg-white tw-p-3 tw-shadow-2xl max-md:tw-w-[350px]"
  id="modal"
>
  <div class="tw-relative tw-h-[40px] tw-w-full">
    <button
      class="bi bi-x tw-absolute tw-right-2 tw-text-4xl"
      id="modal-close"
    ></button>
  </div>
  <h2 class="tw-mt-[5%] tw-text-center tw-text-2xl" id="modal-title"></h2>

  <div class="tw-mt-2 tw-text-base tw-font-normal" id="modal-description"></div>

  <textarea
    id="modal-input"
    placeholder="write..."
    maxlength="2000"
    class="input tw-mt-2 tw-hidden tw-max-h-[150px] tw-min-h-[50px] tw-w-full tw-resize-y tw-text-base tw-font-normal"
  ></textarea>

  <div class="tw-mt-3 tw-flex tw-w-full tw-place-content-center">
    <a href="#" class="btn tw-cursor-pointer tw-text-sm" id="modal-action-btn">
      Open
    </a>
  </div>
</div>

import Toastify from 'toastify-js'

function tostifyCustomClose(el) {
    const parent = el.closest('.toastify');
    const close = parent.querySelector('.toast-close');

    close.click();
}

window.addEventListener('load', () => {
    (function() {
        let i = 0;
        const callToast = document.querySelector("#hs-new-toast");
        const toastMarkup = `
      <!-- Toast -->
<div id="dismiss-toast" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg" role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
  <div class="flex p-4">
    <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700">
      Your email has been sent
    </p>

    <div class="ms-auto">
      <button type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-hidden focus:opacity-100" aria-label="Close" data-hs-remove-element="#dismiss-toast">
        <span class="sr-only">Close</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18"></path>
          <path d="m6 6 12 12"></path>
        </svg>
      </button>
    </div>
  </div>
</div>
<!-- End Toast -->
    `;

        callToast.addEventListener("click", () => {
            Toastify({
                text: toastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 fixed -top-37.5 right-5 z-90 transition-all duration-300 w-80 bg-white text-sm text-gray-700 border border-gray-200 rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 3000,
                close: true,
                escapeMarkup: false
            }).showToast();

            i++;
        });
    })();
});

<template>
  <div
    class="bg-grey-lighter flex justify-center item-center w-8/12 m-auto mt-28"
  >
    <div
      class="
        container
        items-center
        rounded
        shadow-md
      "
    >
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div
          class="
            accordion-item
            border-t-0 border-l-0 border-r-0
            rounded-none
            bg-gray-200
            border border-gray-200
          "
        >
          <h2 class="accordion-header mb-0" id="flush-headingOne">
            <button
              class="
                accordion-button
                relative
                flex
                items-center
                w-full
                py-4
                px-5
                text-base text-gray-200 text-left
                bg-blue-500
                border-0
                rounded-none
                transition
                focus:outline-none
              "
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
            >
            <img
                  src="@/assets/savert.jpg"
                  alt=""
                  class="w-10 h-10 rounded-full shadow-md mr-2"
                />
              Samoul Vann
            </button>
          </h2>
          <div
            id="flush-collapseOne"
            class="accordion-collapse border-0 collapse show"
            aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample"
          >
            <div class="accordion-body py-4 px-5">
              Placeholder content for this accordion, which is intended to
              demonstrate the <code>.accordion-flush</code> class. This is the
              first item's accordion body.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  data() {
    return {};
  },
};
</script>
<style>
</style>


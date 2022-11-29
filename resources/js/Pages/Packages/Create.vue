<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { reactive, ref } from "vue";
import { mdiCalculator, mdiTableEdit, mdiTrashCan } from "@mdi/js";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import CardBoxWidget from "@/components/CardBoxWidget.vue";
import CardBox from "@/components/CardBox.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import BaseButtons from "@/components/BaseButtons.vue";
import BaseButton from "@/components/BaseButton.vue";

const props = defineProps({
  packages: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  package_name: "",
  treatment: "",
  package_type: "",
  commission: "",
});

const submit = () => {
  form.post(route("calculation.store"));
};

</script>


<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiCalculator"
        title="Calculation"
        main
      ></SectionTitleLineWithButton>
      <CardBox class="mb-6">
        <form @submit.prevent="submit">
          <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                px-3
                text-sm text-gray-500
                w-40
              "
              >Package</span
            >
            <input
              type="text"
              name="package_name"
              v-model="form.package_name"
              class="
                block
                w-full
                flex-1
                rounded-none rounded-r-md
                border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500
                sm:text-sm
              "
            />
          </div>
          <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                px-3
                text-sm text-gray-500
                w-40
              "
              >Treatment</span
            >
            <input
              type="text"
              name="treatment"
              v-model="form.treatment"
              class="
                block
                w-full
                flex-1
                rounded-none rounded-r-md
                border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500
                sm:text-sm
              "
            />
          </div>
          <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                px-3
                text-sm text-gray-500
                w-40
              "
              >Type</span
            >
            <input
              type="text"
              name="package_type"
              v-model="form.package_type"
              class="
                block
                w-full
                flex-1
                rounded-none rounded-r-md
                border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500
                sm:text-sm
              "
            />
          </div>
          <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                px-3
                text-sm text-gray-500
                w-40
              "
              >Commission</span
            >
            <input
              type="text"
              name="commission"
              v-model="form.commission"
              class="
                block
                w-full
                flex-1
                rounded-none rounded-r-md
                border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500
                sm:text-sm
              "
            />
          </div>
          <br />          

          <button
            type="submit"
            class="
              text-white
              bg-blue-700
              focus:outline-none
              font-medium
              rounded-lg
              text-sm
              px-5
              py-2.5
            "
            :disabled="form.processing"
            :class="{ 'opacity-25': form.processing }"
          >
            Submit
          </button>
        </form>
      </CardBox>

      
    </SectionMain>
  </LayoutAuthenticated>
</template>



<script setup>
import { mdiAccountMultiple } from "@mdi/js";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import CardBox from "@/components/CardBox.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  users: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  name: "",
  role: "",
  email: "",
  password: "",
});

const submit = () => {
  form.post(route("accounts.store"));
};


</script>


<template>
  
    <LayoutAuthenticated>
       <SectionMain>
        
    
      <SectionTitleLineWithButton
        :icon="mdiAccountMultiple"
        title="Accounts"
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
              >Name</span
            >
            <input
              type="text"
              name="package_name"
              v-model="form.name"
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
              >Role</span
            >
            <input
              type="text"
              name="treatment"
              v-model="form.role"
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
              >Email</span
            >
            <input
              type="text"
              name="package_type"
              v-model="form.email"
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
              >Password</span
            >
            <input
              type="text"
              name="commission"
              v-model="form.password"
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

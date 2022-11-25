<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { reactive, ref } from "vue";
import { mdiBallotOutline } from "@mdi/js";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import CardBoxWidget from "@/components/CardBoxWidget.vue";
import CardBox from "@/components/CardBox.vue";

import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  commissions: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  name: "",
  card: "",
  treatment: "",
  productcourse: "",
  product: "",
  course: "",
  service: "",
  commission: "",
});

const submit = () => {
  form.post(route("commissions.store"));
};
</script>


<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiBallotOutline"
        title="Commission Report"
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
              name="name"
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
              >Card</span
            >
            <input
              type="text"
              name="card"
              v-model="form.card"
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
              >Product/Course</span
            >
            <input
              type="text"
              name="productcourse"
              v-model="form.productcourse"
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
              >Product</span
            >
            <input
              type="text"
              name="product"
              v-model="form.product"
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
              >Course</span
            >
            <input
              type="text"
              name="course"
              v-model="form.course"
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
              >Service</span
            >
            <input
              type="text"
              name="service"
              v-model="form.service"
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
          <!-- <template #footer>
            <BaseButtons>
            <BaseButton type="submit" color="info" label="Submit" />
            <BaseButton type="reset" color="info" outline label="Reset" />
          </BaseButtons>
        </template> -->
          <br />
          <div v-if="form.errors.content" class="text-sm text-red-600">
            {{ form.errors.content }}
          </div>

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

      <CardBox has-table>
        <table>
          <thead>
            <tr>
              <th>Date</th>
              <th>Name</th>
              <th>Card</th>
              <th>Treatment</th>
              <th>Product/Course</th>
              <th>Product</th>
              <th>Course</th>
              <th>Service</th>
              <th>Commission</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="commission in commissions" :key="commission.id">
              <td data-label="Date">
                {{ commission.date }}
              </td>
              <td data-label="Name">
                {{ commission.name }}
              </td>
              <td data-label="Card">
                {{ commission.card }}
              </td>
              <td data-label="Treatment">
                {{ commission.treatment }}
              </td>
              <td data-label="Product/Course">
                {{ commission.productcourse }}
              </td>
              <td data-label="Product">
                {{ commission.product }}
              </td>
              <td data-label="Course">
                {{ commission.course }}
              </td>
              <td data-label="Service">
                {{ commission.service }}
              </td>
              <td data-label="Commission">
                {{ commission.commission }}
              </td>
              <!-- <td class="before:hidden lg:w-1 whitespace-nowrap">
                <BaseButtons type="justify-start lg:justify-end" no-wrap>
                  <BaseButton
                    color="info"
                    :icon="mdiTableEdit"
                    small
                    @click="isModalActive = true"
                  />
                  <BaseButton
                    color="danger"
                    :icon="mdiTrashCan"
                    small
                    @click="isModalDangerActive = true"
                  />
                </BaseButtons>
              </td> -->
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>


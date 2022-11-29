<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { reactive, ref } from "vue";
import { mdiBallotOutline, mdiPlus } from "@mdi/js";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import CardBoxWidget from "@/components/CardBoxWidget.vue";
import CardBox from "@/components/CardBox.vue";
import BaseButtons from "@/components/BaseButtons.vue";
import BaseButton from "@/components/BaseButton.vue";
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
      <BaseButton
        
        :icon="mdiPlus"
        label="Add"
        color="info"
        :href="route('commissions.create')"
        class="mb-4"
      />

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


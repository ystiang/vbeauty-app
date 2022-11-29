<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { reactive, ref } from "vue";
import { mdiCalculator, mdiTableEdit, mdiTrashCan, mdiPlus } from "@mdi/js";
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
      <BaseButton
        
        :icon="mdiPlus"
        label="Add"
        color="info"
        :href="route('calculation.create')"
        class="mb-4"
      />

      <CardBox has-table>
        <table>
          <thead>
            <tr>
              <th>Package</th>
              <th>Treatment</th>
              <th>Type</th>
              <th>Commission</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="packagez in packages" :key="packagez.id">
              <td data-label="Package">
                {{ packagez.package_name }}
              </td>

              <td data-label="Treatment">
                {{ packagez.treatment }}
              </td>
              <td data-label="Type">
                {{ packagez.package_type }}
              </td>

              <td data-label="Commission">
                {{ packagez.commission }}
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


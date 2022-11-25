<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { mdiAccountKey, mdiAccountMultiple, mdiPlus, mdiTableEdit, mdiTrashCan } from "@mdi/js";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionMain from "@/components/SectionMain.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import CardBoxWidget from "@/components/CardBoxWidget.vue";
import CardBox from "@/components/CardBox.vue";
import BaseLevel from "@/components/BaseLevel.vue";
import BaseButtons from "@/components/BaseButtons.vue";
import BaseButton from "@/components/BaseButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  users: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm();

function destroy(id) {
  if (confirm("Are you sure you want to DELETE?")) {
    form.delete(route("accounts.destroy", id));
  }
}
</script>

<template>
  <LayoutAuthenticated>
    <Head title="Accounts" />
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiAccountMultiple"
        title="Accounts"
        main
      ></SectionTitleLineWithButton>
      <BaseButton
        
        :icon="mdiPlus"
        label="Add"
        color="info"
        rounded-full
        small
      />

      <CardBox has-table>
        <table>
          <thead>
            <tr>
              <th scope="col">#</th>

              <th>Name</th>
              <th>Role</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <td data-label="Name">
                {{ user.id }}
              </td>

              <td data-label="Name">
                {{ user.name }}
              </td>
              <td data-label="Role">
                {{ user.role }}
              </td>
              <td data-label="Email">
                {{ user.email }}
              </td>
              <td data-label="Password" class="lg:w-32">
                <!-- <progress
            class="flex w-2/5 self-center lg:w-full"
            max="100"
            :value="client.progress"
          >
            {{ client.progress }}
          </progress> -->
              </td>

              <td class="before:hidden lg:w-1 whitespace-nowrap">
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
                    @click="destroy(user.id)"
                  />
                </BaseButtons>
              </td>
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>


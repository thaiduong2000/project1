<template>
  <div>
    <b-table striped hover :items="items" :fields="fields" :busy="isBusy">
      <template #table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle"></b-spinner>
          <strong>Loading...</strong>
        </div>
      </template>

      <template #cell(action)="{ item }">
        <router-link
          :to="{ name: 'UpdateUser', params: { id: item.id } }"
          class="btn btn-success"
        >
          Update
        </router-link>
        <b-button class="btn btn-danger" @click="deleteUser(item.id)">Delete</b-button>
      </template>
    </b-table>
  </div>
</template>
<script>
export default {
  props: {
    items: {
      type: Array,
      default: () => [],
    },
    fields: {
      type: Array,
      default: () => [],
    },
    isBusy: {
      type: Boolean,
    },
  },

  methods: {
    deleteUser(id) {
      this.$emit("onDeleteUser", id);
    },
  },
};
</script>

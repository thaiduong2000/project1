<template>
  <div>
    <b-table
      id="my-table"
      :busy="isBusy"
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      striped
      small
      primary-key="identifier"
    >
      <template #table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle"></b-spinner>
          <strong>Loading...</strong>
        </div>
      </template>
      <template #cell(action)="{ item }">
        <router-link
          :to="{ name: 'UpdateVehicle', params: { id: item.id } }"
          class="btn btn-success"
        >
          Update
        </router-link>
        <b-button variant="danger" @click="deleteVehicle(item.id)">Delete</b-button>
      </template>
    </b-table>

    <div class="d-flex justify-content-end">
      <b-pagination
        :value="currentPage"
        @input="handleChangeCurrentPage($event)"
        :total-rows="total"
        :per-page="perPage"
        aria-controls="my-table"
      ></b-pagination>
    </div>
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
    perPage: {
      type: Number,
    },
    currentPage: {
      type: Number,
    },
    total: {
      type: Number,
    },
    isBusy: {
      type: Boolean,
    },
    isBtnDisabled: {
      type: Boolean,
    },
  },
  methods: {
    handleChangeCurrentPage(value) {
      this.$emit("onHandleChangeCurrentPage", value);
    },
    deleteVehicle(id) {
      this.$emit("onDeleteVehicle", id);
    },
  },
};
</script>

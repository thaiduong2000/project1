<template>
  <div>
    
    <b-table
     id="my-table"
     :busy="isBusy"
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
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
          :to="{ name: 'UpdateTechnology', params: { id: item.id } }"
          class="btn btn-success"
        >
          Update
        </router-link>
        <b-button class="btn btn-danger" @click="deleteTechnology(item.id)"
          >Delete</b-button
        >
      </template>
    </b-table>
    <div class="d-flex justify-content-end">
      <b-pagination
        :value="currentPage"
        @input="handleChange($event)"
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
  },
  methods: {
    handleChange(value) {
      this.$emit("onHandleChange",value);
    },
    deleteTechnology(id) {
      this.$emit("onDeleteTechnology", id);
    },
    listTechnologies(){
      this.$emit("onListTechnologies");
    }
  },
};
</script>

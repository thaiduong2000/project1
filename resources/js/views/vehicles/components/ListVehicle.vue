<template>
  <div>
    <b-table striped hover :items="items" :fields="fields" :busy="isBusy">
       <template #table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle"></b-spinner>
          <strong>Loading...</strong>
        </div>
      </template>

      <template #cell(action) = "{ item }">
        <router-link
          :to="{ name: 'UpdateVehicle', params: { id: item.id } }"
          class="btn btn-success"
        >
          Update
        </router-link>
        <b-button variant="danger" @click="deleteVehicle(item.id)">Delete
          <b-spinner v-if="isBtnDisabled" small label="Spinning" />
        </b-button>
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
    isBtnDisabled: {
      type: Boolean,
    },
  },
  methods: {
    deleteVehicle(id) {
      this.$emit("onDeleteVehicle", id);
    },
  },
  
};
</script>

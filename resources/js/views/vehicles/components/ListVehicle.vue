<template>
  <div>
    <b-table striped hover :items="vehicles">
      <template #cell(action)>
        <b-link href="/vehicles/update" class="btn btn-success">Update</b-link>
        <b-button variant="danger">Delete</b-button>
      </template>
    </b-table>
  </div>
</template>
<script>
export default {
  props: {
    vehicles: {
      type: Array,
      default: () => [],
    },
  },
};
</script>

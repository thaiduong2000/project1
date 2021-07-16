<template>
<div>
  <b-table striped hover :items="items">
    <template #cell(action)>
      <b-link href="/users/update" class="btn btn-success">Update</b-link>
      <b-button variant="danger">Delete</b-button>
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
  },
};
</script>

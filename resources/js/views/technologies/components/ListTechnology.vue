<template>
  <div>
    <b-table striped hover :items="technologies">
      <template #cell(action)>
        <b-link href="/technologies/update" class="btn btn-success">Update</b-link>
        <b-button variant="danger">Delete</b-button>
      </template>
    </b-table>
  </div>
</template>
<script>
export default {
  props: {
    technologies: {
      type: Array,
      default: () => [],
    },
  },
};
</script>

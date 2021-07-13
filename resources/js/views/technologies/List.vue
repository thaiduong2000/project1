<template>
  <div>
    <div class="d-flex justify-content-end">
      <b-link href="/technologies/create" class="btn btn-success"
        >Add new</b-link
      >
    </div>
    <ListTechnology :technologies="technologies" />
  </div>
</template>
<script>
import ListTechnology from "./components/ListTechnology.vue";
export default {
  components: {
    ListTechnology,
  },
  data() {
    return {
      technologies: [
        { Id: 1, Name: "Dickerson", action: "" },
        { Id: 2, Name: "Larsen" },
        { Id: 3, Name: "Geneva" },
        { Id: 4, Name: "Jami" },
      ],
    };
  },
};
</script>

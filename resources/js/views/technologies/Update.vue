<template>
  <div class="row">
    <div class="col-md-6 offset-3">
      <TechnologyForm
        btnSubmitText="Update"
        :technology="technology"
        :foods="foods"
        @onHandleChange="handleChange"
      />
    </div>
  </div>
</template>

<script>
import TechnologyForm from "./components/TechnologyForm.vue";
export default {
  components: {
    TechnologyForm,
  },
  // TODO: chưa xử lý gọi api và đang set cứng dữ liệu
  data() {
    return {
      technology: {
        name: "technologies",
      },
      foods: [
        { text: "Select One", value: null },
        "Carrotss",
        "Beanss",
        "Tomatoes",
        "Corn",
      ],
      btnSubmitText: "Update",
    };
  },
  methods: {
    handleChange(name, value) {
      this.user[name] = value;
    },
  },
};
</script>

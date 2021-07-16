<template>
  <div class="row">
    <div class="col-md-6 offset-3">
      <VehicleForm
        btnSubmitText="Update"
        :vehicle="vehicle"
        :foods="foods"
        @onHandleChange="handleChange"
      />
    </div>
  </div>
</template>

<script>
import VehicleForm from "./components/VehicleForm.vue";
export default {
  components: {
    VehicleForm,
  },
  // TODO: chưa xử lý gọi api và đang set cứng dữ liệu
  data() {
    return {
      vehicle: {
        name: "duong",
        technology_id: 1,
      },
      foods: [
        { text: "Select One", value: null },
        "Carrots",
        "Beans",
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

<template>
  <div>
    <div class="row">
      <div class="col-md-6 offset-3">
        <VehicleForm
          btnSubmitText="Create"
          :vehicle="vehicle"
          :technologies="technologies"
          :isBtnDisabled="isBtnDisabled"
          @onHandleChangeValue="handleChangeValue"
          @onCreateVehicles="createVehicles"
        />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import VehicleForm from "./components/VehicleForm.vue";
export default {
  components: {
    VehicleForm,
  },
  data() {
    return {
      vehicle: {
        name: "",
        technology_id: "",
      },
      technologies: [],
      isBtnDisabled: false,
    };
  },
  created() {
    this.listTechnologies();
  },
  methods: {
    handleChangeValue(name, value) {
      this.vehicle[name] = value;
    },
    listTechnologies() {
      axios
        .get(`/api/technologies`)
        .then((response) => {
          this.technologies = response.data.data;
        })
    },
    createVehicles() {
      this.isBtnDisabled = true;
      axios
        .post(`/api/vehicles`, {
          name: this.vehicle.name,
          technology_id: this.vehicle.technology_id,
        })
        .then((res) => {
          this.$router.push({ name: "ListVehicle" });
        })
        .catch((err) => {
          this.isBtnDisabled = false;
        });
    },
  },
};
</script>

<template>
  <div class="row">
    <div class="col-md-6 offset-3">
      <VehicleForm
        btnSubmitText="Update"
        :vehicle="vehicle"
        :technologies="technologies"
        :isBtnDisabled="isBtnDisabled"
        @onHandleChangeValue="handleChangeValue"
        @onUpdateVehicles="updateVehicle"
      />
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
    this.getVehicle();
    this.listTechnologies();
  },
  methods: {
    handleChangeValue(name, value) {
      this.vehicle[name] = value;
    },
    getVehicle() {
      axios
        .get(`/api/vehicles/${this.$route.params.id}`)
        .then((response) => {
          const { data } = response.data;
          this.vehicle = {
            name: data.name,
            technology_id: data.technology_id,
          };
        })
    },
    listTechnologies() {
      axios
        .get(`/api/technologies`)
        .then((response) => {
          this.technologies = response.data.data;
        })
    },
    updateVehicle() {
      this.isBtnDisabled = true;
      axios
        .put(`/api/vehicles/${this.$route.params.id}`, {
          name: this.vehicle.name,
          technology_id: this.vehicle.technology_id,
        })
        .then((res) => {
          console.log(res);
          this.$router.push({ name: "ListVehicle" });
        })
        .catch((err) => {
          console.log(err);
          this.isBtnDisabled = false;
        });
    },
  },
};
</script>

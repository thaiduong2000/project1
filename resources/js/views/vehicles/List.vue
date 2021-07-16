<template>
  <div>
    <div class="d-flex justify-content-end">
      <router-link to="/vehicles/create" class="btn btn-success">
        Add new
      </router-link>
    </div>
    <ListTechnology :items="items" :fields="fields" @onDeleteVehicle="deleteVehicle" :isBusy="isBusy" :isBtnDisabled="isBtnDisabled"/>
  </div>
</template>
<script>
import axios from "axios";
import ListTechnology from "./components/ListVehicle.vue";
export default {
  components: {
    ListTechnology,
  },
  data() {
    return {
      fields: [
        {
          key: "id",
          sortable: true,
        },
        {
          key: "name",
        },
        {
          key: "technology_id",
        },
        {
          key: "action",
        },
      ],
      items: [],
      isBusy: true,
      isBtnDisabled: false,
    };
  },
  created() {
    this.listVehicles();
  },

  methods: {
    listVehicles() {
      // this.isBusy = !this.isBusy;
      axios.get(`/api/vehicles`).then((response) => {
        const { data } = response.data;
        this.items = data;
         this.isBusy = false
      });
    },

    deleteVehicle(id) {
      this.$bvModal
        .msgBoxConfirm("Are you sure delete vehicle?", {
          title: "Please Confirm",
          size: "sm",
          buttonSize: "sm",
          okVariant: "danger",
          okTitle: "YES",
          cancelTitle: "NO",
          footerClass: "p-2",
          hideHeaderClose: false,
          centered: true,
        })
        .then((value) => {
          if (value == true) {
            axios.delete(`/api/vehicles/` + id).then((res) => {
              this.listVehicles();
            });
          }
        });
    },
  }
};
</script>

<template>
  <div>
    <div class="d-flex justify-content-end">
      <router-link to="/vehicles/create" class="btn btn-success">
        Add new
      </router-link>
    </div>
    <ListTechnology
      :items="items"
      :fields="fields"
      :isBusy="isBusy"
      :perPage="pagination.perPage"
      :currentPage="pagination.currentPage"
      :total="pagination.total"
      @onHandleChangeCurrentPage="handleChangeCurrentPage"
      @onDeleteVehicle="deleteVehicle"
      :isBtnDisabled="isBtnDisabled"
    />
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
      pagination: {
        perPage: 0,
        currentPage: 1,
        total: 0,
      },
    };
  },
  created() {
    this.listVehicles();
  },

  methods: {
    handleChangeCurrentPage(value) {
      this.currentPage = value;
      this.listVehicles();
    },
    listVehicles() {
      this.isBusy = !this.isBusy;
      axios.get(`/api/vehicles?page=` + this.currentPage).then((response) => {
        const { data, meta } = response.data;
        this.items = data;
        this.pagination = {
          perPage: meta.per_page,
          currentPage: meta.current_page,
          total: meta.total,
        };
        this.isBusy = false;
      });
    },
    deleteVehicle(id) {
      this.isBtnDisabled = true;
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
              this.isBtnDisabled = false;
            });
          }
        });
    },
  },
};
</script>

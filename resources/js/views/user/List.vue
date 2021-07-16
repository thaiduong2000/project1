<template>
  <div>
    <div class="d-flex justify-content-end">
      <router-link to="/users/create" class="btn btn-success">
        Add new
      </router-link>
    </div>
    <ListUser
      :items="items"
      :fields="fields"
      :isBusy="isBusy"
      :perPage="pagination.perPage"
      :currentPage="pagination.currentPage"
      :total="pagination.total"
      @onHandleChangeCurrentPage="handleChangeCurrentPage"
      @onDeleteUser="deleteUser"
    />
  </div>
</template>
<script>
import axios from "axios";
import ListUser from "./components/ListUser.vue";
export default {
  components: {
    ListUser,
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
          key: "id_role",
          label: "Roles",
        },
        {
          key: "action",
          label: "Actions",
        },
      ],
      items: [],
      roles: [],
      pagination: {
        perPage: 0,
        currentPage: 1,
        total: 0,
      },
      isBusy: false,
    };
  },
  created() {
    this.listUsers();
  },
  methods: {
    handleChangeCurrentPage(value) {
      this.currentPage = value;
      this.listUsers();
    },
    listUsers() {
      this.isBusy = !this.isBusy;
      axios
        .get(`/api/users?page=` + this.currentPage)
        .then((response) => {
          const { data, meta } = response.data;
          this.items = data;
          this.pagination = {
            perPage: meta.per_page,
            currentPage: meta.current_page,
            total: meta.total,
          };
          this.isBusy = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    deleteUser(id) {
      this.$bvModal
        .msgBoxConfirm("Are you sure delete user?", {
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
            axios.delete(`/api/users/` + id).then((res) => {
              this.listUsers();
            });
          }
        });
    },
  },
};
</script>

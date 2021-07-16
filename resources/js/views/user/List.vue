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
      isBusy: false,
    };
  },
  created() {
    this.getUser()
  },
  methods: {
    getUser() {
      this.isBusy = !this.isBusy;
      axios
        .get(`/api/users`)
        .then((response) => {
          this.items = response.data.data;
          this.isBusy = !this.isBusy;
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
              this.getUser();
            });
          }
        });
    },
  },
};
</script>

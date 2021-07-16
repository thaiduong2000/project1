<template>
  <div class="row">
    <div class="col-md-6 offset-3">
      <UserForm
        btnSubmitText="Update"
        :user="user"
<<<<<<< HEAD
        :roles="roles"
        :isBtnDisabled="isBtnDisabled"
        @onHandleChange="handleChange"
        @onUpdateUser="updateUser"
=======
        :foods="foods"
        @onHandleChange="handleChange"
>>>>>>> b748ac3feb61722e33150db130165ce37551985f
      />
    </div>
  </div>
</template>

<script>
<<<<<<< HEAD
import axios from "axios";
=======
>>>>>>> b748ac3feb61722e33150db130165ce37551985f
import UserForm from "./components/UserForm.vue";
export default {
  components: {
    UserForm,
  },
  data() {
    return {
      user: {
        name: "",
        password: "",
        id_role: "",
      },
      roles: [],
      isBtnDisabled: false,
    };
  },
  created() {
    this.getUser();
    this.listRoles();
  },
  methods: {
    handleChange(name, value) {
      this.user[name] = value;
    },
    getUser() {
      axios
        .get(`/api/users/${this.$route.params.id}`)
        .then((response) => {
          const { data } = response.data;
          this.user = {
            name: data.name,
            password: "",
            id_role: data.id_role,
          };
        })
    },
    listRoles() {
      axios
        .get(`/api/roles`)
        .then((response) => {
          this.roles = response.data;
        })
    },
    updateUser() {
      this.isBtnDisabled = true;
      axios
        .put(`/api/users/${this.$route.params.id}`, {
          name: this.user.name,
          password: this.user.password,
          id_role: this.user.id_role,
        })
        .then((res) => {
          this.$router.push({ name: "ListUser" });
        })
        .catch((err) => {
          this.isBtnDisabled = false;
        });
    },
  },
};
</script>

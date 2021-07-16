<template>
  <div>
    <div class="row">
      <div class="col-md-6 offset-3">
        <UserForm
          btnSubmitText="Create"
          :user="user"
          :roles="roles"
          :isBtnDisabled="isBtnDisabled"
          @onHandleChange="handleChange"
          @onCreateUser="createUser"
        />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
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
    this.listRoles();
  },
  methods: {
    handleChange(name, value) {
      this.user[name] = value;
    },
    listRoles() {
      axios
        .get(`/api/roles`)
        .then((response) => {
          this.roles = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    createUser() {
      this.isBtnDisabled = true;
      axios
        .post(`/api/users`, {
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

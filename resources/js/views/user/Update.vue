<template>
  <div class="row">
    <div class="col-md-6 offset-3">
      <UserForm
        btnSubmitText="Update"
        :user="user"
        :foods="foods"
        @onHandleChange="handleChange"
      />
    </div>
  </div>
</template>

<script>
import UserForm from "./components/UserForm.vue";
export default {
  components: {
    UserForm,
  },
  data() {
    return {
      user: {
        name: "duong",
        password: "123123",
        id_role: 1,
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
      console.log(name, value);
      this.user[name] = value;
    },
  },
};
</script>

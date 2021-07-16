<template>
  <div>
    <div class="row">
      <div class="col-md-6 offset-3">
        <UserForm
          btnSubmitText="Create"
          :user="user"
          :foods="foods"
          @onHandleChange="handleChange"
        />
      </div>
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
        name: "",
        password: "",
        id_role: "",
      },
      foods: [
        { text: "Select One", value: null },
        "Carrots",
        "Beans",
        "Tomatoes",
        "Corn",
      ],
    };
  },
  methods: {
    handleChange(name, value) {
      this.user[name] = value;
    },
  },
};
</script>

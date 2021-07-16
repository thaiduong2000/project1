<template>
  <div>
    <div class="row">
      <div class="col-md-6 offset-3">
        <TechnologyForm
          btnSubmitText="Create"
          :technology="technology"
          :isBtnDisabled="isBtnDisabled"
          @onHandleChangeValue="handleChangeValue"
          @onCreateTechnology="createTechnology"
        />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import TechnologyForm from "./components/TechnologyForm.vue";
export default {
  components: {
    TechnologyForm,
  },
  data() {
    return {
      technology: {
        name: "",
      },
      isBtnDisabled: false,
    };
  },
  methods: {
    handleChangeValue(name, value) {
      this.technology[name] = value;
    },
    createTechnology() {
      this.isBtnDisabled = true
      axios
        .post(`/api/technologies`, {
          name: this.technology.name,
        })
        .then((response) => {
          this.$router.push({ name: "ListTechnology" });
        });
    },
  },
};
</script>

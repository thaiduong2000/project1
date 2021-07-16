<template>
  <div class="row">
    <div class="col-md-6 offset-3">
      <TechnologyForm
        btnSubmitText="Update"
        :technology="technology"
        :isBtnDisabled="isBtnDisabled"
        @onHandleChange="handleChange"
        @onUpdate="update"
      />
    </div>
  </div>
</template>

<script>
import axios from 'axios'
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
      btnSubmitText: "Update",
      isBtnDisabled: false,

    };
  },
  created() {
    this.get();
  },
  methods: {
    handleChange(name, value) {
      this.technology[name] = value;
    },

    get() {
      axios
        .get(`/api/technologies/${this.$route.params.id}`)
        .then((response) => {
          const { data } = response.data
          this.technology = data
        });
    },

    update(){
      this.isBtnDisabled = true
      axios.put(`/api/technologies/${this.$route.params.id}`,{
        name: this.technology.name
      }).then((response) => {
        this.$router.push({name: "ListTechnology"})
      }).catch((res) => {
        this.isBtnDisabled = false
      })
    }
  },
};
</script>

<template>
  <div class="row">
    <div class="col-md-6 offset-3">
      <TechnologyForm
        btnSubmitText="Update"
        :technology="technology"
<<<<<<< HEAD
        :isBtnDisabled="isBtnDisabled"
        @onHandleChangeValue="handleChangeValue"
        @onUpdateTechnology="updateTechnology"
=======
        :foods="foods"
        @onHandleChange="handleChange"
>>>>>>> b748ac3feb61722e33150db130165ce37551985f
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
    this.getTechnology();
  },
  methods: {
    handleChangeValue(name, value) {
      this.technology[name] = value;
    },
    getTechnology() {
      axios
        .get(`/api/technologies/${this.$route.params.id}`)
        .then((response) => {
          const { data } = response.data
          this.technology = data
        });
    },
    updateTechnology(){
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

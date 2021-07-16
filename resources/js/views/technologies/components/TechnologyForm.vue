<template>
  <div class="container">
    <b-form>
      <b-form-group class="" label="Name:">
        <b-form-input
          class=""
          :value="technology.name"
          @input="handleChangeValue('name', $event)"
          type="text"
          placeholder="Enter name"
          required
        ></b-form-input>
      </b-form-group>

      <b-button :disabled="isBtnDisabled" type="submit" @click.prevent="createOrUpdate" variant="primary">
        {{ btnSubmitText }}
        <b-spinner v-if="isBtnDisabled" small label="Spinning" />
        </b-button>
    </b-form>
  </div>
</template>

<script>
export default {
  props: {
    technology: {
      type: Object,
      default: () => {},
    },
    btnSubmitText: {
      type: String
    },
    isBtnDisabled:{
      type: Boolean
    }
  },
  methods: {
    handleChangeValue(name, value) {
      this.$emit("onHandleChangeValue", name, value);
    },
    createOrUpdate(){
      this.$emit('onCreateTechnology')
      this.$emit('onUpdateTechnology')
    }
  },
};
</script>

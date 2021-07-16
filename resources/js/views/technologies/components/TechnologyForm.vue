<template>
  <div class="container">
    <b-form>
      <b-form-group class="" label="Name:">
        <b-form-input
          class=""
          :value="technology.name"
          @input="handleChange('name', $event)"
          type="text"
          placeholder="Enter name"
          required
        ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">{{ btnSubmitText }}</b-button>
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
    foods: {
      type: Array,
      default: () => {},
    },
    btnSubmitText: {
      type: String,
    },
  },
  methods: {
    handleChange(name, value) {
      this.$emit("onHandleChange", name, value);
    },
  },
};
</script>

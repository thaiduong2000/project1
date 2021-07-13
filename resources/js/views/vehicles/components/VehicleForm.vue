<template>
  <div class="container">
    <b-form>
      <b-form-group class="" label="Name:">
        <b-form-input
          class=""
          :value="vehicle.name"
          @input="handleChange('name', $event)"
          type="text"
          placeholder="Enter name"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Roles:" label-for="input-3">
        <b-form-select
          id="input-3"
          :value="vehicle.technology_id"
          @input="handleChange('technology_id', $event)"
          :options="foods"
          required
        ></b-form-select>
      </b-form-group>

      <b-button type="submit" variant="primary">{{ btnSubmitText }}</b-button>
    </b-form>
  </div>
</template>

<script>
export default {
  props: {
    vehicle: {
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

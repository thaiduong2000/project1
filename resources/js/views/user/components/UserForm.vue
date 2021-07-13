<template>
  <div class="container">
    <b-form>
      <b-form-group class="" label="Name:">
        <b-form-input
          class=""
          :value="user.name"
          @input="handleChange('name', $event)"
          type="text"
          placeholder="Enter name"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Password:" label-for="input-2">
        <b-form-input
          id="input-2"
          :value="user.password"
          @input="handleChange('password', $event)"
          type="password"
          placeholder="Enter password"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Roles:" label-for="input-3">
        <b-form-select
          id="input-3"
          :value="user.id_role"
          @input="handleChange('id_role', $event)"
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
    user: {
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

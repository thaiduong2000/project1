<template>
  <div class="container">
    <b-form>
      <b-form-group class="" label="Name:">
        <b-form-input
          class=""
          :value="vehicle.name"
          @input="handleChangeValue('name', $event)"
          type="text"
          placeholder="Enter name"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Roles:" label-for="input-3">
        <b-form-select
          id="input-3"
          :value="vehicle.technology_id"
          required
          @input="handleChangeValue('technology_id', $event)"
        >
          <b-form-select-option value="">Please select an option</b-form-select-option>
          <b-form-select-option
            v-for="technology in technologies"
            :value="technology.id"
            :key="technology.id"
          >
            {{ technology.name }}
          </b-form-select-option>
        </b-form-select>
      </b-form-group>

      <b-button
        type="submit"
        :disabled="isBtnDisabled"
        @click.prevent="createOrUpdate"
        variant="primary"
      >
        {{ btnSubmitText }}
        <b-spinner v-if="isBtnDisabled" small label="Spinning" />
      </b-button>
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
    technologies: {
      type: Array,
      default: () => [],
    },
    btnSubmitText: {
      type: String,
    },
    isBtnDisabled: {
      type: Boolean,
    },
  },
  methods: {
    handleChangeValue(name, value) {
      this.$emit("onHandleChangeValue", name, value);
    },
    createOrUpdate() {
      this.$emit("onCreateVehicles");
      this.$emit("onUpdateVehicles");
    },
  },
};
</script>

<template>
  <div>
    <div class="d-flex justify-content-end">
      <b-link href="/vehicles/create" class="btn btn-success">Add new</b-link>
    </div>
    <ListTechnology :vehicles="vehicles" />
  </div>
</template>
<script>
import ListTechnology from "./components/ListVehicle.vue";
export default {
  components: {
    ListTechnology,
  },
  // TODO: chưa xử lý gọi api và đang set cứng dữ liệu
  data() {
    return {
      vehicles: [
        { Id: 1, Name: "Dickerson", roles:"role 1", action: "" },
        { Id: 2, Name: "Larsen", roles:"role 2" },
        { Id: 3, Name: "Geneva", roles:"role 3" },
        { Id: 4, Name: "Jami", roles:"role 4" },
      ],
    };
  },
};
</script>

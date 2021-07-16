<template>
  <div>
    <div class="d-flex justify-content-end">
      <router-link :to="{ name: 'CreateTechnology' }" class="btn btn-success">
        Add new
      </router-link>
    </div>
    <ListTechnology
      :fields="fields"
      :isBusy="isBusy"
      :items="items"
      :perPage="pagination.perPage"
      :currentPage="pagination.currentPage"
      :total="pagination.total"
      @onHandleChange="handleChange"
      @onDeleteTechnology="deleteTechnology"
    />
  </div>
</template>
<script>
import axios from "axios";
import ListTechnology from "./components/ListTechnology.vue";
export default {
  components: {
    ListTechnology,
  },
  data() {
    return {
      fields: [
        {
          key: "id",
          sortable: true,
        },
        {
          key: "name",
        },
        {
          key: "action",
        },
      ],
      items: [],
      isBusy: false,
      pagination: {
        perPage: 0,
        currentPage: 1,
        total: 0,
      },
    };
  },
  created() {
    this.listTechnologies();
  },
  methods: {
    handleChange(value) {
      this.currentPage = value;
      this.listTechnologies();
    },
    listTechnologies() {
      this.isBusy = !this.isBusy;
      console.log(this.currentPage);
      axios
        .get(`/api/technologies?page=` + this.currentPage)
        .then((response) => {
          const { data, meta } = response.data;
          this.items = data;
          this.pagination = {
            perPage: meta.per_page,
            currentPage: meta.current_page,
            total: meta.total,
          };
          this.isBusy = false;
        });
    },
    deleteTechnology(id) {
      this.$bvModal
        .msgBoxConfirm("Are you sure delete technology?", {
          title: "Please Confirm",
          size: "sm",
          buttonSize: "sm",
          okVariant: "danger",
          okTitle: "YES",
          cancelTitle: "NO",
          footerClass: "p-2",
          hideHeaderClose: false,
          centered: true,
        })
        .then((value) => {
          if (value == true) {
            axios.delete(`/api/technologies/` + id).then((res) => {
              this.listTechnologies();
            });
          }
        });
    },
  },
};
</script>

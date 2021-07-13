<template>
  <div class="container">
    <div>
      <b-navbar toggleable="lg" type="dark" variant="info">
        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item href="#"
              ><router-link to="/users" class="text-light"
                >User</router-link
              ></b-nav-item
            >
            <b-nav-item href="#"
              ><router-link to="/technologies" class="text-light"
                >Technologies</router-link
              ></b-nav-item
            >
            <b-nav-item href="#"
              ><router-link to="/vehicles" class="text-light"
                >Vehicles</router-link
              ></b-nav-item
            >
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
    <div class="main mt-4">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "App",
}
</script>
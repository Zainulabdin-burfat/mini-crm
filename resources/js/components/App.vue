<template>
  <div class="container">
    <div class="row pt-5">
      <div class="col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <router-link to="/" class="nav-link">Home</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/company/add" class="nav-link"
                  >Add Company</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/employee/add" class="nav-link"
                  >Add Employee</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/companies" class="nav-link"
                  >All Companies</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/employees" class="nav-link"
                  >All Employees</router-link
                >
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <br />

    <div class="row pt-5">
      <div class="col-sm-12">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {};
</script>
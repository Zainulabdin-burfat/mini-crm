<template>
  <div class="container">
    <div class="text-center" style="margin: 20px 0px 20px 0px">
      <span class="text-secondary">CRM - CRUD</span>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
          <router-link to="/" class="nav-item nav-link">Home</router-link>
          <router-link to="/company/add" class="nav-item nav-link">Add Company</router-link>
          <router-link to="/employee/add" class="nav-item nav-link">Add Employee</router-link>
          <router-link to="/companies" class="nav-item nav-link">All Companies</router-link>
          <router-link to="/employees" class="nav-item nav-link">All Employees</router-link>
        </div>
      </div>
    </nav>
    <br />
    <router-view></router-view>
  </div>
</template>
  
<script>
export default {};
</script>
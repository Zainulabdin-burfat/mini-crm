<template>
  <div>
    <h3 class="text-center">Add Employee</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addEmployee" enctype="multipart/form-data">
          <div class="form-group">
            <label>First Name</label>
            <input
              type="text"
              class="form-control"
              v-model="employee.first_name"
            />
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input
              type="text"
              class="form-control"
              v-model="employee.last_name"
            />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" v-model="employee.email" />
          </div>
          <label>Select Company</label>
          <div class="form-group" >
            <select class="form-control form-select" v-model="employee.company_id" >
              <option v-for="company in companies" v-bind:value="company.id" > {{ company.name }} </option>
            </select>
            
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input
              type="text"
              class="form-control"
              v-model="employee.phone_number"
            />
          </div>
          <button type="submit" class="btn btn-primary">Add employee</button>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      employee: {},
      companies: {}
    };
  },
  created() {
    this.axios.get("http://127.0.0.1:8000/api/get_companies").then((response) => {
      this.companies = response.data;
    });
  },
  methods: {
    addEmployee(e) {
      e.preventDefault();
      this.axios
        .post("http://127.0.0.1:8000/api/employee/add", this.employee)
        .then((res) => {
          this.$router.push({ name:"employees" });
        });
    },
  },
};
</script>
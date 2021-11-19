<template>
  <div>
    <h3 class="text-center">All Employees</h3>
    <br />

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Company Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="employee in employees" :key="employee.id">
          <td>{{ employee.id }}</td>
          <td>{{ employee.first_name }}</td>
          <td>{{ employee.last_name }}</td>
          <td>{{ employee.email }}</td>
          <td>{{ employee.phone }}</td>
          <td>{{ employee.name }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'edit/employee', params: { id: employee.id } }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button
                class="btn btn-danger"
                @click="deleteEmployee(employee.id)"
              >
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      employees: [],
    };
  },
  created() {
    this.axios.get("http://127.0.0.1:8000/api/employees").then((response) => {
      this.employees = response.data;
      // console.log(this.employees);
    });
  },
  methods: {
    deleteEmployee(id) {
      this.axios
        .delete(`http://127.0.0.1:8000/api/employee/delete/${id}`)
        .then((response) => {
          let i = this.employees.map((item) => item.id).indexOf(id); // find index of your object
          this.employees.splice(i, 1);
          this.$router.push({ name: "employees" });
        });
    },
  },
};
</script>
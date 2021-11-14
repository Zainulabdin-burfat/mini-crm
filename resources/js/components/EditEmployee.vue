<template>
  <div>
    <h3 class="text-center">Edit Employee</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateEmployee" enctype="multipart/form-data">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" v-model="employee.first_name" />
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" v-model="employee.last_name" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" v-model="employee.email" />
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" v-model="employee.phone" />
          </div>
          <button type="submit" class="btn btn-primary">Update employee</button>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script>
    export default {
        data() {
            return {
                employee: {}
            }
        },
        created() {
            this.axios
                .get(`http://127.0.0.1:8000/api/employee/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.employee = response.data;
                    console.log(response);
                });
        },
        methods: {
            updateEmployee() {
                this.axios
                    .put(`http://127.0.0.1:8000/api/employee/update/${this.$route.params.id}`, this.employee)
                    .then((response) => {
                        this.$router.push({name: 'employees'});
                    });
            }
        }
    }
</script>
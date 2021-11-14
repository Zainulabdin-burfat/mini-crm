<template>
  <div>
    <h3 class="text-center">Edit Company</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateCompany" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="company.name" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" v-model="company.email" />
          </div>
          <div class="form-group">
            <label>Website</label>
            <input type="text" class="form-control" v-model="company.website" />
          </div>
          <button type="submit" class="btn btn-primary">Update Company</button>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script>
    export default {
        data() {
            return {
                company: {}
            }
        },
        created() {
            this.axios
                .get(`http://127.0.0.1:8000/api/company/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.company = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateCompany() {
                this.axios
                    .post(`http://127.0.0.1:8000/api/company/update/${this.$route.params.id}`, this.company)
                    .then((response) => {
                        this.$router.push({name: 'companies'});
                    });
            }
        }
    }
</script>
<template>
  <div>
    <h3 class="text-center">Add Company</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addCompany" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="company.name" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" v-model="company.email" />
          </div>
          <div class="form-group">
            <label>Logo</label>
            <!-- <input type="file" class="form-control" v-model="company.logo"> -->
            <input type="file" class="form-control" @change="onChange" />
          </div>
          <div class="form-group">
            <label>Website</label>
            <input type="text" class="form-control" v-model="company.website" />
          </div>
          <button type="submit" class="btn btn-primary">Add Company</button>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      company: {},
      file: "",
    };
  },
  methods: {
    onChange(e) {
      this.file = e.target.files[0];
    },
    addCompany(e) {

      e.preventDefault();
      let data = new FormData();
      data.append("image", this.file);
      data.append("name", this.company.name);
      data.append("email", this.company.email);
      data.append("website", this.company.website);

      this.axios
        .post("http://127.0.0.1:8000/api/company/add", data)
        .then((res) => {
         this.$router.push({ name:"companies" });
          // console.log(res);
        });

    },
  },
};
</script>
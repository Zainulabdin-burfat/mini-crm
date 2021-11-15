<template>
  <div>
    <h3 class="text-center">All Companies</h3>
    <br />

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Logo</th>
          <th>Email</th>
          <th>Website</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="company in companies" :key="company.id">
          <td>{{ company.id }}</td>
          <td><img v-bind:src="'http://localhost:8000/'+company.logo" width="100px" height="100px" /></td>
          <td>{{ company.name }}</td>
          <td>{{ company.email }}</td>
          <td>{{ company.website }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link :to="{ name: 'edit/company', params: { id: company.id } }"
                class="btn btn-primary">Edit</router-link>
              <button class="btn btn-danger" @click="deleteCompany(company.id)">Delete</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <nav aria-label="Page navigation example">
      <ul class="pagination d-flex" v-for="link in links" :key="link.label">
       <div v-if="link.url != null && link.label !='Next &raquo;' && link.label !='&laquo; Previous'">
        <li class="page-item"><a class="page-link btn" @click="getResults(link.label)">{{link.label}}</a></li>
       </div>
      </ul>
    </nav>

  </div>
</template>
  
<script>
export default {
  data() {
    return {
      companies: [],
      links:[]
    };
  },
  created() {
    this.getResults();
  },
  methods: {
    deleteCompany(id) {
      this.axios
        .delete(`http://127.0.0.1:8000/api/company/delete/${id}`)
        .then((response) => {
          let i = this.companies.map((item) => item.id).indexOf(id);
          this.companies.splice(i, 1);
        });
    },
    getResults(page) {
      if (typeof page === "undefined") {
        page = 1;
      }
      this.axios
        .get(`http://127.0.0.1:8000/api/companies/${page}?page=${page}`)
        .then(response => {
          this.companies = response.data.data;
          this.links = response.data.links;
        });
    }
  },
};
</script>
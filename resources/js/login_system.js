// example in login area:

export default {
    name: 'login',
    methods: {
        login: function () {
          this.$http.post('http://somehost/user/login', {
            password: this.password,
            email: this.email
          }).then(function (response) {
            if (response.status === 200 && 'token' in response.body) {
              this.$session.start()
              this.$session.set('jwt', response.body.token)
              Vue.http.headers.common['Authorization'] = 'Bearer ' + response.body.token
              this.$router.push('/panel/search')
            }
          }, function (err) {
            console.log('err', err)
          })
        }
    }
}


// logged in area:

export default {
  name: 'panel',
  data () {
    return { }
  },
  beforeCreate: function () {
    if (!this.$session.exists()) {
      this.$router.push('/')
    }
  },
  methods: {
    logout: function () {
      this.$session.destroy()
      this.$router.push('/')
    }
  }
}

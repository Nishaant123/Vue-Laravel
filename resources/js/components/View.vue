<template>
    <PageLoader />
    <div class="text-right mr-20"><button
        class="bg-red-600 mt-8 hover:bg-red-900 text-white font-bold py-2 px-7 rounded-lg focus:outline-none focus:shadow-outline"><router-link
          to="/allemployee">Back</router-link></button>
    </div>
    <div class="w-full flex justify-center">
      <div class="shadow-md bg-red-300 rounded-lg px-8 pt-6 pb-8 mb-4 w-1/2 divide-blue-200 divide-y">
        <div class="text-center items-center font-bold text-2xl border-2 border-green-600 py-4 bg-green-300 rounded-full">
          View  Employee:</div>
        <div>
          <label for="user-name" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Employee Name:</label>
          <input id="user-name" name="user-name" type="text"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            v-model="this.self.userName" readonly />
        </div>
        <div>
          <label for="age" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Employee Age:</label>
          <input id="age" name="age" type="number"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            v-model="this.self.userAge" ref="ageInput" readonly/>
        </div>
        <div>
          <label for="referrer" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Employee Education:</label>
          <select id="referrer"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="referrer" v-model="this.self.referrer"    disabled>
            <option value="">Select Education ....</option>
            <option value="Graduation">Graduation</option>
            <option value="Post-Graduation">Post-Graduation</option>
            <option value="Diploma-Holder">Diploma-Holder</option>
          </select>
        </div>
        <div>
          <h2 class="block text-gray-700 text-sm font-bold mb-2 mt-6">What are Employee interested in:</h2>
          <div>
            <input id="interest-news" name="interest" type="radio" value="news" v-model="this.self.interest" disabled/>
            <label for="interest-news">News</label>
          </div>
          <div>
            <input id="interest-tutorials" name="interest" type="radio" value="Tutorials" v-model="this.self.interest" disabled />
            <label for="interest-tutorials">Tutorials</label>
          </div>
        </div>
        <div>
          <h2 class="block text-gray-700 text-sm font-bold mb-2 mt-6">How do Employee learn:</h2>
          <div>
            <input id="how-video" name="how[]" type="checkbox" value="Books" v-model="this.self.how" disabled />
            <label for="how-video">Books</label>
          </div>
          <div>
            <input id="how-blogs" name="how[]" type="checkbox" value="Blogs" v-model="this.self.how" disabled />
            <label for="how-blogs">Blogs</label>
          </div>
          <div>
            <input id="how-other" name="how[]" type="checkbox" value="Other" v-model="this.self.how" disabled />
            <label for="how-other">Other</label>
          </div>
          <div class="py-2">
            <label for="referrer" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Choose Document:</label>
            <input type="file" name="document" @change="handledocumentUpload" id="document" disabled/>
          </div>
          <div class="py-2">
            <label for="referrer" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Choose Image:</label>
            <input type="file" name="image" @change="handleFileUpload" id="image" disabled/>
          </div>
          <div>
            <p v-if="!this.self.image">Not Image</p>
            <img v-else
              v-bind:src="this.self.imagepreview == null ? '../../../storage/images/' + this.self.image : this.self.imagepreview"
              height="100px" width="100px">
          </div>
        </div>

      </div>
    </div>
  
    <!-- {{ self }} -->
  </template>
  
  <script>
  import axios, { HttpStatusCode } from 'axios';
  import PageLoader from './pageloader.vue'
  export default {
    components: {
      PageLoader,
    },
    data() {
      return {
        id: '',
        selfList: [],
        self:
        {
          userName: '',
          userAge: '',
          referrer: '',
          interest: '',
          how: [],
          image: '',
          document: null,
          imagepreview: null
        }
      };
    },
    mounted() {
      // this.getData()
      this.id = this.$route.params.id;
      this.editEmployeeData(this.$route.params.id);
    },
    methods: {
  
      handleFileUpload(event) {
        this.self.image = event.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(this.self.image);
        reader.onload = event => {
          this.self.imagepreview = event.target.result;
        }
      },
  
      handledocumentUpload(event) {
        this.self.document = event.target.files[0];
      },
  
      editEmployeeData(id) {
        axios.get('/api/employee/' + id + '/edit').then(res => {
          console.log(res)
          this.self = res.data
        });
      },
  
      updateemployee() {
        if (confirm('Are You Sure ,You want to Update this Employee')) {
          let formData = new FormData();
          formData.append('userName', this.self.userName);
          formData.append('userAge', this.self.userAge);
          formData.append('referrer', this.self.referrer);
          formData.append('interest', this.self.interest);
          formData.append('how', this.self.how);
          formData.append('image', this.self.image);
          formData.append('document', this.self.document);
          axios.post('/api/employee/' + this.id + '/update', formData)
            .then(res => {
              this.$toast.success(`Success!!! Employee Update Successfully`, {
                position: "top",
              });
              if (res.status === 200) {
                this.$router.push({ path: '/allemployee' });
              } else {
                console.log('error')
              }
  
            })
        }
      },
  
      // getData(e) {
      //   axios.get('/api/get')
      //     .then(response => this.selfList = response.data)
      //     .catch(error => console.log(error))
      // },
    },
  }
  
  </script>
  
  
  
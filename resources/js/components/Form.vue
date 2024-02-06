<template>

  <div class="text-right mr-20"><button
      class="  bg-red-600 mt-8 hover:bg-red-900 text-white font-bold py-2 px-7 rounded-lg shadow"><router-link
        to="/allemployee">Back</router-link></button></div>
  <div class="w-full flex justify-center mt-4">
    <div class=" shadow-md rounded-lg px-8 pt-6 pb-8 mb-4  w-1/2 divide-blue-200 divide-y bg-red-300">
      <div class="text-center items-center font-bold text-2xl border-2 border-rose-600 py-4 bg-pink-300 rounded-full">Add
        Employee</div>
      <div>
        <label for="user-name" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Employee Name:</label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="user-name" name="user-name" type="text" v-model="this.self.userName" placeholder="Enter Employee Name"
          required />
      </div>
      <div>
        <label for="age" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Employee Age:</label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="age" name="age" type="number" v-model="this.self.userAge" ref="ageInput" placeholder="Enter Employee Age" />
      </div>
      <div>
        <label for="referrer" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Education?</label>
        <select id="referrer" name="referrer" v-model="this.self.referrer"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          <option value="">Select Education ....</option>
          <option value="Graduation">Graduation</option>
          <option value="Post-Graduation">Post-Graduation</option>
          <option value="Diploma-Holder">Diploma-Holder</option>
        </select>
      </div>
      <div>
        <h2 class="block text-gray-700 text-sm font-bold mb-2 mt-6">What are you interested in?</h2>
        <div>
          <input id="interest-news" name="interest" type="radio" value="news" v-model="this.self.interest" />
          <label for="interest-news">News</label>
        </div>
        <div>
          <input id="interest-tutorials" name="interest" type="radio" value="Tutorials" v-model="this.self.interest" />
          <label for="interest-tutorials">Tutorials</label>
        </div>
      </div>
      <div>
        <h2 class="block text-gray-700 text-sm font-bold mb-2 mt-6">How do you learn?</h2>
        <div>
          <input id="how-video" name="how[]" type="checkbox" value="Books" v-model="this.self.how" />
          <label for="how-video">Books</label>
        </div>
        <div>
          <input id="how-blogs" name="how[]" type="checkbox" value="Blogs" v-model="this.self.how" />
          <label for="how-blogs">Blogs</label>
        </div>
        <div>
          <input id="how-other" name="how[]" type="checkbox" value="Other" v-model="this.self.how" />
          <label for="how-other">Other</label>
        </div>
        <div class="py-2">
          <label for="referrer" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Choose Document:</label>
          <input type="file" name="document" @change="handledocumentUpload" id="document" />
        </div>
        <div class="py-2">
          <label for="referrer" class="block text-gray-700 text-sm font-bold mb-2 mt-6">Choose Image:</label>
          <input type="file" name="document" @change="handleFileUpload" id="img" />

        </div>
        <div v-if="this.self.imagepreview">
          <img :src="this.self.imagepreview" height="150px" width="150px">
        </div>
      </div>
      <!-- {{ self }} -->
      <div class="text-center">
        <button @click="submitForm"
          class="bg-blue-500 mt-8 hover:bg-blue-900 text-white font-bold py-2 px-7 rounded-lg focus:outline-none focus:shadow-outline">Save
          Data</button>
      </div>
    </div>
  </div>
  <!-- <div class=" mt-7 mb-32 flex justify-center">
    <table class=" text-sm  rtl:text-right text-gray-500 dark:text-gray-400  border-4 border-indigo-500/50">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <div class="font-bold text-2xl text-center mt-4 mb-4 ml-2 ">All View Employees</div>
        <tr class="border-2 divide-x divide-y border-indigo-500/50 divide-zinc-950 ">
          <th scope="col" class="px-3 py-2">Name</th>
          <th scope="col" class="px-3 py-2">Age</th>
          <th scope="col" class="px-3 py-3">Education</th>
          <th scope="col" class="px-3 py-3">interested in</th>
          <th scope="col" class="px-3 py-3">learning</th>
          <th scope="col" class="px-3 py-3">Image</th>
          <th scope="col" class="px-3 py-3">Document</th>
          <th scope="col" class="px-3 py-3">Action</th>
        </tr>
      </thead>
      <tbody class="  bg-yellow-100">
        <p v-if="selfList.length === 0" class="p-6 font-bold text-2xl text-center">No Employee Found...</p>
        <tr v-else-if="selfList.length > 0" v-for="self in selfList"
          class="border-2  border-black divide-x divide-slate-900 divide-solid">
          <td class="px-3">{{ self.userName }}</td>
          <td class="px-3">{{ self.userAge }}</td>
          <td class="px-3">{{ self.referrer }}</td>
          <td class="px-3">{{ self.interest }}</td>
          <td class="px-3">{{ self.how }}</td>
          <td><img v-bind:src="'../storage/images/' + self.image" height="100px" width="150px"></td>
          <td class="px-3"><a class="text-blue-700 underline hover:text-red-500"
              :href="'../storage/document/' + self.document" download>{{ self.document }}</a> </td>
          <td class="px-6">
            <button class="bg-green-700 mt-8 text-white font-bold py-2 px-4 mr-4 rounded-lg focus:outline-none focus:shadow-outline">
              <RouterLink :to="{ path: '/employees/' + self.id + '/edit' }"> Edit</RouterLink>
            </button> <button type="button" @click="removeEmployee(self.id)"
              class="bg-red-600 mt-4 mb-4 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div> -->
  <PageLoader />
</template>

<script>
import { HttpStatusCode } from 'axios';
import Child from './child.vue'
import PageLoader from './pageloader.vue'

export default {
  components: {
    PageLoader,
    Child
  },
  data() {
    return {
      isLoading: true,
      // selfList: [],
      self:
      {
        userName: '',
        userAge: '',
        referrer: '',
        interest: '',
        how: [],
        image: null,
        document: null,
        imagepreview: null
      }
    };
  },
  // mounted() {
  //   this.getData()
  // },
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

    submitForm(e) {
      e.preventDefault();
      let formData = new FormData();
      formData.append('userName', this.self.userName);
      formData.append('userAge', this.self.userAge);
      formData.append('referrer', this.self.referrer);
      formData.append('interest', this.self.interest);
      formData.append('how', this.self.how);
      formData.append('image', this.self.image);
      formData.append('document', this.self.document);
      axios.post('/api/post', formData)
        .then(res => {
          this.$toast.success(`Success!!! Employee Saved Successfully`, {
            position: "top",
          });
          this.self = {
            userName: '',
            userAge: '',
            referrer: 'Diploma-Holder',
            interest: '',
            how: [],
            image: null,
            document: null
          }
          // this.getData();
          if (res.status === 201) {
            this.$router.push({ path: '/allemployee' });
          } else {
            console.log('error')
          }
        }).catch(error => {
          console.log(error)
          this.$toast.error(`Somthing Went Rong !!`, {
            position: "top-right",
          });
        })

      // console.log('UserName:'+this.model.self.userName);
      // this.userName='';
      // console.log('User Age:');
      // console.log(this.userAge+5);
      // console.log(this.$refs.ageInput.value+5);
      // this.userAge=null;
      // console.log('Referrer:'+this.referrer);
      // this.referrer='Diploma-Holder';
      // console.log('Checkboxes:'+this.interest);
      // this.interest=[];
      // console.log('Radio Buttons:'+this.how);
      // this.how=null;
      // console.log('Rating:'+this.rating);
      // this.how=null;
    },

    // getData(e) {
    //   this.isLoading = true,
    //     axios.get('/api/get')
    //       .then(response => this.selfList = response.data)
    //       .catch(error => console.log(error))
    // },
    // removeEmployee(id) {
    //   if (confirm('Are You Sure ,you want to delete this Employee')) {
    //     axios.delete('/api/employee/' + id + '/delete').then(res => {
    //       // alert(res.data.message);
    //       this.getData();
    //       this.$toast.error(`Success!!! Employee Delete Successfully`, {
    //         position: "top",
    //       });
    //     });
    //   }
    // },
  },
}
</script>
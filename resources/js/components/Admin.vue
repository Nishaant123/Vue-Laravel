<template>
    <div class="max-w-[1320px] mx-auto grid lg:grid-cols-2 md:grid-cols-2">

        <div class="mt-8 mb-8 ml-14 mr-4 text-center flex w-40 pt-3 pb-3 pl-7 font-bold rounded-lg bg-pink-700 text-white">
            <router-link to="/form"> Add Employee </router-link>
        </div>
        <div class="mt-8 mb-8 ml-auto mr-14 text-center flex w-40 p-3 font-bold rounded-lg bg-pink-700 text-white">
            <router-link to="/">Back HomePage</router-link>
        </div>
    </div>
    <div class="font-bold text-2xl text-center p-6 mr-9 ml-9 bg-red-200 ">All Employees</div>
    <div class="  mb-32 flex justify-center">
        <table class=" text-sm  rtl:text-right text-gray-500 dark:text-gray-400  border-4 border-indigo-500/50">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border-2 divide-x divide-y border-indigo-500/50 divide-zinc-950 ">
                    <th scope="col" class="px-9 py-3">Name</th>
                    <!-- <th scope="col" class="px-9 py-3">Age</th>
                  <th scope="col" class="px-9 py-3">Education</th>
                  <th scope="col" class="px-9 py-3">interested in</th> -->
                    <!-- <th scope="col" class="px-9 py-3">learning</th> -->
                    <th scope="col" class="px-9 py-3">Image</th>
                    <th scope="col" class="px-9 py-3">Document</th>
                    <th scope="col" class="px-9 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-yellow-100">
                <p v-if="selfList.length === 0" class="p-6 font-bold text-2xl text-center">No Employee Found...</p>
                <tr v-else-if="selfList.length > 0" v-for="self in selfList"
                    class="border-2  border-black divide-x divide-slate-900 divide-solid">
                    <td class="px-3">{{ self.userName }}</td>
                    <!-- <td class="px-3">{{ self.userAge }}</td>
                  <td class="px-3">{{ self.referrer }}</td>
                  <td class="px-3">{{ self.interest }}</td> -->
                    <!-- <td class="px-3">{{ self.how }}</td> -->
                    <td>
                        <p v-if="!self.image" class="p-2 font-bold text-red-700 text-center">image not uploaded</p>
                        <img v-else v-bind:src="'../../../storage/images/' + self.image" width="150px" height="150px">
                    </td>
                    <td class="px-3">
                        <p v-if="!self.document" class=" font-bold text-red-700 text-center">Document not uploaded</p>
                        <a class="text-blue-700 underline hover:text-red-500" :href="'../storage/document/' + self.document"
                            download>{{ self.document }}</a>
                    </td>
                    <td class="px-5">

                        <RouterLink :to="{ path: '/employees/' + self.id + '/edit' }"> <button
                                class="bg-green-700 mt-8 text-white font-bold py-2 px-6 mr-4 rounded-lg focus:outline-none focus:shadow-outline">
                                Edit </button></RouterLink>


                        <RouterLink :to="{ path: '/employees/' + self.id + '/view' }"> <button
                                class="bg-blue-700 mt-8 text-white font-bold py-2 px-6 mr-4 rounded-lg focus:outline-none focus:shadow-outline">View
                            </button></RouterLink>

                        <button type="button" @click="method(self.id)"
                            class="bg-red-600 mt-4 mb-4 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: "Admin",
    props: {
        selfList: Array,
        method: Function
    },
}
</script>
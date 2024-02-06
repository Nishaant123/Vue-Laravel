<template>
    <div class="max-w-[1320px] mx-auto grid lg:grid-cols-3 md:grid-cols-2 gap-3 ">
        <h4 class="bg-green-500 text-center">This is Child Page</h4>
        <h6 class="bg-green-500 text-center">{{ name }}</h6>
        <p class="bg-green-500 text-center">{{ name1 }}</p>
        <p class="bg-green-500 text-center">{{ data.name }}</p>
        <p class="bg-green-500 text-center">{{ data.phone }}</p>
    </div>
    <div class="max-w-[1320px] mx-auto grid lg:grid-cols-4 md:grid-cols-2 gap-3">
        <button v-on:click="method(username)"
            class=" m-4 p-4 font-bold py-2 px-4 mr-4 rounded bg-green-700 mt-8 text-white">click me</button>
        <button v-on:click="getEmployee(username)"
            class="m-4 p-4  font-bold py-2 px-4 mr-4 rounded bg-green-700 mt-8 text-white">Get Employee</button>
    </div>
</template>
<script>
export default {
    name: "Child",
    data() {
        return {
            username: "Sonali Gupta"
        }
    },
    props: {
        name: String,
        name1: String,
        data: Object,
        method: Function
    },
    methods: {
        getEmployee(username) {
            this.$emit('toggle-favorite', username);
        }
    }
}
</script>
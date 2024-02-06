<template>
    <!-- <div>
        <nav type="dark" variant="dark">
            <b-navbar-nav>
                <router-link to="/allemployee">Home</router-link>
            </b-navbar-nav>
        </nav>
    </div> -->
    <div class="bg-yellow-100">
        <PageLoader />
        <div>
            <h4
                class="text-white-700 border-black	 border-2 text-center underline decoration-double uppercase bg-clip-border	bg-slate-400">
                Pass Data Parent to child Components</h4>
            <div class="max-w-[1320px] mx-auto grid lg:grid-cols-2 md:grid-cols-2">
                <div
                    class="mt-8 mb-8 ml-auto mr-4 text-center flex w-40 pt-3 pb-3 pl-7 font-bold rounded-lg bg-pink-700 text-white">
                    <router-link to="/allemployee">All Employee</router-link>
                </div>
                <div
                    class="mt-8 mb-8 ml-auto mr-4 text-center flex w-40 pt-3 pb-3 pl-7 font-bold rounded-lg bg-pink-700 text-white">
                    <router-link to="/FriendContact">Slots</router-link>
                </div>
            </div>
        </div>
        <div class="bg-red-500">{{ childuser }}</div>
        <div class="bg-red-500 text-center">{{ childuser1 }}</div>
        <Child name="Nishant Sharma" :data="user" :name1="name1" :method="getData" @toggle-favorite="onToggleFavorite">
        </Child>
    </div>
</template>
<script>
import Child from './child.vue'
import PageLoader from './pageloader.vue'
export default {
    name: "Home",
    components: {
        Child,
        PageLoader
    },
    data() {
        return {
            childuser: '',
            childuser1: '',
            name1: 'Nishu',
            user: {
                name: 'Nishu Sharma',
                phone: '7037745770'
            }
        }

    },
    methods: {
        getData(name) {
            alert("Function called")
            this.childuser = name
        },
        onToggleFavorite(value) {
            alert('child to parent data pass')
            this.childuser1 = value

        }
    }
}
</script>
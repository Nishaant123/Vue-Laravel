<template>
<Admin :selfList="selfList" :method="removeEmployee">
        </Admin>
</template>
<script>
import Admin from './Admin.vue'
export default {
    name: "AllEmployee",
    components: {
        Admin 
    },
    data() {
        return {
            selfList: [],
        };
    },
    mounted() {
        this.getData()
    },
    methods: {
        getData(e) {
            this.isLoading = true,
                axios.get('/api/get')
                    .then(response => this.selfList = response.data)
                    .catch(error => console.log(error))
        },
        removeEmployee(id) {
            if (confirm('Are You Sure ,you want to delete this Employee')) {
                axios.delete('/api/employee/' + id + '/delete').then(res => {
                    this.getData();
                    this.$toast.error(`Success!!! Employee Delete Successfully`, {
                        position: "top",
                    });
                });
            }
        },
    },

}
</script>
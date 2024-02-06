<template>
    <div class="m-8">
        <h1 class="bg-green-200">Slots in vue js3</h1>
        <student>
            <h3 class="bg-green-200 mt-4">H3 tag work</h3>
        </student>
        <div class="mt-4">
            <student>
                <template v-slot:header>
                    <a href="#" class="bg-blue-200">href link work</a>
                </template>
                <template v-slot:body>
                    <h2>Body Part in slots</h2>
                </template>
                <template v-slot:footer>
                    <button class="ml-4 bg-blue-300">Click me</button>
                </template>
            </student>
        </div>
    </div>
</template>
<script>
import student from './student.vue'
export default {
    name: 'teacher',
    components: {
        student
    }
}
</script>
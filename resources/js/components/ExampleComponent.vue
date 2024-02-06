<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">

                <div class="card-header center">
                    Example Component
                </div>

                <div class="form-group">
                    <h5>**Data Binding**</h5>
                    <input type="text" name="textbox1" v-model='model' class="form-control" autocomplete="off"> {{ model }}
                </div>

                <div>
                    <h5>**simple message**</h5>
                    {{ message }}
                </div>

                <div>
                    <h5>**For Loop**</h5>
                    <div v-for="user in users">
                        {{ user.name }}
                    </div>
                </div>

                <div>
                    <h5>**V-model**</h5>
                    <form v-on:submit.prevent="addItem">
                        <input type="text" required placeholder="Employees Name" v-model="name">
                        <input type="text" required placeholder="Employees N0." v-model="number">
                        <button type="submit">Add Employees</button>
                    </form>

                    <p>Employees list, v-for,remove employees :</p>
                    <ul>
                        <li v-for="(item, index) in shoppingList" @click="remove_emp(index)">{{ item.name }}, {{ item.number }}
                            - {{ index }}</li>
                    </ul>
                </div>

                <div class="v-bind">
                    <h5>**Site Link**</h5>
                    <a v-bind:href="sitelink">Dogma System</a>
                </div>

                <div>
                    <h5>**Outputing Content with HTML**</h5>
                    <p v-html="message"></p>
                </div>

                <div>
                    <h5>**Events in action**</h5>
                    <button v-on:click="counter++">Add</button>
                    <button v-on:click="counter = counter - 2">Reduce</button>
                    <p>Result:{{ counter }}</p>
                </div>

                <div>
                    <h5>**Events with Method**</h5>
                    <button v-on:click="add1">Add</button>
                    <button v-on:click="reduce1">Reduce</button>
                    <p>Result:{{ counter1 }}</p>
                </div>

                <div>
                    <h5>**Working with Event & method Arguments**</h5>
                    <button v-on:click="add(10)">Add 10</button>
                    <button v-on:click="reduce(5)">Reduce 5</button>
                    <p>Result:{{ counter2 }}</p>
                </div>

                <form action="">
                    <h5>**Looking Content with v-once**</h5>
                    <p v-once>Result:{{ counter2 }}</p>
                </form>

                <div>
                    <input type="text" v-bind:value="fullname" v-on:input="setName($event)">
                    <button v-on:click="resetInput">Reset Name</button>
                    <p>Your Name:{{ fullname }}</p>
                </div>

                <div>
                    <h5>**Computed Properties**</h5>
                    <p>{{ getComputed }}</p>
                </div>
                <div>
                    <h5>**Watcher and Inline Css**</h5>
                    <p>{{ count }}</p>
                    <button v-on:click="count++" style="borderColor:rgb(5, 66, 5)"> + </button>
                    <button v-on:click="count--"> - </button>
                </div>
                <div>
                    <h5>**Conditionaly v-if,v-else**</h5>
                    <p v-if="count > 10">count greater then 10</p>
                    <p v-else-if="count < 10">count less then 10</p>
                    <p v-else>count equal to 10</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            message: "<h5>my First massage vue!!</h5> ",
            model: "This is new Model",
            sitelink: "https://dogmasystems.in/",
            users: [
                { 'id': 1, 'name': 'John' },
                { 'id': 2, 'name': 'Mark' },
                { 'id': 3, 'name': 'Joshef' },
                { 'id': 4, 'name': 'Duo' },
            ],
            name: null,
            number: null,
            shoppingList: [
                { name: 'nishant', number: 1 }
            ],
            counter: 0,
            counter1: 0,
            counter2: 10,
            fullname: '',
            doller: 100,
            rupees: 80,
            discount: 2000,
            count: 10,
        }
    },
    methods: {
        addItem() {
            let item = {
                name: this.name,
                number: this.number
            }
            this.shoppingList.push(item)
            this.name = null
            this.number = null
        },
        add1() {
            this.counter1 = this.counter1 + 1;
        },
        reduce1() {
            this.counter1 = this.counter1 - 1;
        },

        add(num) {
            this.counter2 = this.counter2 + num;
        },
        reduce(num) {
            this.counter2 = this.counter2 - num;
        },
        setName(event) {
            this.fullname = event.target.value + '';
        },
        resetInput() {
            this.fullname = '';
        },
        remove_emp(index) {
            this.shoppingList.splice(index, 1);

        }
    },
    computed: {
        getComputed() {
            return (this.doller * this.rupees) - this.discount;
        }
    },
    watch: {
        count() {
            alert('Value Changes');
        }
    }
}
</script>

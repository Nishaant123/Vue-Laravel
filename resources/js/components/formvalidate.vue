<template>
    <div id="app">
      <Form>
        <Field name="email" type="email" :rules="validateEmail" />
        <ErrorMessage name="email" class='text-red-500'/><br>
        <button  @submit="onSubmit">Sign up</button>
      </Form>
    </div>
  </template>
  <script>
  import { Form, Field, ErrorMessage  } from 'vee-validate';
  export default {
    components: {
      ErrorMessage,
      Form,
      Field,
   

    },
    methods: {
      onSubmit(values) {
        console.log(JSON.stringify(values, null, 2));
      },
      validateEmail(value) {
        if (!value) {
          return 'This field is required';
        }
        const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (!regex.test(value)) {
          return 'This field must be a valid email';
        }
        return true;
      },
    },
  };
  </script>
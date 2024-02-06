<template>
  <jlDatatable
  :url="datatable.url"  
  :columns="datatable.columns"
  ></jlDatatable>
  </template>


  <script>
  import jlDatatable from 'jl-datatable';
  export default {
   name:'FriendContact',
   components:{
    jlDatatable,
   },
    data() {
      return {
        datatable: {
          url:'http://127.0.0.1:8000/api/users',
          columns:[
            {
              title:'ID',
              key:'id',
              width:'5%',
              isSort:true,
            },
            {
              title:'Name',
              key:'name',
            },
            {
              title:'Email',
              key:'email',
            },
          ]
        },
      };
    },
  };
  </script>
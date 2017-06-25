<template>
<div>
  <v-app-bar>
    <v-btn-dropdown v-bind:options="dropdown_dept" max-height="auto" overflow label="Select Dept"></v-btn-dropdown>
    <v-btn-dropdown v-bind:options="dropdown_task_options" max-height="auto" overflow label="Select Task"></v-btn-dropdown>
    <v-btn-dropdown v-bind:options="dropdown_access" max-height="auto" overflow label="Access"></v-btn-dropdown>
    <v-spacer></v-spacer>
    <router-link to="/tasks/create"><v-btn round primary light>Create Task</v-btn></router-link>
  </v-app-bar>
  <router-view></router-view>
</div>
</template>
<script>
    export default {
        data() {
            return {
                 dropdown_dept: [],
                 dropdown_task_options: [
                  { text: 'All my Tasks' },
                  { text: 'My Overdue Tasks' },
                  { text: 'My Open Tasks' }
                ],
                 dropdown_access: [
                  { text: 'All' },
                  { text: 'Public' },
                  { text: 'Private' }
                ],
            }
        },
        mounted() {
          this.fetchDeptList();
        },
        methods: {
          fetchDeptList: function() {
              axios.get('/depts').then((response) => {
                 for (var i = 0; i < response.data.length; i++){
                    this.dropdown_dept.push({ text: response.data[i].name, id: response.data[i].id }); 
                }
              })
              .catch(function (err) {
                  this.errors = err.response.data;
                  console.log(err);
              });
          },
        }
    }
</script>
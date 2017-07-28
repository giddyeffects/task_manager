<template>
<div>
  <v-app-bar>
<!--   <v-select v-bind:items="dropdown_dept"
              v-model="dept"
              label="Select Dept"
              max-height="auto"
              single-line
              dark
              auto
              item-value="text"
            ></v-select> -->
    <v-menu offset-y>
      <v-btn primary light slot="activator">Select Dept</v-btn>
      <v-list>
        <v-list-item v-for="item in dropdown_dept" :key="item">
          <v-list-tile @click.native="topMenu('dept',item.text)">
            <v-list-tile-title>{{ item.text }}</v-list-tile-title>
          </v-list-tile>
        </v-list-item>
      </v-list>
    </v-menu>

    <v-menu offset-y>
      <v-btn primary light slot="activator">Select Task</v-btn>
      <v-list>
        <v-list-item v-for="item in dropdown_task_options" :key="item">
          <v-list-tile @click.native="topMenu('task',item.text)">
            <v-list-tile-title>{{ item.text }}</v-list-tile-title>
          </v-list-tile>
        </v-list-item>
      </v-list>
    </v-menu>

    <v-menu offset-y>
      <v-btn primary light slot="activator">Access</v-btn>
      <v-list>
        <v-list-item v-for="item in dropdown_access" :key="item">
          <v-list-tile @click.native="topMenu('access',item.text)">
            <v-list-tile-title>{{ item.text }}</v-list-tile-title>
          </v-list-tile>
        </v-list-item>
      </v-list>
    </v-menu>
    <v-spacer></v-spacer>
    <router-link to="/tasks/create"><v-btn round primary light>Create Task</v-btn></router-link>
  </v-app-bar>
  {{ dept }} {{ taskType }} {{ accessLevel }}
  <router-view></router-view>
</div>
</template>
<script>
    export default {
        data() {
            return {
              dept: '',
              taskType: '',
              accessLevel: '',
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
              axios.get('/api/depts').then((response) => {
                 for (var i = 0; i < response.data.length; i++){
                    this.dropdown_dept.push({ text: response.data[i].name, id: response.data[i].id }); 
                }
              })
              .catch(function (err) {
                  this.errors = err.response.data;
                  console.log(err);
              });
          },
          topMenu: function(slot, text){
            if (slot === 'dept') this.dept = text;
            else if (slot === 'task') this.taskType = text;
            else if (slot === 'access') this.accessLevel = text;
          }
        }
    }
</script>
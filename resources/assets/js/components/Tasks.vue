<template>
<div>
    <app-topbar></app-topbar>
     <v-card>
        <v-card-title>
          My Tasks
          <v-spacer></v-spacer>
          <v-text-field append-icon="search" label="Search Tasks" single-line hide-details v-model="search"></v-text-field>
        </v-card-title>
        <v-data-table :headers="headers" :items="list" :search="search" :no-data-text="noData" :loading="showLoading">
            <template slot="items" scope="props">
<td>
    <v-edit-dialog @open="props.item._title = props.item.title" @cancel="props.item.title = props.item._title || props.item.title" lazy> {{ props.item.title }}
    <v-text-field slot="input" label="Edit" :value="props.item.title" @change="val => props.item.title = val" single-line counter="counter"></v-text-field></v-edit-dialog>
</td>
                <td class="text-xs-right">{{ props.item.category_id }}</td>
                <td class="text-xs-right">{{ props.item.assigned_id }}</td>
                <td class="text-xs-right">{{ props.item.priority }}</td>
                <td class="text-xs-right">{{ props.item.created_at }}</td>
                <td class="text-xs-right">{{ props.item.due_date }}</td>
                <td class="text-xs-right">{{ props.item.status_id }}</td>
            </template>
            <template slot="pageText" scope="{ pageStart, pageStop }">
                From {{ pageStart }} to {{ pageStop }}
            </template>
        </v-data-table>



        <!-- <v-card-text>
          <v-list two-line subheader>
            <v-list-item v-for="task in list" v-bind:key="task.title">
              <v-list-tile avatar>
                <v-list-tile-content>
                  <v-list-tile-title>{{ task.title }}</v-list-tile-title>
                  <v-list-tile-sub-title>{{ task.description }}</v-list-tile-sub-title>
                </v-list-tile-content>
                <v-list-tile-action>
        <button @click="showTask(task.id)" class="btn primary btn--small">Edit</button>
                                <button @click="deleteTask(task.id)" class="btn danger btn-small">Delete</button>
                </v-list-tile-action>
              </v-list-tile>
            </v-list-item>
          </v-list>
        </v-card-text> -->
    </v-card>
</div>
</template>

<script>
    export default {
        data() {
            return {
                edit: false,
                list: [],
                categoryOptions: [],
                userOptions: [],
                errors: {},
                showLoading: true,
                noData: 'You have no tasks',
                search: '',
                pagination: {},
                headers: [
                    {
                        text: 'Title',
                        align: 'left',
                        sortable: false,
                        value: 'title'
                    },
                    { text: 'Category', value: 'category_id' },
                    { text: 'Assigned To', value: 'assigned_id' },
                    { text: 'Priority', value: 'priority' },
                    { text: 'Created On', value: 'created_at' },
                    { text: 'Due Date', value: 'due_date' },
                    { text: 'Status', value: 'status_id' }
                ],
                task: {
                    id: '',
                    title: '',
                    description: '',
                    due_date:'',
                    priority: 'normal',
                    category_id: 0,
                    assigned_id: 0,
                    creator_id: user_id,
                    repeat: 'never',
                    end_repeat_date: '',
                    set_reminder: false,
                    reminder: '',
                    isprivate: 0,
                },
                priorityOptions: [
                     'low','normal','high','emergency'
                ],
                repeatOptions: [
                     'never','daily','weekly','fortnightly', 'monthly', 'yearly'
                ],
            }
        },
        
        mounted() {
            this.fetchTaskList();
            this.getCategories();
            this.getUsers();
        },
        
        methods: {
            fetchTaskList: function() {
                axios.get('api/tasks').then((response) => {
                    //console.log(response.data);
                    this.list = response.data;
                    this.showLoading = false;
                    
                })
                .catch(function (err) {
                    this.errors = err.response.data;
                    console.log(err);
                });
            },
            getCategories: function(){
                axios.get('/api/categories').then((response) => {
                    //console.log("categories "+response.data);
                    //this.categoryOptions = response.data;
                    for (var i = 0; i < response.data.length; i++){
                        this.categoryOptions.push({ text: response.data[i].name, id: response.data[i].id }); 
                    }
                    
                })
                .catch(function (err) {
                    this.errors = err.response.data;
                    console.log(err);
                });
            },
            getUsers: function(){
                axios.get('/api/gettheusers').then((response) => {
                    //console.log("users "+response.data);
                    for (var i = 0; i < response.data.length; i++){
                        this.userOptions.push({text: response.data[i].firstname+' '+response.data[i].lastname, id: response.data[i].id }); 
                    }
                    
                })
                .catch(function (err) {
                    this.errors = err.response.data;
                    console.log(err);
                });
            },
            getErrors(field){
                if(this.errors[field]){
                    return this.errors[field][0];
                }
            },
            createTask: function () {
                var self = this;
                let params = Object.assign({}, self.task);
                //console.log("task to create "+self.task);
                axios.post('api/task/store', params)
                .then(function (response) {
                    console.log(response);
                })
                .catch( function (err) {
                    self.errors = err.response.data;
                    console.log(err);
                });
                self.task.title = ''
                self.edit = false
                self.fetchTaskList()
            },

            updateTask: function(id) {
                var self = this;
                let params = Object.assign({}, self.task);
                axios.patch('api/task/' + id, params)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function(err) {
                    self.errors = err.response.data;
                    console.log(err);
                });
                
                self.task.title = ''
                self.edit = false
                self.fetchTaskList()
            },

            showTask: function(id) {
                var self = this;
                axios.get('api/task/' + id)
                .then(function(response) {
                    self.task.id = response.data.id
                    self.task.title = response.data.title
                    self.task.description = response.data.description
                })
                self.$refs.titleinput.focus()
                self.edit = true
            },

            deleteTask: function (id) {
                swal({
                  title: "Are you sure?",
                  text: "You will not be able to access this task!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel!",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function(isConfirm){
                  if (isConfirm) {
                        axios.delete('api/task/' + id)
                        .then(function(res) {
                            this.fetchTaskList();
                            //console.log(res);
                        })
                        .catch(function (err) {
                            this.errors = err.response.data;
                            console.log(err);
                        });
                        this.fetchTaskList();
                  } else {
                    swal("Cancelled", "Your task has not been deleted", "error");
                  }
                });

            },
        }
    }
</script>
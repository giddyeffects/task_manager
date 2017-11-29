<template>
<div>
    <app-topbar></app-topbar>
    <v-alert error dismissible v-model="alert">
    	<div v-for="error in errors" :key="error">{{ error }}</div>
    </v-alert>
    <v-layout row wrap>
     <v-card offset-xs1 class="card__text">
        <v-card-row class="indigo">
          <v-card-title>
            <span class="white--text">Create Task</span>
            <v-spacer></v-spacer>
          </v-card-title>
        </v-card-row>
        <form action="#" @submit.prevent="edit ? updateTask(task.id) : createTask()">
          <v-card-text>
            <v-card-row height="90px">
              <v-flex xs4>
                <v-subheader><strong>Title:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                <v-text-field name="title" label="Enter Task Title" v-model="task.title" ref="titleinput" @change="clearErrors('title')" required></v-text-field>
                <div v-if="hasErrors('title')" class="input-group input-group__details"><div class="input-group__messages"><div class="input-group__error" v-text="getErrors('title')"></div></div></div>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <v-card-row row>
              <v-flex xs4>
                <v-subheader><strong>Description:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                <v-text-field name="description" label="Enter a description" multi-line v-model="task.description" @change="clearErrors('description')" required></v-text-field>
                <div v-if="hasErrors('description')" class="input-group input-group__details"><div class="input-group__messages"><div class="input-group__error" v-text="getErrors('description')"></div></div></div>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <v-card-row height="80px">
              <v-flex xs4>
                <v-subheader><strong>Due Date:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                <v-menu lazy :close-on-content-click="false" transition="v-scale-transition" offset-y :nudge-left="56">
                  <v-text-field name="due_date" slot="activator" label="Select the Due Date" v-model="task.due_date" prepend-icon="event" @change="clearErrors('due_date')" readonly required></v-text-field>
                  <v-date-picker v-model="task.due_date" no-title scrollable actions>
                    <template scope="{ save, cancel }">
                      <v-card-row actions>
                        <v-btn flat primary @click.native="cancel()">Cancel</v-btn>
                        <v-btn flat primary @click.native="save()">Save</v-btn>
                      </v-card-row>
                    </template>
                  </v-date-picker>
                </v-menu>
                <div v-if="hasErrors('due_date')" class="input-group input-group__details"><div class="input-group__messages"><div class="input-group__error" v-text="getErrors('due_date')"></div></div></div>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <v-card-row height="80px">
              <v-flex xs4>
                <v-subheader><strong>Priority:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                  <v-select label="Priority" hint="Select task priority" persistent-hint :items="priorityOptions" v-model="task.priority"></v-select>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <v-card-row height="80px">
              <v-flex xs4>
                <v-subheader><strong>Category:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                  <v-select name="category_id" label="Category" hint="Select task category" persistent-hint :items="categoryOptions" v-model="task.category_id" item-value="id" item-text="text" @input="clearErrors('category_id')" required></v-select>
                  <div v-if="hasErrors('category_id')" class="input-group input-group__details"><div class="input-group__messages"><div class="input-group__error" v-text="getErrors('category_id')"></div></div></div>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <v-card-row height="80px">
              <v-flex xs4>
                <v-subheader><strong>Assign To:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                  <v-select name="assigned_id" label="Assign To" hint="Select user to assign task" persistent-hint :items="userOptions" v-model="task.assigned_id" item-value="id" item-text="text" @input="clearErrors('assigned_id')" required></v-select>
                  <div v-if="hasErrors('assigned_id')" class="input-group input-group__details"><div class="input-group__messages"><div class="input-group__error" v-text="getErrors('assigned_id')"></div></div></div>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <v-card-row height="80px">
                <v-flex xs4>
                    <v-subheader><strong>Private Task:</strong></v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-switch v-model="task.isprivate" primary></v-switch>
                </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <v-card-row height="80px">
                <v-flex xs4>
                    <v-subheader><strong>Remind me on a date:</strong></v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-switch v-model="task.set_reminder" primary></v-switch>
                </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text v-if="task.set_reminder">
            <v-card-row height="80px">
              <v-flex xs4>
                <v-subheader><strong>Reminder Date:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                <v-menu lazy :close-on-content-click="false" transition="v-scale-transition" offset-y :nudge-left="56">
                  <v-text-field name="reminder" slot="activator" label="Select the reminder date" v-model="task.reminder" prepend-icon="event" @change="clearErrors('reminder')" readonly></v-text-field>
                  <v-date-picker v-model="task.reminder" no-title scrollable actions>
                    <template scope="{ save, cancel }">
                      <v-card-row actions>
                        <v-btn flat primary @click.native="cancel()">Cancel</v-btn>
                        <v-btn flat primary @click.native="save()">Save</v-btn>
                      </v-card-row>
                    </template>
                  </v-date-picker>
                </v-menu>
                <div v-if="hasErrors('reminder')" class="input-group input-group__details"><div class="input-group__messages"><div class="input-group__error" v-text="getErrors('reminder')"></div></div></div>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text v-if="task.set_reminder">
            <v-card-row height="80px">
              <v-flex xs4>
                <v-subheader><strong>Task Repeat:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                  <v-select label="Repeat" hint="Does the task repeat?" persistent-hint :items="repeatOptions" v-model="task.repeat" :required="task.set_reminder"></v-select>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text v-if="(task.set_reminder && task.repeat != 'never')">
            <v-card-row height="80px">
              <v-flex xs4>
                <v-subheader><strong>End Repeat Date:</strong></v-subheader>
              </v-flex>
              <v-flex xs8>
                <v-menu lazy :close-on-content-click="false" transition="v-scale-transition" offset-y :nudge-left="56">
                  <v-text-field slot="activator" label="Select the end repeat date" v-model="task.end_repeat_date" prepend-icon="event" @change="clearErrors('end_repeat_date')" readonly></v-text-field>
                  <v-date-picker v-model="task.end_repeat_date" no-title scrollable actions>
                    <template scope="{ save, cancel }">
                      <v-card-row actions>
                        <v-btn flat primary @click.native="cancel()">Cancel</v-btn>
                        <v-btn flat primary @click.native="save()">Save</v-btn>
                      </v-card-row>
                    </template>
                  </v-date-picker>
                </v-menu>
                <div v-if="hasErrors('end_repeat_date')" class="input-group input-group__details"><div class="input-group__messages"><div class="input-group__error" v-text="getErrors('end_repeat_date')"></div></div></div>
              </v-flex>
            </v-card-row>
          </v-card-text>
          <v-card-text>
            <small>* indicates required field</small>
            <div>
              <span class="input-group-btn">
                  <v-btn v-show="!edit" type="submit" outline class="teal--text" :disabled="anyErrors()">Create Task</v-btn>
                  <v-btn v-show="edit" type="submit" outline class="teal--text">Edit Task</v-btn>
              </span>
            </div>
          </v-card-text>
        </form>
        <!-- <v-list two-line subheader>
          <v-subheader inset>My Tasks</v-subheader>
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
        </v-list> -->

    <v-snackbar
      :timeout="snackbar.timeout"
      :top="snackbar.top"
      :right="snackbar.right"
      :success="snackbar.context === 'success'"
      :info="snackbar.context === 'info'"
      :warning="snackbar.context === 'warning'"
      :error="snackbar.context === 'error'"
      :multi-line="snackbar.mode === 'multi-line'"
      :vertical="snackbar.mode === 'vertical'"
      v-model="snackbar.show"
    >
      {{ snackbar.text }}
      <v-btn dark flat @click.native="snackbar.show = false">Close</v-btn>
    </v-snackbar>

    </v-card>
  </v-layout>
</div>
</template>

<script>
    export default {
        data() {
            return {
                user_id: user_id,
                edit: false,
                alert: false,
                snackbar: {
                	show: false,
                	text: '',
                	timeout: 3000,
                	context: '',
                	mode: '',
                	top:true,
                	right:true,
                },
                list: [],
                categoryOptions: [],
                userOptions: [],
                errors: {},
                task: {
                    id: '',
                    title: '',
                    description: '',
                    due_date:'',
                    priority: 'normal',
                    category_id: null,
                    assigned_id: null,
                    creator_id: this.user_id,
                    repeat: 'never',
                    end_repeat_date: '',
                    set_reminder: false,
                    reminder: '',
                    isprivate: false,
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
                    
                })
                .catch(function (err) {
                    this.errors = err.response.data;
                    this.alert = true;
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
                    this.alert = true;
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
                    this.alert = true;
                    console.log(err);
                });
            },
            hasErrors(field){
            	return this.errors.hasOwnProperty(field);
            },
            getErrors(field){
                if(this.errors[field]){
                    return this.errors[field][0];
                }
            },
            clearErrors(field){
            	delete this.errors[field];
            },
            anyErrors(){
            	return Object.keys(this.errors).length > 0 ;
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
                    self.alert = true;
                    console.log(err);
                });
                //self.task.title = ''
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
                    self.alert = true;
                    console.log(err);
                });
                
                //self.task.title = ''
                self.edit = false
                self.fetchTaskList()
            },

            showTask: function(id) {
                axios.get('api/task/' + id)
                .then(function(response) {
                    this.task.id = response.data.id
                    this.task.title = response.data.title
                    this.task.description = response.data.description
                })
                this.$refs.titleinput.focus()
                this.edit = true
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
<template>
<v-card>
    <v-card-row class="indigo">
      <v-card-title>
        <span class="white--text">My Account</span>
        <v-spacer></v-spacer>
        <div>
          <v-menu id="marriot" bottom left origin="top right">
            <v-btn icon="icon" slot="activator" class="white--text">
              <v-icon>more_vert</v-icon>
            </v-btn>
            <v-list>
              <v-list-item>
                <v-list-tile>
                  <v-list-tile-title>Edit</v-list-tile-title>
                </v-list-tile>
              </v-list-item>
              <v-list-item>
                <v-list-tile>
                  <v-list-tile-title>Send Feedback</v-list-tile-title>
                </v-list-tile>
              </v-list-item>
            </v-list>
          </v-menu>
        </div>
      </v-card-title>
    </v-card-row>
    <v-card-text>
      <v-card-row height="30px">
        <v-icon class="mr-5" dark>face</v-icon>
        <v-flex xs4>
            <v-subheader>First Name:</v-subheader>
        </v-flex>
        <v-flex xs8>
          <v-text-field name="input-3" label="First Name" :value="user.firstname" :disabled="!edit" v-model="user.firstname" single-line></v-text-field>
        </v-flex>
      </v-card-row>
    </v-card-text>
    <v-divider></v-divider>
    <v-card-text>
      <v-card-row height="30px">
        <v-icon class="mr-5" dark>face</v-icon>
        <v-flex xs4>
            <v-subheader>Last Name:</v-subheader>
        </v-flex>
        <v-flex xs8>
          <v-text-field name="input-3" label="Last Name" :value="user.lastname" :disabled="!edit" v-model="user.lastname" single-line></v-text-field>
        </v-flex>
      </v-card-row>
    </v-card-text>
    <v-divider></v-divider>
    <v-card-text>
      <v-card-row height="30px">
        <v-icon class="mr-5" dark>face</v-icon>
        <v-flex xs4>
            <v-subheader>Email:</v-subheader>
        </v-flex>
        <v-flex xs8>
          <strong>{{ user.email }}</strong>
        </v-flex>
      </v-card-row>
    </v-card-text>
    <v-divider></v-divider>
    <v-card-text>
      <v-card-row height="30px">
        <v-icon class="mr-5" dark>face</v-icon>
        <v-flex xs4>
            <v-subheader>Vacation:</v-subheader>
        </v-flex>
        <v-flex xs8>
          <v-checkbox  v-model="user.vacation" dark :disabled="!edit"></v-checkbox>
        </v-flex>
      </v-card-row>
    </v-card-text>
    <v-divider></v-divider>
    <v-card-row actions>
      <v-btn flat class="green--text darken-1" @click.native="toggleEdit">Edit</v-btn>
    </v-card-row>
  </v-card>
</template>

<script>
    export default {
        data () {
            return {
                user: {
                    firstname:'',
                    lastname:'',
                    email:'',
                    active:0,
                    dept_id:0,
                    role_id:0,
                    vacation:0,
                    phone:'',
                    signature:''
                },
                user_id: user_id,
                username: username,
                edit: false,
            }
        },
        methods: {
            getUser: function() {
                axios.get('api/user/' + this.user_id).then((response) => {
                    this.user.firstname = response.data.firstname;
                    this.user.lastname = response.data.lastname;
                    this.user.email = response.data.email;
                    this.user.active = response.data.active;
                    this.user.dept_id = response.data.dept_id;
                    this.user.role_id = response.data.role_id;
                    this.user.vacation = response.data.vacation;
                    this.user.phone = response.data.phone;
                    this.user.signature = response.data.signature;
                    console.log('response.data is '+ response.data);
                })
                .catch(function (e){
                    console.log(e);
                });
            },
            toggleEdit: function() {
                this.edit = !this.edit;
            }
        },
        mounted() {
            this.getUser();
        }
    }
</script>

<template>
     <v-container grid-list-md class="pop">
        <v-card class="rounded-xl" height="650">
        <v-layout row wrap class="mt-5">
            <v-flex xs12 md6 class="pt-12">
                    <!-- <v-img src="../assets/pps-logo.png" class="mx-auto mt-12" width="200"></v-img>
                    <a href="https://pps.org.ph/"><h1 class="text-center mt-3 below-img">pps.org.ph</h1></a> -->
            </v-flex>
            <v-flex xs12 md6>
                <v-card class="mx-auto rounded-xl mt-3 mb-3" max-width="500" v-if="registerSuccess == false">
                    <v-card-title class="pt-12">
                        <v-btn text color="green accent-4" @click="registration = true" class="ml-6" :class="{'ifSelected' : registration == true || registration_p2 == true || registration_p3 == true}"> <h3>Register</h3> </v-btn>
                        <v-spacer></v-spacer>
                        <v-btn text color="green accent-4" @click="login_view" class="mr-5" :class="{'ifSelected' : registration == false && registration_p2 == false && registration_p3 == false}"> <h3>Login</h3> </v-btn>
                    </v-card-title>
                    <v-card-text class="mt-8 pl-12 pr-12">
                        <div v-if="registration">
                            <v-radio-group v-model="register_data.user_type" row>
                                <v-radio color="green accent-4" label="Seller" value="1"></v-radio>
                                <v-spacer></v-spacer>
                                <v-radio color="green accent-4" label="Buyer" value="2"></v-radio>
                            </v-radio-group>
                            <v-text-field v-model="register_data.first_name" label="First Name" outlined :counter="15" :rules="fRules"></v-text-field>
                            <v-text-field v-model="register_data.surname" label="Surname" outlined :counter="15" :rules="sRules" required></v-text-field>
                            <v-text-field v-model="register_data.email" label="Email" outlined :rules="emailRules" :counter="30" required></v-text-field>
                            <v-text-field v-model="register_data.password" label="Password" outlined :rules="[rules.required, rules.min]" counter hint="At least 8 characters" :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'" :type="show_password ? 'text' : 'password'" @click:append="show_password = !show_password" required></v-text-field>
                        </div>
                        <div v-else-if="registration_p2">
                            <v-text-field v-model="register_data.location" label="Location" outlined></v-text-field> 
                            <v-text-field v-model="register_data.boundary" label="Boundary" outlined></v-text-field> 
                            <div class="text-center">Note: You can change it anytime in your account.</div>
                        </div>
                         <div v-else-if="registration_p3">
                            <div class="text-center">
                                <h3>Valid ID</h3>
                                <h5>Choose 1 Valid ID</h5>
                                <v-select label="Kind of ID" dense outlined :items="ids" class="mt-3" v-model="register_data.kind_id"></v-select>
                            </div>
                                <input type="file" @change="previewInsertedImg"/>
                                    <div class="previewImage mt-5">
                                        <img v-if="imageUrl" :src="imageUrl" />
                                    </div>
                            <div class="valerror mt-5">
                                {{registerValidation}}
                            </div>
                        </div>
                        <div v-else>
                            <v-text-field v-model="login_data.email" label="Email" outlined :rules="emailRules" :counter="30" required></v-text-field>
                            <v-text-field v-model="login_data.password" label="Password" outlined :rules="[rules.required, rules.min]" counter hint="At least 8 characters" :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'" :type="show_password ? 'text' : 'password'" @click:append="show_password = !show_password" required></v-text-field>
                            <div class="ml-12 pl-12 valerror">{{loginValidation}}</div>
                        </div>
                    </v-card-text>
                    <v-card-actions class="justify-center">
                        <div v-if="registration">
                            <v-btn v-on:click="register_p2" class="pl-12 pr-12 mb-5 primary green accent-4"> Register</v-btn>
                        </div>
                        <div v-else-if="registration_p2">
                            <v-btn v-on:click="register_p3" class="pl-12 pr-12 mb-5 primary green accent-4"> Next</v-btn>
                        </div>
                        <div v-else-if="registration_p3">
                            <v-btn v-on:click="register" class="pl-12 pr-12 mb-5 primary green accent-4"> Submit</v-btn>
                        </div>
                        <div v-else>
                            <v-btn v-on:click="login" class="pl-12 pr-12 mb-5 primary green accent-4"> Login </v-btn>
                        </div>
                    </v-card-actions>
                </v-card>

                <div v-if="registerSuccess == true" class="mt-12 pt-12">
                    <h1 class="valsuccess">Account Successfully Created !</h1>
                    <div class="mt-5">
                        <h2>Dear Andre,</h2> 
                    </div>
                    <div class="mt-5">
                        <p> <span class="ml-5">Please wait for the approval of your request.</span> <br>
                        It might take 1-2 days to verify your account. <br>
                        This is to guarantee that all sellers are credible.
                        </p>
                    </div>
                    <div class="mt-5">
                        Thank you,
                         <h4>Administrator</h4>
                    </div>
                    <div>
                        <v-btn v-on:click="returnIndex" class="pl-12 pr-12 mt-5 primary green accent-4"> Home </v-btn>
                    </div>
                </div>

            </v-flex>
        </v-layout>
        </v-card>
    </v-container>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
.pop{
    font-family: 'Poppins', sans-serif;
}
.ifSelected{
    border-bottom: 1px solid #00C853;
}
.below-img{
    color:white;
}
a{
    text-decoration: none;
}
.valerror{
    color:red;
}
.valsuccess{
    color: green;
}
.previewImage {
  display: flex;
  justify-content: center;
  align-items: center;
}

.previewImage img {
  max-width: 100%;
  max-height: 500px;
}
</style>

<script>
import axios from 'axios'

axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://localhost:8000'

export default {
     data(){
        return{
            register_data:{
                first_name:'',
                surname:'',
                email:'',
                password:'',
                location:'',
                boundary:'',
                valid_id:'',
                kind_id:'',
                user_type:''
            },
            ids:['SSS ID', 'VOTERS ID', 'EMPLOYEE ID', 'MUNICIPAL ID'],
            login_data:{
                email:'',
                password:''
            },
            emailRules:[
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
            fRules:[
                v => !!v || 'First name is required',
            ],
            sRules:[
                v => !!v || 'Surname is required',
            ],
            rules: {
                required: value => !!value || 'Required.',
                min: v => v.length >= 8 || 'Min 8 characters',
            },
            show_password: false,
            registration:true,
            registration_p2:false,
            registration_p3:false,
            imageUrl:null,
            registerSuccess:true,
            registerValidation:'',
            loginValidation:''
        }
    },
        methods:{
        //Manupulation of register/login side
        register_p2(){
            this.registration = false
            this.registration_p2 = true
        },
        register_p3(){
            this.registration = false
            this.registration_p2 = false
            this.registration_p3 = true
        },
        login_view(){
            this.registration = false
            this.registration_p2 = false
            this.registration_p3 = false
        },

        //Inserting Image to registration p3 
        previewInsertedImg(e){
            const file = e.target.files[0]
            this.imageUrl = URL.createObjectURL(file)
            this.register_data.valid_id = file.name
        },

        //return to home page
        returnIndex(){
            this.registerSuccess = false
            this.registration = false
            this.registration_p2 = false
            this.registration_p3 = false
        },

        //Send data to server side
        register(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/register',{
                    first_name: this.register_data.first_name,
                    last_name: this.register_data.surname,
                    email: this.register_data.email,
                    password: this.register_data.password,
                    password_confirmation: this.register_data.password,
                    location: this.register_data.location,
                    boundary: this.register_data.boundary,
                    kind_id: this.register_data.kind_id,
                    valid_id:  this.register_data.valid_id,
                    user_type: this.register_data.user_type,
                    is_approved: 0    
                }).then(response => {
                   this.registerSuccess = true
                   this.register_data.user_type = ''
                   this.register_data.first_name = ''
                   this.register_data.surname = ''
                   this.register_data.email = ''
                   this.register_data.password = ''
                   this.register_data.location = ''
                   this.register_data.boundary = ''
                   this.register_data.kind_id = ''
                   this.register_data.valid_id = ''
                }).catch(err => {
                    // this.validationErrors = err.response.data.errors
                    //not fixed so alternative way
                    this.registerValidation = 'The Email is already taken.'
                })
            }).catch(err => {
                console.log('sanctum error')
            })
        },
        login(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login',{
                    email: this.login_data.email,
                    password: this.login_data.password
                }).then(response => {
                    axios.get('/api/user').then(response =>{
                        let user_type = response.data.user_type
                        if(user_type == 1){
                            console.log('seller')
                        }else if(user_type == 2){
                            console.log('buyer')
                        }else if(user_type == 3){
                            console.log('admin')
                        }
                    })
                }).catch(err => {
                    this.loginValidation = 'The Email/Password is incorrect.'
                })
            }).catch(err => {console.log(err)})
        }
    }
}
</script>
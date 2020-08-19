<template>
    <v-container class="pop mt-5">
        <h1>Pending Approval</h1>
        <v-expansion-panels accordion>
            <v-expansion-panel class="mt-3">
                <v-expansion-panel-header> 
                    <span>fullname</span>
                    <v-spacer></v-spacer>
                    <span>Date</span>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                    <v-layout row wrap>
                        <v-flex>
                        
                        </v-flex>
                        <v-flex>
                            <h1>Image goes here</h1>
                        </v-flex>
                    </v-layout>
                </v-expansion-panel-content>
            </v-expansion-panel>
        </v-expansion-panels>
    </v-container>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
.pop{
    font-family: 'Poppins', sans-serif;
}
</style>

<script>
import axios from 'axios'
axios.defaults.withCredentials = true
axios.defaults.baseURL = 'localhost:8000'

export default {
    data(){
        return{
            pendingAccounts:{
                first_name:'',
                last_name:'',
                email:'',
                location:'',
                picture:'',
                date_registered:''
            }
        }
    },
    mounted(){

    },
    methods:{
        getPendingAccounts(){
            axios.get('/api/pending-approval').then(response =>{
                this.pendingAccounts.first_name = response.data.first_name,
                this.pendingAccounts.last_name = response.data.last_name,
                this.pendingAccounts.email = response.data.email,
                this.pendingAccounts.location = response.data.location,
                this.pendingAccounts.date_registered = response.data.created_at,
                this.pendingAccounts.picture = response.data.valid_id
            })
        },
        approveAccount(){
            // axios.put(``)
        }
    }
}
</script>
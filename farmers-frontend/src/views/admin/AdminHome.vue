<template>
    <div>
        <h1>Admin View</h1>
        <v-main>
            <AdminDashboard/>
        </v-main>
    </div>
</template>

<script>
import AdminDashboard from '@/components/admin/AdminDashboard.vue'

export default {
    components:{
        AdminDashboard
    }
}
</script>
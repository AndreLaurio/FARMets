<template>
    <div>
        <AccountApproval/>
        <v-main>
            <AdminDashboard/>
        </v-main>
    </div>
</template>

<script>
import AdminDashboard from '@/components/admin/AdminDashboard.vue'
import AccountApproval from '@/components/admin/AccountApproval.vue'

export default {
    components:{
        AdminDashboard, AccountApproval
    }
}
</script>
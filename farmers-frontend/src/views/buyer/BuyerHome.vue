<template>
    <div>
         <h1>Buyer View</h1>
        <v-main>
            <BuyerDashboard/>
        </v-main>
    </div>
</template>

<script>
import BuyerDashboard from '@/components/buyer/BuyerDashboard.vue'

export default {
    components:{
        BuyerDashboard
    }
}
</script>
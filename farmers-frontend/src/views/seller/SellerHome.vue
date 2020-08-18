<template>
    <div>
        <h1>Seller View</h1>
        <v-main>
            <SellerDashboard/>
        </v-main>
    </div>
</template>

<script>
import SellerDashboard from '@/components/seller/SellerDashboard'

export default {
    components:{
        SellerDashboard
    }    
}
</script>
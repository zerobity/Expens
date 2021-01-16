<template>
    <div>
        <div class="product">
            <img v-if="!isLoaded" slot="preloader" class="loader"
                src="/img/spinner-loading.gif" width="auto" height="20px"/>
            <a :href="route"><img :src="imageLoad" @error="onImgError()" @load="onImgLoad"
                alt="product" width="auto" height="130px"></a>
            <a :href="route"><div class="product-name">{{ productObj.name }}</div></a>
            <div v-if="this.productObj.discount > 0" >
                <div class="product-price"><strike>{{ priceFormat(productObj.price) }}</strike></div>
                <div class="mx-auto">
                    <div class="product-real-price">{{ priceFormat(realPrice) }}</div>
                    <div class="product-discount">{{'%'+productObj.discount+' OFF'}}</div>
                </div>
            </div>
            <div v-if="this.productObj.discount == 0" >
                <div class="product-real-price">{{ priceFormat(productObj.price) }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product', 'route', 'shop'],
        mounted() {
            this.productObj = JSON.parse(this.product);
            this.pathimage = '/img/shops/'+this.shop+'/'+this.productObj.image;
            this.realPrice = this.productObj.price * (1 - (this.productObj.discount/100));
        },
        data: function() {
            return {
                productObj: {},
                pathimage: '',
                realPrice: 0,
                isLoaded: false,
                imgError: false,
            }
        },
        methods:{
            priceFormat(price){
                if (price) {
                    return '$' + Intl.NumberFormat("de-DE").format(price/100);
                } else {
                    return '$ 0,00';
                }
            },
            onImgLoad () {
                this.isLoaded = true
            },
            onImgError () {
                this.imgError = true;
            },
        },
        computed: {
            imageLoad() {
                const _ = this
                return ((this.imgError) ? '/img/404notfound.jpg' : this.pathimage);
            }
        }
    }
</script>

<style>
.product-real-price{
    color: #06C106;
}
.product-discount{
    color: #C20C43;
}
</style>
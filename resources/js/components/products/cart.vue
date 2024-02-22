<template>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered m-0">
        <thead>
            <tr>
            <th class="text-center py-3 px-4" style="width: 50px;">PRODUK</th>
            <th class="text-right py-3 px-4" style="width: 150px;">PILIHAN HARGA</th>
            <th class="text-center py-3 px-4" style="width: 80px;">KUANTITAS</th>
            <th class="text-right py-3 px-4" style="width: 80px;">SUBTOTAL</th>
            <th class="text-center align-middle py-3 px-0" style="width: 40px;">HAPUS</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="cart in carts">
                <td class="p-4">
                    <div class="media align-items-center">
                    <img :src="cart.img_url" width="150" class="d-block ui-w-40 ui-bordered mr-4" alt=""/>
                    <div class="media-body">
                        <a href="#" class="d-block text-dark">{{ cart.name }}</a>
                        <small>
                        <span class="text-muted">{{ cart.sku }}</span>
                        </small>
                    </div>
                    </div>
                </td>
                <td class="text-right font-weight-semibold align-middle p-4">Rp.{{ formatPrice(cart.price) }}</td>
                <td class="align-middle p-4"><input type="number"  min="0" max="1000" @keypress="disableDot" v-model="cart.qty" class="form-control text-center"></td>
                <td class="text-right font-weight-semibold align-middle p-4">Rp.{{ calculatePrice(cart) }}</td>
                <td class="text-center align-middle px-0"><a href="#" v-on:click="deleteCart(cart.id)" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
            </tr>
        </tbody>
        </table>
    </div>
    <div class="d-flex flex-row-reverse">
        <div class="row mt-4 mr-5">
            <div class="mr-10"><img src="https://i.ibb.co/G5NQr9B/coupon.png" width="20"/></div>
            <span class="text-right px-10"><a href="#" data-toggle="modal" data-target="#discountBox">Gunakan Kode Diskon/Reward</a></span>
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
        <div class="row"></div>
        <div class="d-flex">
        <div class="text-right mt-4 mr-5">
            <div class="text-large" v-if="this.discountCode"><strong>Discount code</strong></div>
            <div class="text-large"><strong>Discount</strong></div>
            <div class="text-large"><strong>Subtotal</strong></div>
            <div class="text-large"><strong>Total</strong></div>
        </div>
        <div class="text-right mt-4">
            <div class="text-large" v-if="this.discountCode"><strong>{{this.discountCode.toUpperCase()}}</strong></div>
            <div class="text-large"><strong>Rp.{{ discount() }}</strong></div>
            <div class="text-large"><strong>Rp.{{ subTotal() }}</strong></div>
            <div class="text-large"><strong>Rp.{{ total() }}</strong></div>
        </div>
        </div>
    </div>
</div>

  <!-- The Modal -->
  <div class="modal" id="discountBox">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h6 class="text-bold">Kode Diskon <span class="text-muted">Point Reward</span></h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body input-group">
            <input type="text" v-model="discountCode" placeholder="Discount code" aria-label="Discount code" aria-describedby="basic-addon2">
            <div class="input-group-append ">
                <a href="#" @click="discount"><span class="input-group-text bg-warning text-white text-decoration-none" id="basic-addon2">TERAPKAN</span></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props: ['show'],

    data() {
        return {
            carts: [],
            discountCode: '',
            totalDiscount: 0,
            subTotalPrice: 0,
        }
    },
    mounted() { 
        this.fetchCarts()
    },
    methods: {
        disableDot (e) {
            if (e.charCode === 46) {
                e.preventDefault()
            }
        },
        formatPrice(value) {
            return Number(value).toLocaleString("id-ID")
        },
        fetchCarts() {
            axios.get('/api/carts')
                .then(response => this.carts = response.data.data)
                .catch(error => console.log(error))
        },
        deleteCart(id) {
            axios.get('/api/cart/'+ id)
                .then(res => res.json())
                .catch(error => console.error('Error:', error))
                .then(response => console.log('Success:', response))
        },
        calculatePrice(cart) {
            let total = 0;
            if(this.discountCode.toUpperCase() === "FA222" && cart.sku === "FA4532"){
                total = ((cart.qty * cart.price) - 50000)
            }
            else if(this.discountCode.toUpperCase() === "FA333" && cart.price > 400000){
                this.totalDiscount = ((cart.price * 6)/100)
                total = (cart.price * cart.qty)
                total = total - this.totalDiscount
            }
            else{
                total = (cart.qty * cart.price)
            }
            return Number(total).toLocaleString("id-ID")
        },
        subTotal() {
            let subTotal = 0;
            
            this.carts.forEach(val => {
                subTotal += Number(val.qty * val.price)
            });

            if(this.discountCode.toUpperCase() === "FA222"){
                this.subTotalPrice = subTotal - 50000
            }else{
                this.subTotalPrice = subTotal
            }

            return Number(this.subTotalPrice).toLocaleString("id-ID")

        },
        discount() {
            let discount = 0;
            let dayName = new Date().toLocaleString('en-us', {  weekday: 'long' })
            
            if(this.discountCode.toUpperCase() === "FA111"){
                discount = ((this.subTotalPrice * 10)/100)
            } else if (this.discountCode.toUpperCase() === "FA222"){
                discount = 50000
            }
            else if (this.discountCode.toUpperCase() === "FA333"){
                discount = this.totalDiscount
            } 
            else if(this.discountCode.toUpperCase() === "FA444" && (dayName==="Tuesday" )){
                discount = ((this.subTotalPrice * 5)/100)
            } 
            return Number(discount).toLocaleString("id-ID")
        },
        total() {
            let grandTotal = 0;
            let discount = 0;
            let dayName = new Date().toLocaleString('en-us', {  weekday: 'long' })

            if (this.discountCode.toUpperCase() === "FA111"){
                discount = ((this.subTotalPrice*10)/100)
                grandTotal = (this.subTotalPrice - discount)
            }
            else if(this.discountCode.toUpperCase() ==="FA222"){
                grandTotal = (this.subTotalPrice - 50000)
            }
            else if (this.discountCode.toUpperCase() === "FA333"){
                grandTotal = (this.subTotalPrice - this.totalDiscount)
            }
            else if (this.discountCode.toUpperCase() === "FA444" && (dayName==="Tuesday" )){
                discount = ((this.subTotalPrice*6)/100)
                grandTotal = (this.subTotalPrice - discount)
            }
            else{
                grandTotal = this.subTotalPrice
            }
            return Number(grandTotal).toLocaleString("id-ID")
        }
    } 
}
</script>
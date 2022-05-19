require("./bootstrap");

import Vue from "vue";

import Vuex from "vuex";

Vue.use(Vuex);

import VueRouter from 'vue-router';
import axios from "axios";

Vue.use(VueRouter);

const router = new VueRouter ({
    mode:'history',
    routes:require('./routes.js');
});

const store = new Vuex.store({
    state:{
        products: [],
        cart:[],
        order:{}
    },
    mutations:{
        updateProducts(state,products){
            state.products = products;
        },
        addToCart(state,product){

            let productInCartIndex = state.cart.findIndex(item =>item.slug ===product.slug)
            if(productInCartIndex != -1){
                state.cart[productInCartIndex].quantity++;
                return;
            }
            product.quantity =1
            state.cart.push(product)
        },
        removeCart(state,index){
            state.cart.splice(index,1);
        },
        updateOrder(state,order){
            state.order = order;
        },
        updateCart(state,cart){
            state.cart =cart
        }
    },
    actions:{
        getProducts({commit}){
            axios.get('/api/products').then(res=>{
                commit('updateProducts',res.data)
            }).catch((error)=>console.log(error))
        },
        clearCart({commit}){
            commit('updateCart', []);
        }
    }
});


const app = new Vue({
    router,
    store,
    el: '#app',
    created (){
        store.dispatch('getProducts').then(a=>{}).catch(err=>console.log(err))
        
    
    }
})

var app =new Vue({
    el:'#app',
    data:{
     id:''
        
    },
    methods: {
        subirImagen(id){
          
            location.href="/subirImagen/"+id
        }
    },
})
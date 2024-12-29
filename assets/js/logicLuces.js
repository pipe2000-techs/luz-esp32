function luces(){
    return{

        // datos de configuracion
        datosConfiguracion:"",
        conteo:0,

        //datos de contrato
        id:0,
        codigoCon:"",
        nombreCon:"",
        valorMensulCon:"",
        ValortotalCon:"",

        readData:function(){
            fetch("./mvc/controller/ConEsp32?dataLuces&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ").
            then(response => response.json()).
            then(response => {

                this.datosConfiguracion = response;

                console.log(response);

            })
        },


        inits:function(){

            this.readData();
            
        },
        
        encenderLuz:function(base){

                    fetch("./mvc/controller/ConEsp32?cambiarEstado&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ&estado=1&id="+base.codluz).
                    then(response => response.json()).
                    then(response => {

                        if(response.res == 1){

                            this.readData();

                           

                        }else{

                            Swal.fire({
                                title: "Error!",
                                text: "No se puedo Encerder la luz.",
                                confirmButtonColor: "#198754",
                                icon: "error",
                                timer: 1000
                            });

                        }

                    })


        },

        apagarLuz:function(base){



                    fetch("./mvc/controller/ConEsp32?cambiarEstado&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ&estado=0&id="+base.codluz).
                    then(response => response.json()).
                    then(response => {

                        if(response.res == 1){

                            this.readData();

                            
                        }else{

                            Swal.fire({
                                title: "Error!",
                                text: "No se puedo apoagar la Luz .",
                                confirmButtonColor: "#198754",
                                icon: "error"
                            });

                        }

                    })

        }

        
    }
}
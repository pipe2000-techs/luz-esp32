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

        horaInicio:"",
        horaFin:"",
        idLuz:"",


        readData:function(){
            fetch("./mvc/controller/ConEsp32?dataLuces&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ").
            then(response => response.json()).
            then(response => {

                this.datosConfiguracion = response;

                //console.log(response);

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

        },

        cambiarEstadoProgrma:function(base){

            //console.log(base.progrmarLuz);

            fetch("./mvc/controller/ConEsp32?cambiarEstadoProgrma&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ&estado="+base.progrmarLuz+"&id="+base.codluz).
                then(response => response.json()).
                then(response => {

                if(response.res == 1){

                    this.readData();
     
                }else{

                    Swal.fire({
                        title: "Error!",
                        text: "No se pudo activar la programacion.",
                        confirmButtonColor: "#198754",
                        icon: "error"
                    });

                }

            })

        },

        datosHorasProgramadas:function(base){
            
            this.horaInicio = base.horainicio ;
            this.horaFin = base.horafin;
            this.idLuz = base.codluz;


        },

        modHoraProgramada:function(){

            if(this.horaInicio > this.horaFin){

                Swal.fire({
                    title: "¡Hora incorrecta!",
                    text: "La hora de inicio tiene que ser menor a la hora final .",
                    confirmButtonColor: "#198754",
                    icon: "info"
                });

                return 0;

            }
            

            fetch("./mvc/controller/ConEsp32?actulizarProgramacion&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ", {
                method: "POST",
                body: new FormData(updateHoraProgramada)
            }).
                then(response => response.json()).
                then(response => {

                    if(response.res == 1){

                        this.readData();

                        $("#modalContrato").modal('hide');//ocultamos el modal
                        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                        $('.modal-backdrop').remove();//eliminamos el backdrop del modal

                        Swal.fire({
                            title: "Succes!",
                            text: "Programacion actulizada.",
                            confirmButtonColor: "#198754",
                            icon: "success"
                        });

                    }else{

                        Swal.fire({
                            title: "Error!",
                            text: "No se puede actualizar la programacion.",
                            confirmButtonColor: "#198754",
                            icon: "error"
                        });

                    }

            })
            
        },

        
    }
}
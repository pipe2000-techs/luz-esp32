<?php

    include '../model/baseQuery.php';


    class luz extends baseQuery{

        //datos solicitud credito
        public $estado;
        public $token;
        public $idluz;

        public $estadoPorgra;
        public $horainicio;
        public $horafin;


        ////////////////////////////////////////////////////////////

        public function validarToken(){

            $consulta = "SELECT id FROM token where token = ? and estado = 1";

            $consult = $this->cosultOutput($consulta,[$this->token]);
            
            if ($consult) {
                return 1;
            }else{
                return 0;
            }

        }

        public function consultarLuz(){

            $consulta = "SELECT * FROM luces";

            $consult = $this->cosultOutput($consulta,null);
            return $consult[0];

        }


        public function cambiarEstado(){

            $consulta = "UPDATE  luces  set estadoluz = ? , fechaestadoluz = ?, horaestadoluz = ? WHERE codluz = ?";
            $consult = $this->cosultInput($consulta,[$this->estado, date("Y-m-d"), date("H:i:s"), $this->idluz]);

            if ($consult) {
                return 1;
            }else{
                return 0;
            }

        }


        public function consultarLuces(){

            $consulta = "SELECT l.codluz, l.nombreluz, l.descripcionluz, l.estadoluz, l.fechaestadoluz, l.horaestadoluz, el.descripcion as descestado, l.progrmarLuz, l.horainicio, l.horafin
                         FROM luces as l
                         LEFT JOIN estadoluz as el
                         ON l.estadoluz = el.id;";

            $consult = $this->cosultOutput($consulta,null);
            return $consult;

        }

        public function cambiarEstadoProgrma(){

            $consulta = "UPDATE  luces  set progrmarLuz = ?  WHERE codluz = ?";
            $consult = $this->cosultInput($consulta,[$this->estadoPorgra, $this->idluz]);

            if ($consult) {
                return 1;
            }else{
                return 0;
            }

        }

        public function actulizarProgramacion(){

            $consulta = "UPDATE  luces  set horainicio = ?, horafin = ? WHERE codluz = ?";
            $consult = $this->cosultInput($consulta,[$this->horainicio, $this->horafin, $this->idluz]);

            if ($consult) {
                return 1;
            }else{
                return 0;
            }

        }

        public function validarPorgramacion(){

            $horaActual = date("H:i");
                    
            $consulta = "UPDATE  luces  set estadoluz = 1 WHERE progrmarLuz = 'true' and (horainicio <= ? and horafin >= ?)";
            $consult = $this->cosultInput($consulta,[$horaActual, $horaActual]);
         

        }

       

    }

?>
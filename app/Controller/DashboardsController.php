<?php
App:: uses('AppController', 'Controller');

    class DashboardsController extends AppController{


        public function index(){
        
            $atualizado = $this->Session->read('Atualizado');
            if (empty($atualizado)) {
                $this->Session->write('Atualizado', 'Sim');
            }
       
        

        //Condicoes do dashboards
           
    }
}

?>
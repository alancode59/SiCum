<?php
    function configurar_menu($pagina = ''){
        $menu = array();
        $menu_item = array();
        $sub_menu_item = array();

        //Opción Dashboard
        $menu_item['is_active'] = ($pagina == "dashboard") ? TRUE : FALSE;
        $menu_item['href'] = './dashboard.php';
        $menu_item['icon'] = 'fa fa-dashboard';
        $menu_item['text'] = 'Inicio';
        $menu_item['submenu'] = array();
        $menu['inicio'] = $menu_item;


        if($_SESSION['id_rol'] == 555){
            //Opción Usuario
            $menu_item['is_active'] = ($pagina == "empleados") ? TRUE : FALSE;
            $menu_item['href'] = './empleados.php';
            $menu_item['icon'] = 'fa fa-user';
            $menu_item['text'] = 'Empleados';
            $menu_item['submenu'] = array();
            $menu['empleado'] = $menu_item;
        }//end if 

        //Opción Usuario
        /*$menu_item['is_active'] = ($pagina == "usuarios") ? TRUE : FALSE;
        $menu_item['href'] = './usuarios.php';
        $menu_item['icon'] = 'fa fa-user';
        $menu_item['text'] = 'Usuarios';
        $menu_item['submenu'] = array();
        $menu['usuario'] = $menu_item;*/
        
        //Opción Nike
        $menu_item['is_active'] = ($pagina == "usuarios") ? TRUE : FALSE;
        $menu_item['href'] = './usuarios.php';
        $menu_item['icon'] = 'fa fa-book';
        $menu_item['text'] = 'Usuarios';
        $menu_item['submenu'] = array();
        $menu['usuario'] = $menu_item;


        return $menu;
    }//end 



    function crear_menu_panel($pagina = '') {
        $menu = configurar_menu($pagina);
        $html= '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
            foreach ($menu as $item) {
                if($item['href'] != '#'){
                    $html.='
                    <li class="nav-item">
                        <a href="'.$item['href'].'"  class="nav-link '.($item["is_active"] ? 'active' : '').'">
                        <i class="'.$item['icon'].' nav-icon"></i>
                        <p>'.$item['text'].'</p>
                        </a>
                    </li>';
                }//end if href != # 
            }//end foreach
        $html.= '</ul>';
        return $html;
    }//end 
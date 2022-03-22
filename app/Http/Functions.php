<?php

    //Key Value From Json
    function kvfj($json, $key)
    {
        if($json == null):
            return null;
        else:
            $json = $json;
            $json = json_decode($json, true);
            if(array_key_exists($key, $json)):
                return $json[$key];
            else:
                return null;
            endif;
        endif;
    }

    function getModulesArray()
    {
        $a = [
            '0' => 'Products',
            '1' => 'Blog'
        ];

        return $a;
    }


     

    function getRoleUserArray($mode, $id)
    {

        $roles = ['0' => 'Usuario normal', '1' => 'Administrador'];
        if(!is_null($mode)):

            return $roles;

        else:

            return $roles[$id];

        endif;


    }

    function getUserStatusArray($mode, $id)
    {

        $status = ['0' => 'Registrado', '1' => 'Verificado', '100' => 'Baneado'];
        if(!is_null($mode)):

            return $status;

        else:

            return $status[$id];

        endif;

    }

    function getUserYears()
    {
        $ya = date('Y');
        $ym = $ya - 18;
        $yo = $ym - 62;

        return [$ym, $yo];
    }

    function getMonths($mode, $key)
    {
        $m = [
            '1' => 'Enero',
            '2' => 'Febrero',
            '3' => 'Marzo',
            '4' => 'Abril',
            '5' => 'Mayo',
            '6' => 'Juio',
            '7' => 'Julio',
            '8' => 'Agosto',
            '9' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];
        if($mode == 'list') {
            return $m;
        } else {
            return $m[$key];
        }


    }

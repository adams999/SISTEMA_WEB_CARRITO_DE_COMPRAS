<?php  
    $meses = array('','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sept','Oct','Nov','Dic');
        for($x=1;$x<=12;$x=$x+1){
            $dinero[$x]=0;      
        }
        
        $anno=date('Y');
        
        $sql=pg_query("SELECT * FROM ventas_productos where estatus=10");
        while($row=pg_fetch_array($sql)){
            $y=date("Y", strtotime($row['fecha_hora_venta']));

            $mes=(int)date("m", strtotime($row['fecha_hora_venta'])); 

            if($y==$anno){
                $row['monto_cancelado']=str_replace(array(' ','-','.'), '', $row['monto_cancelado']);
                $dinero[$mes]=$dinero[$mes]+$row['monto_cancelado']=str_replace(array(' ','-',','), '.', $row['monto_cancelado']);
            }
        }

?>
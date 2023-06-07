<?php
                    $p1 = $_GET['p1'];
                    $p2 = $_GET['p2'];
                    $p3 = $_GET['p3'];
                    $p4 = $_GET['p4'];
                    $p5 = $_GET['p5'];
                    $p6 = $_GET['p6'];
                    $p7 = $_GET['p7'];
                    $p8 = $_GET['p8'];
                    $p9 = $_GET['p9'];
                    $p10 = $_GET['p10'];
                    $p11 = $_GET['p11'];
                    $p12 = $_GET['p12'];
                    
                    $_SESSION['p1'] = $p1;
                    $_SESSION['p2'] = $p2;
                    $_SESSION['p3'] = $p3;
                    $_SESSION['p4'] = $p4;
                    $_SESSION['p5'] = $p5;
                    $_SESSION['p6'] = $p6;
                    $_SESSION['p7'] = $p7;
                    $_SESSION['p8'] = $p8;
                    $_SESSION['p9'] = $p9;
                    $_SESSION['p10'] = $p10;
                    $_SESSION['p11'] = $p11;
                    $_SESSION['p12'] = $p12;
                    
                    if(empty($p1) || $p1 == 0)
                    {   
                        $p1 =0;
                        $tpr1=0;
                        $_SESSION['$pr1'] = $pr1;
                    }
                    else
                    {   
                        $tpr1 = 108 * $p1;
                        $pr1 = number_format($tpr1,2);
                        $_SESSION['$pr1'] = $pr1;
                    
                    }
                    if(empty($p2) || $p2 == 0)
                    {
                        $p2 =0;
                        $tpr2=0;
                        $_SESSION['$pr2'] = $pr2;
                    }
                    else
                    {   
                        $tpr2 = 50 * $p2;
                        $pr2 = number_format($tpr2,2);
                        $_SESSION['$pr2'] = $pr2;
                    
                    }
                    if(empty($p3) || $p3 == 0)
                    {
                        $p3 =0;
                        $tpr3=0;
                        $_SESSION['$pr3'] = $pr3;
                    }
                    else
                    {   
                        $tpr3 = 45 * $p3;
                        $pr3 = number_format($tpr3,2);
                        $_SESSION['$pr3'] = $pr3;
                    
                    }
                    if(empty($p4) || $p4 == 0)
                    {
                        $p4 =0;
                        $tpr4=0;
                        $_SESSION['$pr4'] = $pr4;
                    }
                    else
                    {   
                        $tpr4 = 65 * $p4;
                        $pr4 = number_format($tpr4,2);
                        $_SESSION['$pr4'] = $pr4;
                    

                    }
                    if(empty($p5) || $p5 == 0)
                    {
                        $p5 =0;
                        $tpr5=0;
                        $_SESSION['$pr5'] = $pr5;
                    }
                    else
                    {   
                        $tpr5 = 77 * $p5;
                        $pr5 = number_format($tpr5,2);
                        $_SESSION['$pr5'] = $pr5;
                    
                    }
                    if(empty($p6) || $p6 == 0)
                    {
                        $p6 =0;
                        $tpr6=0;
                        $_SESSION['$pr6'] = $pr6;
                    }
                    else
                    {   
                        $tpr6 = 42 * $p6;
                        $pr6 = number_format($tpr6,2);
                        $_SESSION['$pr6'] = $pr6;
                    
                    }
                    if(empty($p7) || $p7 == 0)
                    {
                        $p7 =0;
                        $tpr7=0;
                        $_SESSION['$pr7'] = $pr7;
                    }
                    else
                    {   
                        $tpr7 = 100 * $p7;
                        $pr7 = number_format($tpr7,2);
                        $_SESSION['$pr7'] = $pr7;
                    
                    }
                    if(empty($p8) || $p8 == 0)
                    {
                        $p8 =0;
                        $tpr8=0;
                        $_SESSION['$pr8'] = $pr8;
                    }
                    else
                    {   
                        $tpr8 = 42 * $p8;
                        $pr8 = number_format($tpr8,2);
                        $_SESSION['$pr8'] = $pr8;
                    
                    }
                    if(empty($p9) || $p9 == 0)
                    {
                        $p9 =0;
                        $tpr9=0;
                        $_SESSION['$pr9'] = $pr9;
                    }
                    else
                    {   
                        $tpr9 = 42 * $p9;
                        $pr9 = number_format($tpr9,2);
                        $_SESSION['$pr9'] = $pr9;
                    
                    }
                    if(empty($p10) || $p10 == 0)
                    {
                        $p10 =0;
                        $tpr10=0;
                        $_SESSION['$pr10'] = $pr10;
                    }
                    else
                    {   
                        $tpr10 = 50 * $p10;
                        $pr10 = number_format($tpr10,2);
                        $_SESSION['$pr10'] = $pr10;
                    
                    }
                    if(empty($p11) || $p11 == 0)
                    {
                        $p11 =0;
                        $tpr11=0;
                        $_SESSION['$pr11'] = $pr11;
                    }
                    else
                    {   
                        $tpr11 = 35 * $p11;
                        $pr11 = number_format($tpr11,2);
                        $_SESSION['$pr11'] = $pr11;
                    
                    }
                    if(empty($p12) || $p12 == 0)
                    {
                        $p12 =0;
                        $tpr12=0;
                        $_SESSION['$pr12'] = $pr12;
                    }
                    else
                    {   
                        $tpr12 = 60 * $p12;
                        $pr12 = number_format($tpr12,2);
                        $_SESSION['$pr12'] = $pr12;
                    }
                    $tpr13 = $tpr1+$tpr2+$tpr3+$tpr4+$tpr5+$tpr6+$tpr7+$tpr8+$tpr9+$tpr10+$tpr11+$tpr12;
                    
                    $p13 = $p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9+$p10+$p11+$p12;
                    $_SESSION['$tpr13'] = $tpr13;
                    $_SESSION['$p13'] = $p13;
?>
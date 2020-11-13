<?php
session_start();
if ($_SESSION['rol_idrol'] != 2) {
  header("Location:../index.php");
}

require_once("../../Database/consult.php");
require_once("../../Database/connection.php");
require_once('fpdf.php');

if(isset($_POST['submit'])){
    $inicial=$_POST['inicial'];
    $final = $_POST['final'];
    $newfechaini = date("d-m-Y", strtotime($inicial));
    $newfechafinal = date("d-m-Y", strtotime($final));
    $obj = new Crud();
    $data=$obj->ventasFecha($newfechaini,$newfechafinal);
    if($data == true){
        class PDF extends FPDF {
            // Cabecera de página
            function Header(){
                // Logo
                $this->Image('../../assets/Logo/Raffinier(12).jpg',17,8,33);
                // Arial bold 15
                $this->SetFont('Arial','',15);
                // Movernos a la derecha
                $this->Cell(80);
                // Título
                $this->Cell(30,10,utf8_decode('Reporte ventas'),0,0,'C');
                // Salto de línea
                $this->Ln(50);
            }
            
            // Pie de página
            function Footer(){
                // Posición: a 1,5 cm del final
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Número de página
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
        
            // Cargar los datos
            function LoadData($data){
                // Leer las líneas del fichero
                // $lines = file($file);
                $datan = array();
                foreach($datan as $line)
                    $data[] = explode(';',trim($line));
                return $data;
            }
        
                // Tabla coloreada
            function FancyTable($header, $data){
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,0,0);
                $this->SetTextColor(255);
                $this->SetDrawColor(128,0,0);
                $this->SetLineWidth(.2);
                $this->SetFont('','B');
                // Cabecera
                $w = array(10, 25, 20, 25,20,40,40);
                for($i=0;$i<count($header);$i++)
                    $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
                $this->Ln();
                // Restauración de colores y fuentes
                $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                // Datos
                $fill = false;
                foreach($data as $row)
                {
                    
                        $this->Cell($w[0],6,$row['idventas'],'LR',0,'L',$fill);
                        $this->Cell($w[1],6,$row['fecha_venta'],'LR',0,'L',$fill);
                        $this->Cell($w[2],6,$row['cantidad_venta'],'LR',0,'L',$fill);
                        $this->Cell($w[3],6,$row['valor_venta'],'LR',0,'L',$fill);
                        $this->Cell($w[4],6,$row['venta_talla'],'LR',0,'L',$fill);
                        $this->Cell($w[5],6,$row['nombre_producto'],'LR',0,'L',$fill);
                        $this->Cell($w[5],6,$row['nombre_usuario'],'LR',0,'L',$fill);
                        // $this->Cell($w[5],6,number_format($row['telefono_proveedor']),'LR',0,'L',$fill);
                        // $this->Cell($w[3],6,number_format($row['nombre_producto']),'LR',0,'R',$fill);
                        $this->Ln();
                        $fill = !$fill;
                    
                }
                // Línea de cierre
                $this->Cell(array_sum($w),0,'','T');
            }
        }

        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        // Títulos de las columnas
        $header = array('ID', 'Fecha', 'Cantidad', 'Valor', 'Talla','nombre produucto','nombre usuario');
        // Carga de datos
        $data = $pdf->LoadData($data);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        $pdf->FancyTable($header,$data);
        $pdf->Output();

    }else{
        echo "sin datos";
    }
    
}



?>
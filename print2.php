<?php
include 'addins/user-addins.php';
require('addins/fpdf.php');
require('config.php');
include 'addins/helper.php';
$id =$_GET['id'] ?? redirect(landingpage('user'),'Invalid parameter');
class PDF extends FPDF
{
    public $db;
    // Page header
    function boxify($str,$align='C')
    {
        foreach(str_split( $str) as $char)
            $this->Cell(4,4,$char,1,0,$align);
    }
    function writetomiddle($str,$h=4,$nextline=1,$border=0,$align='C')
    {
        $width=$this->GetStringWidth($str);
        $this->SetX(($this->GetPageWidth()-$width)/2);
        $this->Cell($width,$h,$str,$border,$nextline,$align,false);
    }
    function writetoright($str,$h=4,$nextline=1,$border=0,$align='R')
    {
        $width=$this->GetStringWidth($str)+2;
        $this->SetX(($this->GetPageWidth()-intomm(.5)-$width));
        $this->Cell($width,4,$str,$border,$nextline,$align,false);
    }
    function writetxt($str,$nextline=1,$h=4,$border=0,$align='L')
    {
        $width=$this->GetStringWidth($str);
        $this->Cell($width,$h,$str,$border,$nextline,$align,false);
    }
    function Header()
    {
        
        $this->Image('assets/logo.jpg',10,6,45);
        $this->SetFont('Helvetica','',10);
        $this->writetomiddle("MVsoftec INc");
        $this->writetomiddle("Permit application");
        $this->Ln(10);
        $this->SetFont('ARIAL','B',18);
        $this->writetomiddle("Mechanical Permit Application");
        
        $this->SetFont('Helvetica','',10);
        $this->Ln(15);
        $this->writetxt("Application no. :",0);
        $this->writetoright("Building Permit no. :",1);
        $this->boxify(numstringify($this->db->app_no,10));
        $w=$this->GetStringWidth(numstringify($this->db->app_no,10))+2;
        $this->SetX(($this->GetPageWidth()-intomm(.5)-$w)-18);
        $d=str_split('         ');
        if($this->db->building_permit_no)
            $d=str_split(numstringify($this->db->building_permit_no,10));
            foreach($d as $char)
            {
                $this->Cell(4,4,$char,1,0,'C');
            }
        $this->Ln(10);

        $this->Cell(intomm(7.75/4),intomm(.75),'Owner/Applicant','LTB',0,'L');
        $this->MultiCell(intomm(7.75/4),intomm(.75/2),"Last Name \n ".$this->db->lname,'TB','C');
        $this->SetXY($this->GetX()+intomm(7.75/2),$this->GetY()-intomm(.75));
        $this->MultiCell(intomm(7.75/4),intomm(.75/2),"First Name \n ".$this->db->fname,'TB','C');
        $this->SetXY($this->GetX()+intomm(7.75*3/4),$this->GetY()-intomm(.75));
        $this->MultiCell(intomm(7.75/4),intomm(.75/2),"MIddle Initial \n ".$this->db->mi,'TBR','C');

        $this->MultiCell(intomm(7.75/3),intomm(.75/2),"For Construction by an Enterprise \n ".$this->db->fco,1,'L');
        $this->SetXY($this->GetX()+intomm(7.75/3),$this->GetY()-intomm(.75));
        $this->MultiCell(intomm(7.75/3),intomm(.75/2),"Form of Ownership \n ".$this->db->form_ownership,1,'L'); 
        $this->SetXY($this->GetX()+intomm(7.75*2/3),$this->GetY()-intomm(.75));
        $this->MultiCell(intomm(7.75/3),intomm(.75/2),"User or Character of Occupancy \n ".$this->db->lis_char_occup,1,'L');
        
        $data=[
            'House Number'=>$this->db->add_house_no,
            'Street'=>$this->db->add_street,
            'Barangay'=>$this->db->add_brgy,
            'City/Municipality'=>$this->db->add_city,
            'Zip Code'=>$this->db->add_zip,
        ];$b=['LTB','TB','TB','TB','TBR'];
        
        $this->Cell(intomm(7.75/6),intomm(.75),'Address','LTB',0,'C');
        $this->addrow($data,intomm(.75/2),intomm(7.75/6),$b,'C',intomm(7.75/6));

        $data=[
            'Location of'=>'Construction',
            'Lot Number'=>$this->db->loc_lot_no,
            'Block Number'=>$this->db->loc_block_no,
            'Street'=>$this->db->loc_street,
            'Barangay'=>$this->db->loc_brgy,
            'City/Municipality'=>$this->db->loc_city,
        ];$b=[1,'TB','TB','TB','TB','TBR'];
        $this->addrow($data,intomm(.75/2),intomm(7.75/6),$b,'C');

        $data=[
            'TCT Number'=>$this->db->loc_tct_no,
            'Tax Declaration Number'=>$this->db->loc_taxdec_no,
            'TIN'=>$this->db->tin_no,
            'Telephone'=>$this->db->tel_no,
        ];$b=['LTB','TB','TB','TBR'];
        $this->addrow($data,intomm(.75/2),intomm(7.75/4));

        $this->Cell(intomm(7.75),intomm(.25),'Scope of Work','LRT',1,'L');
        $scope=[
            'newcons'=>'New Construction',
            'erection'=>'Erection',
            'addition'=>'Addition',
            'alteration'=>'Alteration',
            'renovation'=>'Renovation',
            'conversion'=>'Conversion',
            'repair'=>'Repair',
            'moving'=>'Moving',
            'raising'=>'Raising',
            'demolition'=>'Demolition',
            'accessory'=>'Accessory Building/Stucture',
            'other'=>'others',
        ];
        $w=intomm(7.75);
        $scope1=array_slice($scope,0,4);
        $scope1=implode("\n",checkbox($scope1,explode(',',$this->db->scope)));
        $this->MultiCell($w/4/2,intomm(1),'','LB','C');// set 1/4 divided by 2
        $this->SetXY($this->GetX()+$w/4/2,$this->GetY()-intomm(1));
        $this->MultiCell($w/4,intomm(.25),$scope1,'B','L');//scope
        
        
        $scope1=array_slice($scope,4,4);
        $scope1=implode("\n",checkbox($scope1,explode(',',$this->db->scope)));
        $this->SetXY($this->GetX()+$w/4+$w/4/2,$this->GetY()-intomm(1));
        $this->MultiCell($w/4,intomm(.25),$scope1,'B','L');

        $scope1=array_slice($scope,8,4);
        $scope1=implode("\n",checkbox($scope1,explode(',',$this->db->scope)));
        $this->SetXY($this->GetX()+$w/4+$w/4+$w/4/2,$this->GetY()-intomm(1));
        $this->MultiCell($w/4+$w/4/2,intomm(.25),$scope1,'BR','L');


    }

    function addrow($data,$height,$width,$border=[],$align='C',$init=0,$nl=true)
    {
        $i=0;$tw=$init;
        foreach($data as $d=>$val)
        {
            $tw+=$width;
            $this->MultiCell($width,$height,"$d \n $val",empty($border)?1:$border[$i],$align);
            $this->SetXY($this->GetX()+$tw,$this->GetY()-$height*2);
            $i++;
        }
        if($nl)
        $this->Ln($height*2);
    }
}   
function checkbox($array,$keys=[])
{
    $n=[];
    foreach($array as $arr=>$val)
    {
        if(in_array($arr,$keys))
        array_push($n,'[X] '.$val);
        else
        array_push($n,'[ ] '.$val);
    }
    return $n;
}
function intomm($a)
{
	return $a*24;
}
function mmtoin($a)
{
	return $a/24;
}
$header = array('P.R. no.', 'Contract Package', 'Quantity Size', 'Estimated Budget',"Mode of\nProcurement");
// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetMargins(intomm(.5),intomm(.25),intomm(.5));
$app=$db->row('select * from m_applications as m inner join engineers as e on m.checked_by=e.username where m.app_no ='.$_GET['id']);
$pdf->db=$app;
if(empty($app))
    redirect(landingpage('user'),'Invalid Parameter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,intomm(2.5));
$pdf->SetFont('Times','',12);
$pdf->SetTitle('Mechanical permit '.numstringify($pdf->db->app_no,10) );
$pdf->Output();
?>
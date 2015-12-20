<?php   ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Epilepsy extends CI_Controller {

var  $title=" Epilepsy Clinic Database | KhoenKean University "; //The Entrar-shadow Website form | w3layouts
var  $name_app1="(Appendix 1 ) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
      
       public function __construct()
       {
                
         parent::__construct();
         // $this->load->library('encrypt');
         $this->load->helper('date');
         $this->load->model('user_model');
         //  $this->load->library('session');
         
       } 
       # http://localhost/ci/index.php/epilepsy/value_monitoring/
       public function  value_monitoring()
       {
                     
          // $HN="ES0597";
           //$tb="04-monitoring";
          //  $HN_epilepsy= $this->input->get_post('HN_epilepsy'); 
           $tb="04__monitoring";
           $tbj1="laboratorytype2";
           
           //$this->db->join($tbj1,$tb.".Lab=".$tbj1.".Lab_value");
       //    $objquery=$this->db->get_where($tb,array('Clinic'=>'Epilepsy Clinic'),10,0);
           
           /*
            SELECT *
FROM `laboratorytype`
WHERE `LabCode`
IN ( 64, 66, 67, 101 )
LIMIT 0 , 30
            * 
           
            * 
        SELECT * FROM `04__monitoring` LEFT JOIN `laboratorytype` ON `04__monitoring`.`Lab`=`laboratorytype`.`LabCode` WHERE `04__monitoring`.`Lab` IN ( 64, 66, 67, 101 )
            */
          
           $objquery=$this->db->query(" SELECT * FROM `04__monitoring` LEFT JOIN `laboratorytype` ON `04__monitoring`.`Lab`=`laboratorytype`.`LabCode` WHERE `04__monitoring`.`Lab` IN ( 64, 66, 67, 101 )");
           
           
           
           //$result["total"]=$row[0];
           $va_arr = array(); 
           foreach($objquery->result() as $row )
            {
                //$va_arr[]=$row;
                 array_push($va_arr,$row);
            }
             //$va_arr['add_data']='<a href="#"></a>';
            // array_push($va_arr,'<a href=""  ></a>');
            // print_r($va_arr);
            //$result["rows"]=$va_arr;
            //$result["add"]="<a href='#'  >เพิ่มข้อมูล</a>";
            
             echo json_encode($va_arr);
            //echo json_encode($result);
           
       }
       
       public function insert_epi()
       {
             echo    $HN_epilepsy=$this->input->get_post('HN_epilepsy');
             echo  br();
             echo    $frequency=$this->input->get_post('frequency'); //64
             echo br();
             echo    $clinic_response=$this->input->get_post('clinic_response'); //66
             echo br();
             echo   $Duration_of_Attack=$this->input->get_post('Duration_of_Attack');  //101
             echo  br();
             echo   $Severity_of_Attack=$this->input->get_post('Severity_of_Attack'); //67
             echo  br();
             echo   $MonitoringDate=$this->input->get_post('MonitoringDate');  //MonitoringDate->format  17/11/2551
             echo  br();
             
              $exDate=  explode("/", $MonitoringDate );
              echo  $Y=$exDate[2]+543;
              echo br();
              echo   $conDMY=$exDate[0]."/".$exDate[1]."/".$Y;
              echo br();
                
                
              $tb="`04__monitoring`";
           
              
         if(strlen(  $frequency    ) >  0   )     
         {    
             $this->db->set('Clinic', 'Epilepsy Clinic' );   
             $this->db->set('Lab', '64' );   
             $this->db->set('Value', $frequency ); 
             $ck64=$this->db->insert($tb);
                  if( $ck64 )
                    {
                        echo "บันทึกสำเร็จ";
                    }
                else
                {
                     echo "บันทึกล้มเหลว";
                }
         }
         
    
         
         
             
             /*
              *             SELECT *
FROM `laboratorytype`
WHERE `LabCode`
IN ( 64, 66, 67, 101 )
LIMIT 0 , 30
            * 
              */
             
             
           
       }
       
}
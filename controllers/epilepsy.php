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
            SELECT * FROM `04__monitoring` WHERE Lab IN ( 64, 66, 67, 101 )
            */
          
           $objquery=$this->db->query("SELECT * FROM `04__monitoring` WHERE Lab IN ( 64, 66, 67, 101 )");
           
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
            echo   $HN_epilepsy=$this->input->get_post('HN_epilepsy');
           
       }
       
}
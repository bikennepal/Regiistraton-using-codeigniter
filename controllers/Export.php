<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 

class Export extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();

		$this->load->model('export_model','export');
	}

	public function index()
	{
		$data['title']='Display your feedback';
		$data['feedbackinfo']=$this->export->employeelist();

		$this->load->view('users/feedbacklist',$data);

	}

	public function createXLS()
	{
		$this->load->library('excel');
		$object= new PHPExcel();
		$object->setActiveSheetIndex(0);
		$table_columns=array("name",'email_id',"feedback");
		$columns=0;
		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($columns,1,$field);
			$columns++;

		}
		$feedbackinfo=$this->export->employeelist();
		$excel_row=2;

		foreach($feedbackinfo as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row->email_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row->feedback1);
			$excel_row++;
		}
		$object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="feedbackdata.xls"');

		$object_writer->save('php://output');


	}
}
?>
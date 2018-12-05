<?php 
class admin extends MY_Controller
{
public function welcome()
{
	  
	 $this->load->model('loginmodel','ar');
	 $config=[
	 	'base_url'=>base_url('admin/welcome'),
	 	 'per_page'=>3,
	 	 'total_rows'=>$this->ar->num_rows(),
	 	 'full_tag_open'=>"<ul class='pagination'>",
	 	 'full_tag_close'=>"</ul>",
	 	 'next_tag_open'=>"<li>",
	 	 'next_tag_close'=>"</li>",
	 	 'prev_tag_open'=>"<li>",
	 	 'prev_tag_close'=>"</li>",
	 	 'cur_tag_open'=>"<li class='active'><a>",
	 	 'cur_tag_close'=>"</a></li>",
	 ];
	 $this->pagination->initialize($config);

	 	 $articles=$this->ar->articlelist($config['per_page'],$this->uri->segment(3));
	$this->load->view('admin/dashboard',['articles'=>$articles]);
	 

}

public function adduser()
{
	$this->load->view('admin/add_article');
}


public function uservalidation()
{
	if($this->form_validation->run('add_atricle_rules'))
	{
		$post=$this->input->post();
		$this->load->model('loginmodel','useradd');
		if($this->useradd->add_articles($post))
			{
				$this->session->set_flashdata('msg','succesfully inserted');
				$this->session->set_flashdata('msg_class','alert-success');
	}
	else
	{
		$this->session->set_flashdata('msg','please try once again your post is not posted');
		$this->session->set_flashdata('msg_class','alert-danger');
	}
	return redirect('admin/welcome');
}
	else
	{

	$this->load->view('admin/add_article');
}
}

public function edituser($id)
{
	$this->load->model('loginmodel');
	$article=$this->loginmodel->find_article($id);
	$this->load->view('admin/edit_article',['article'=>$article]);
}

public function updatearticle($article_id)

{
	 
	if($this->form_validation->run('add_atricle_rules'))
	{
		$post=$this->input->post();
		//$articleid=$post['article_id'];
		$this->load->model('loginmodel','editupdate');
		if($this->editupdate->update_article($article_id,$post))
			{
				$this->session->set_flashdata('msg','article updated successfully');
				$this->session->set_flashdata('msg_class','alert-success');
	}
	else
	{
		$this->session->set_flashdata('msg','please try once again your post is not updated');
		$this->session->set_flashdata('msg_class','alert-danger');
	}
	return redirect('admin/welcome');
}
	else
	{

	$this->load->view('admin/edituser');
}
}

public function delarticles()
{
	$id=$this->input->post('id');
	$this->load->model('loginmodel','delarticles');
		if($this->delarticles->del($id))
			{
				$this->session->set_flashdata('msg','succesfully deleted');
				$this->session->set_flashdata('msg_class','alert-success');
	}
	else
	{
		$this->session->set_flashdata('msg','please try once again your post is not deleted');
		$this->session->set_flashdata('msg_class','alert-danger');
	}
	return redirect('admin/welcome');
}



 public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id'))
			return redirect('login');
	}
		
public function logout()
{
	$this->session->unset_userdata('id');
	return redirect('admin/logout');

}
public function register()
{
	$this->load->view('admin/register');
}

public function sendemail()
{
	$this->form_validation->set_rules('uname','user Name','required');
	$this->form_validation->set_rules('pass','password','required');
	$this->form_validation->set_rules('firstname','firstname','required');
	$this->form_validation->set_rules('lastname','lastname','required');
	$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email_id]');
	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
 

if($this->form_validation->run())
{
	$this->email->from(set_value('email'),set_value('firstname'));
	$this->email->to('bikensharma222@gmail.com');
	$this->email->subject('greeting from rooms.com');

	$this->email->message('thanku for your registration');
	$this->email->set_newline("\r\n");
	$this->email->send();

	if(!$this->email->send())
	{
		show_error($this->email->print_debugger());
	}
	else
	{
		echo "your email has been send";
	}
}
	else
	{
		$this->load->view('admin/register');
	}



}
}




?>
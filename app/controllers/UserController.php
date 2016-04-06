<?php

class UserController extends BaseController{

	// Process Sign Up Form
	public function postDoSignUp(){
		$data=Input::all();

		$validator=Validator::make(
			array(
				'fullname' => $data['fullname'],
				'account' => $data['account'],
				'password' => $data['password'],
				'passwordcheck' => $data['passwordcheck'],
				'email' => $data['email'],
				'phone' => $data['phone'],
			),
			array(
				'fullname' => 'min:6|required',
				'account' => 'min:6|required',
				'password' => 'min:6|required',
				'passwordcheck' => 'required',
				'email' => 'email|required',
				'phone' => 'numeric',
			),
			array(
				'required' => 'Vui lòng nhập thông tin vào trường này',
				'min' => 'Tối thiểu 6 ký tự',
				'email' => 'Dữ liệu nhập vào có dạng example@domain.com',
				'numeric' => 'Dữ liệu nhập vào chỉ gồm chữ số',
			)
		);
		if($validator->fails()){
			$messages = $validator->messages();
			echo json_encode($messages);
		}else{
			$user=Users::where('account',$data['account'])->first();
			if ($user) {
				echo 'fail: exists account';
			}elseif($data['password']!=$data['passwordcheck']){
				echo 'fail: password check';
			}else{
				$user=new Users;
				$user['fullname']=$data['fullname'];
				$user['account']=$data['account'];
				$user['password']=md5( $data['password'] );
				$user['email']=$data['email'];
				$user['avatar']='assets/images/ava_default.jpg';
				$user['phone']=$data['phone'];
				$user->save();
				echo 'success';
			}
		}
	}

	//Process Update User Infomation
	public function postUpdateInfo(){
		$data=Input::all();

		$validator=Validator::make(
			array(
				'fullname' => $data['fullname'],
				'email' => $data['email'],
				'phone' => $data['phone'],
			),
			array(
				'fullname' => 'min:6|required',
				'email' => 'email|required',
				'phone' => 'numeric',
			),
			array(
				'required' => 'Không được bỏ trống thông tin này',
				'min' => 'Tối thiểu 6 ký tự',
				'email' => 'Dữ liệu nhập vào có dạng example@domain.com',
				'numeric' => 'Dữ liệu nhập vào chỉ gồm chữ số',
			)
		);
		
		if($validator->fails()){
			$messages = $validator->messages();
			echo json_encode($messages);
		}else{
			$user=Users::where('account',$data['account'])->first();

			$user['fullname']=$data['fullname'];
			$user['email']=$data['email'];
			$user['phone']=$data['phone'];
			$user['sex']=$data['sex'];
			$user['birthday']=$data['birthday'];
			$user['address']=$data['address'];
			$user->save();
			echo 'success';
		}
	}

	public function Profile($user){
		if ($user=='login' && !Session::has('user')) {
			return View::make('frontend/signin_signup/login');
		}
		if ($user=='signup' && !Session::has('user')) {
			return View::make('frontend/signin_signup/signup');
		}
		$data['user']=Users::where('account',$user)->first();
		$data['status']=Status::where('public','public')->where('user_id',$data['user']['id'])->orderBy('updated_at','desc')->get();
		$data['comments']=Comments::all();
		if ($data['user']) {
			return View::make('frontend/profile/timeline',$data);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Info($user){
		$this_user=Users::where('account',$user)->first();
		if ($this_user) {
			return View::make('frontend/profile/info')->with('user',$this_user);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Blog($user){
		$data['user']=Users::where('account',$user)->first();
		$data['blog']=Blogs::where('public','public')->orderBy('updated_at','desc')->get();
		$data['comments']=Comments::all();
		if ($data['user']) {
			return View::make('frontend/profile/blog',$data);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Friend($user){
		$this_user=Users::where('account',$user)->first();
		if ($this_user) {
			return View::make('frontend/profile/friend')->with('user',$this_user);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Message($user){
		$this_user=Users::where('account',$user)->first();
		if ($this_user) {
			return View::make('frontend/profile/message')->with('user',$this_user);
		}else{
			return 'ko có user '.$user;
		}
	}

	
	
}
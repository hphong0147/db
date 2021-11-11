<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{
    public $Model;
    public $CLocatoin;
    public $language;
    public function __construct(){
       $this->Model = $this->model('userModel');
       $CLocatoin=$this->Model->sqlSelect('location_list');
       //$_SESSION['language']='vi';
    }
    
    public function Url(){
        echo 'https://'.$this->localhost.'/control_projector/public/upload/videos/';

    }
    public function menu_list($ut){
        if($ut==0){
            $menu_list =array('user_list_mn','ad_mn');
        }elseif($ut==2) {
            $menu_list =array('dashboard_mn');
        }elseif($ut==1) {
            $menu_list =array('user_list_mn');
        }
        return $menu_list;
    }
    
    public function cur_time(){
        $builtdatetime = date("Y/m/d H:i:s");
        echo $builtdatetime;
    }
    
    
    function Show(){        
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $projector_list=$model->projector_status();
        $LocationList=$model->sqlSelect('location_list');
        $DefaultVideo=json_decode($model->video_default(),true);
        //echo $_SESSION['language'].'345';
        //print_r($menu_list);
        if($_SESSION['cur_user_type']==1 || $_SESSION['cur_user_type']==0){
            $this->view("adminpage", [
                "Page"=>"dashboard",
                "Menu"=>$menu_list,
                "Language"=>$_SESSION['language'],
                "ProjectorList"=>$projector_list,
                "DefaultVideo"=>$DefaultVideo[0]['url_video'],
                "LocationList"=>$LocationList
            ]);
        }else{
            $cam_list=$model->cam_pro_list_2($_SESSION['CusInfor'][0]['customer_id']);
            $this->view("adminpage", [
                "Page"=>"dashboardCT",
                "Menu"=>$menu_list,
               "Language"=>$_SESSION['language'],
                "CamList"=>$cam_list,
                "LocationList"=>$LocationList
            
            ]);
        }
        
    }
    function customers(){        
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $projector_list=$model->projector_list();
        //print_r($menu_list);
        $this->view("adminpage", [
            "Page"=>"dashboardCT",
            "Menu"=>$menu_list,
            "Language"=>$_SESSION['language'],
            "ProjectorList"=>$projector_list,
        ]);
    }
    function passwordchange(){        
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        
        //print_r($menu_list);
        $this->view("adminpage", [
            "Page"=>"password",
            "Language"=>$_SESSION['language'],
            "Menu"=>$menu_list
            
        ]);
    }
    function YT(){        
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        
        //print_r($menu_list);
        $this->view("adminpage", [
            "Page"=>"YT",
            "Language"=>$_SESSION['language'],
            "Menu"=>$menu_list
        ]);
    }
    
    function license(){        
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $customersList=$model->customers_list();
        $license_list=$model->license_list();
        //print_r($menu_list);
        $this->view("adminpage", [
            "Page"=>"license",
            "Menu"=>$menu_list,
            "Language"=>$_SESSION['language'],
            "License"=>$license_list,
            "CustomersList"=>$customersList
        ]);
    }
    function licenseDetail(){        
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $customersList=$model->customers_list();
        $license_detail=$model->license_detail();
        //print_r($menu_list);
        $this->view("adminpage", [
            "Page"=>"license_detail",
            "Language"=>$_SESSION['language'],
            "Menu"=>$menu_list,
            "License"=>$license_detail,
            "CustomersList"=>$customersList
        ]);
    }
    function licenseKey(){        
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        
        //print_r($menu_list);
        $this->view("adminpage", [
            "Page"=>"license_key",
            "Language"=>$_SESSION['language'],
            "Menu"=>$menu_list
        ]);
    }
    function Youtube(){        
    
        $this->view("youtube_download");
    }
    function user_list(){        
        $model=$this->model('userModel');
        $userList=$model->user_list();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"user_list",
            'UserList'=>$userList,
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list
        ]);
    }
    function customers_list(){        
        $model=$this->model('userModel');
        $customersList=$model->customers_list();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"customers_list",
            "Language"=>$_SESSION['language'],
            'CustomerList'=>$customersList,
            'Menu'=>$menu_list
        ]);
    }
    function video_list(){        
        $model=$this->model('userModel');
        $videoList=$model->sqlSelect('video_list');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"video_list",
            "Language"=>$_SESSION['language'],
            'VideoList'=>$videoList,
            'Menu'=>$menu_list
        ]);
    }
    function location_list(){        
        $model=$this->model('userModel');
        $LocationList=$model->sqlSelect('location_list');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"location_list",
            "Language"=>$_SESSION['language'],
            'LocationList'=>$LocationList,
            'Menu'=>$menu_list
        ]);
    }
    function projector_list(){        
        $model=$this->model('userModel');
        $projector_list=$model->projector_list();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $LocationList=$model->sqlSelect('location_list');
        $this->view("adminpage", [
            "Page"=>"projector_list",
            'ProjectorList'=>$projector_list,
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list,
            'LocationList'=>$LocationList
        ]);
    }
    function computer_list(){        
        $model=$this->model('userModel');
        $computer_list=$model->computer_list();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $LocationList=$model->sqlSelect('location_list');
        $this->view("adminpage", [
            "Page"=>"computer_list",
            'ComputerList'=>$computer_list,
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list,
            'LocationList'=>$LocationList
        ]);
    }
    function cam_list(){        
        $model=$this->model('userModel');
        $cam_list=$model->campaign_list();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        
        $this->view("adminpage", [
            "Page"=>"cam_list",
            'CamList'=>$cam_list,
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list
        ]);
    }
    function newUser(){        
        $model=$this->model('userModel');
        $msg=array();
        $customer_list=$model->customers_list();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"new_user",
            "Language"=>$_SESSION['language'],
            'CustomerList'=>$customer_list,
            'Menu'=>$menu_list
        ]);
    }
    function newCam(){
        $model=$this->model('userModel');
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $customersList=$model->sqlSelect('customer_list');
        $ProjectorList=$model->projector_list();
        $LocationList=$model->sqlSelect('location_list');
        $this->view("adminpage", [
            "Page"=>"new_cam",
            'Menu'=>$menu_list,
            "Language"=>$_SESSION['language'],
            'CustomersList'=>$customersList,
            'ProjectorList'=>$ProjectorList,
            'LocationList'=>$LocationList
        ]);
    }
    function newCustomers(){        
        $model=$this->model('userModel');
        $msg=array();
        $customer_list=$model->customers_list();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"new_customer",
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list
        ]);
    }
    function newVideo(){        
        $model=$this->model('userModel');
        $msg=array();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"new_video",
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list
        ]);
    }
    function defaultVideo(){        
        $model=$this->model('userModel');
        $msg=array();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $videoDefault=$model->video_default();
        $this->view("adminpage", [
            "Page"=>"default_video",
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list,
            'videoInfo'=>$videoDefault
        ]);
    }
    function newProjector(){        
        $model=$this->model('userModel');
        $msg=array();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $LocationList=$model->sqlSelect('location_list');
        $this->view("adminpage", [
            "Page"=>"new_projector",
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list,
            'LocationList'=>$LocationList//$this->CLocatoin
        ]);
    }
    function newComputer(){        
        $model=$this->model('userModel');
        $msg=array();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $LocationList=$model->sqlSelect('location_list');
        $this->view("adminpage", [
            "Page"=>"new_computer",
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list,
            'LocationList'=>$LocationList//$this->CLocatoin
        ]);
    }
    function newLocation(){        
        $model=$this->model('userModel');
        $msg=array();
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $this->view("adminpage", [
            "Page"=>"new_location",
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list
        ]);
    }
    function Login(){        
        
        
        if(isset($_POST['login'])){
            //echo "<script type='text/javascript'>alert('click');</script>";
            $model=$this->model('userModel');
            $msg=array();
            $rs=$model->CheckLogin($_REQUEST['username'],$_REQUEST['password']);
            if($rs==0) {
                
                $this->view("login",[
                            'er_un'=>'Tên đăng nhập không chính xác !',
                            "Language"=>'en',
                            'Page'=>'form_2'
                            ]);
            }elseif($rs==1){
                
                $this->view("login",[
                             'er_pw'=>'Sai mật khẩu !',
                             'Page'=>'form_2',
                             "Language"=>'en',
                             'un'=>$_REQUEST['username']
                             ]);
               
            }elseif($rs==2){
                  $_SESSION['username']=$_REQUEST['username'];      
                  $_SESSION['password']=$_REQUEST['password'];  
                  $userInfo=json_decode($model->userLoginInfor($_REQUEST['username']),true);
                  $_SESSION['cur_acc_id']=$userInfo[0]['account_id'];
                  $_SESSION['cur_user_type']=$userInfo[0]['user_type'];
                  $_SESSION['language']=$userInfo[0]['language'];
                  $_SESSION['CusInfor']=json_decode($model->customers_infor_2($userInfo[0]['account_id']),true);
                 //echo $_SESSION['language'].'123';
                header('location: https://'.$this->localhost.'/');  
        
            }
        }
        $this->view("login",[
            'Page'=>'form_2',
            "Language"=>'en',
        ]);
    }
    function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['cur_acc_id']);
        unset($_SESSION['cur_user_type']);
        header('location: https://'.$this->localhost.'/home/login');
    }
    function user_edit($un_id){        
        $model=$this->model('userModel');
        $msg=array();
        $customer_list=$model->customers_list();
        $userInfo=$model->user_infor($un_id);
        $menu_list=$this->menu_list($_SESSION['cur_user_type']);
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->view("adminpage", [
            "Page"=>"edit_user",
            'CustomerList'=>$customer_list,
            'UserInfor'=>$userInfo,
            "Language"=>$_SESSION['language'],
            'Menu'=>$menu_list
        ]);
    }
    function customers_edit($cm_id){        
            $model=$this->model('userModel');
            $msg=array();
            $customersInfor=$model->customers_infor($cm_id);
            $menu_list=$this->menu_list($_SESSION['cur_user_type']);
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            
            $customersInfor=$model->customers_infor($cm_id);
            $this->view("adminpage", [
                "Page"=>"edit_customers",
                'CustomersInfor'=>$customersInfor,
                "Language"=>$_SESSION['language'],
                'REQUEST_URI'=>$actual_link,
                'Menu'=>$menu_list
            ]);
                
        }
        
        function projector_edit($id){        
            $model=$this->model('userModel');
            $msg=array();
            $projectorInfor=$model->projector_infor($id);
            $menu_list=$this->menu_list($_SESSION['cur_user_type']);
            //$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $projectorSession=$model->sqlSelect_id('projector_session','projector_id',$id);
            $LocationList=$model->sqlSelect('location_list');
            $this->view("adminpage", [
                "Page"=>"edit_projector",
                'ProjectorInfor'=>$projectorInfor,
                "Language"=>$_SESSION['language'],
                'ProjectorSession'=>$projectorSession,
                'Menu'=>$menu_list,
                'LocationList'=>$LocationList
            ]);
                
        }
        function location_edit($id){        
            $model=$this->model('userModel');
            $msg=array();
            $menu_list=$this->menu_list($_SESSION['cur_user_type']);
            $location=$model->sqlSelect_id('location_list','id',$id);
            $LocationList=$model->sqlSelect('location_list');
            $this->view("adminpage", [
                "Page"=>"location_edit",
                'LocationEdit'=>$location,
                "Language"=>$_SESSION['language'],
                'LocationList'=>$LocationList,
                'Menu'=>$menu_list
            ]);
                
        }
        function computer_edit($id){        
            $model=$this->model('userModel');
            $msg=array();
            $menu_list=$this->menu_list($_SESSION['cur_user_type']);
            $computer=$model->computer_info($id);
            $LocationList=$model->sqlSelect('location_list');
            $this->view("adminpage", [
                "Page"=>"computer_edit",
                'ComputerEdit'=>$computer,
                "Language"=>$_SESSION['language'],
                'LocationList'=>$LocationList,
                'Menu'=>$menu_list
            ]);
                
        }
        function editCam($id){
            $model=$this->model('userModel');
            $menu_list=$this->menu_list($_SESSION['cur_user_type']);
            $videoList=$model->sqlSelect('video_list');
            $ProjectorList=$model->projector_list();
            $cam_info=$model->campaign_info($id);
            $cam_pro_info=$model->campaign_projector_info($id);
            $customersList=$model->sqlSelect('customer_list');
            $LocationList=$model->sqlSelect('location_list');
            $this->view("adminpage", [
                "Page"=>"cam_edit",
                'Menu'=>$menu_list,
                'ProjectorList'=>$ProjectorList,
                'CamInfo'=>$cam_info,
                'CamProInfo'=>$cam_pro_info,
                "Language"=>$_SESSION['language'],
                'CustomersList'=>$customersList,
                'LocationList'=>$LocationList
            ]);
        }
        
    
}
?>
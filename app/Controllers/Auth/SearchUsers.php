<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SearchUsers extends BaseController
{
  public function index()
  {
    $session = \Config\Services::session();
    $check = $session->isLoginUserAdmin;
    if ($check) {
      return view("auth/search_users");
    } else {
      return redirect()->to(base_url('login'));
    }
  }
  public function showDetailData()
  {
    $spinner="http://localhost:8080/profile/spinner.gif";
    $umodel = new UserModel();
    $umodel->where('email', $this->request->getVar('email'));
    $res = $umodel->get()->getRowArray();
    if ($res) {
      $firstName = $res['first_name'];
      $firstName = $res['first_name'];
      $comdName = $firstName . " " . $firstName;
      $baseurl = "http://localhost:8080/asset/auth/dist/img/photo1.png";
      $imgPath = "http://localhost:8080/" . $res['img_path'];
      $dob = date("d-m-Y", strtotime($res['dob']));
      if ($res['gender'] == 1) {
        $msg = "Male";
      } else {
        $msg = "Female";
      }
      $regist = date("D jS M Y", strtotime($res['created_at']));
      //echo json_encode($res);
      echo "
            <div class='row'>
            <div class='col-md-5 offset-4 mt-3'>
            <div class='card card-widget widget-user'>
              <div class='widget-user-header text-white' style='background: url($baseurl) center center;'>
                <h3 class='widget-user-username text-right'>{$comdName}</h3>
                <h5 class='widget-user-desc text-right'>Position</h5>
              </div>
              <div class='widget-user-image'>
                <img class='img-circle' src='{$imgPath}'>
              </div>
              <div class='card-footer'>
                <div class='row'>
                  <div class='col-sm-4'>
                    <div class='description-block'>
                      <h5 class='description-header'>Gender</h5>
                      <span class='description-text text-sm'>{$msg}</span>
                    </div>
                  </div>
                  <div class='col-sm-4'>
                    <div class='description-block'>
                      <h5 class='description-header'>Dob</h5>
                      <span class='description-text text-sm'>{$dob}</span>
                    </div>
                  </div>
                  <div class='col-sm-4'>
                    <div class='description-block'>
                      <h5 class='description-header'>Phone</h5>
                      <span class='description-text text-sm'>{$res['phone']}</span>
                    </div>
                  </div>
                  <div class='col-sm-7'>
                    <div class='description-block'>
                      <h5 class='description-header'>Email</h5>
                      <span class='description-text'>{$res['email']}</span>
                    </div>
                  </div>
                  <div class='col-sm-4'>
                    <div class='description-block'>
                      <h5 class='description-header'>Regist Date</h5>
                      <span class='description-text text-sm'>{$regist}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>";
    }else{
      echo "
      <div class='row'>
      <div class='col-md-9 offset-2 mt-3'>
      <div class='card' style='height:120px;'>
        <div class='card-body text-center'>
        <img style='margin-top:-13px;' class='img-circle' width='80px' height='80px' src='{$spinner}'>
        <p>Data Not Found!</p>
        </div>
      </div>
    </div>
    </div>";
    }
  }
}

<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\BankModel;
use App\Models\NewsPost;
use App\Models\UserModel;
use App\Models\UserSalary;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $tdb = new UserModel();
            $count = $tdb->get();
            $totalUser = $count->getNumRows();
            //Bank
            $dbank = new BankModel();
            $bnk = $dbank->get();
            $totalBank = $bnk->getNumRows();
            //Total Salary Count
            $db = \Config\Database::connect();
            $query = $db->query('SELECT SUM(amount) as total_amount FROM salary');
            $result = $query->getRow();
            $total_amount = $result->total_amount;
            //Amount Convert In K,M,B,T,Q
            function thousand_format($number) {
                $number = (int) preg_replace('/[^0-9]/', '', $number);
                if ($number >= 1000) {
                    $rn = round($number);
                    $format_number = number_format($rn);
                    $ar_nbr = explode(',', $format_number);
                    $x_parts = array('K', 'M', 'B', 'T', 'Q');
                    $x_count_parts = count($ar_nbr) - 1;
                    $dn = $ar_nbr[0] . ((int) $ar_nbr[1][0] !== 0 ? '.' . $ar_nbr[1][0] : '');
                    $dn .= $x_parts[$x_count_parts - 1];
                    return $dn;
                }
                return $number;
            }
            $totalConvert=thousand_format($total_amount);
            //Total News Count
            $tns = new NewsPost();
            $tncount = $tns->get();
            $newsCount = $tncount->getNumRows();
            //Send Data
            $data = array(
                'tu' => $totalUser,
                'tbank' => $totalBank,
                'sum'=>$totalConvert,
                'news'=>$newsCount
            );
            // $db = \Config\Database::connect();
            // $query = $db->table('signup');
            // $query->where('email', $check);
            // $results = $query->get()->getRowArray();
            return view('auth/index', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}

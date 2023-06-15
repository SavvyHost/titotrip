<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Facades\Agent;
use Session;
use Mail;
use Crypt;
require("custom/auth.php");

class Main extends Controller {

    public function home ( Request $req ) {

        $recently_tours = db_read("tours", "id <= 5");
        $recommend_tours = db_read("tours", "id > 4 and id <= 10");
        $based_tours = db_read("tours", "id > 6 and id <= 12");
        $data = ['recently_tours' => $recently_tours, "recommend_tours" => $recommend_tours, "based_tours" => $based_tours];

        return view("home", with($data));

    }

    public function wishlist ( Request $req ) {

        return view("wishlist");

    }

    public function bookings ( Request $req ) {

        $recommend_tours = db_read("tours", "id > 4 and id <= 10");
        $data = ["recommend_tours" => $recommend_tours];

        return view("bookings", with($data));

    }

    public function tour ( Request $req, $id ) {

        if ( !$id ) return redirect("/");

        if ( !DB::table("tours")->where("id", $id)->exists() ) return redirect("/");

        $recently_tours = db_read("tours", "id <= 4");
        $recommend_tours = db_read("tours", "id > 4 and id <= 8");
        $based_tours = db_read("tours", "id > 8 and id <= 12");
        $tours = db_read("tours", "id=$id")[0];
        $data = [
            'recently_tours' => $recently_tours, "recommend_tours" => $recommend_tours,
            "based_tours" => $based_tours, "tours" => $tours
        ];

        return view("tour", with($data));

    }

    public function search ( Request $req, $query, $date ) {

        if ( !$query && !$date ) return redirect("/");

        $all_date = explode("-", $date);
        $date = "";
        foreach($all_date as $d){ $date .= trim($d, "0") . "-"; }
        $date = trim($date, "-");

        if ( $date && $query ) $tours = db_read("tours", "(title like '%$query%' or location like '%$query%') and date like '%$date%'");
        else if ( $date ) $tours = db_read("tours", "date like '%$date%'");
        else if ( $query ) $tours = db_read("tours", "title like '%$query%' or location like '%$query%'");
        else $tours = db_read("tours", "id>0");

        return view("search",with(["tours" => $tours]));

    }

    public function checkout ( Request $req ) {

        return view("checkout.book");

    }

    public function account ( Request $req ) {

        if ( !Session::get('user') ) return redirect("/login");

        return view("account.index");

    }

    public function login ( Request $req ) {

        if ( Session::get('user') ) return redirect("/");

        if ( $req->method() == "POST" ) {

            if ( $req->header("request") == "login" ) {

                $response = signin($req);

                if ( $response == true ) Session::put("user", DB::table("users")->where("email", $req['email'])->first());

                return response()->json(['status' => $response]);

            }

        }

        return view("auth.login");

    }

    public function register ( Request $req ) {

        if ( Session::get('user') ) return redirect("/");

        if ( $req->method() == "POST" ) {

            if ( $req->header("request") == "register" ) {

                $response = signup($req);

                if ( $response == true ) Session::put("user", DB::table("users")->where("email", $req['email'])->first());

                return response()->json(['status' => $response]);

            }

        }

        return view("auth.register");

    }

    public function recovery ( Request $req ) {

        if ( Session::get('user') ) return redirect("/");

        if ( $req->method() == "POST" ) {

            if ( $req->header("request") == "recovery" ) {

                $response = password_recovery($req);

                return response()->json(['status' => $response]);

            }

        }

        return view("auth.recovery");

    }

    public function change ( Request $req, $token ) {

        if ( Session::get('user') ) return redirect("/");

        $status = false;

        if ( DB::table("recoveries")->where("token", $token)->exists() ) $status = true;

        if ( $req->method() == "POST" ) {

            if ( $req->header("request") == "change_password" ) {

                $response = change_password($req);

                return response()->json(['status' => $response]);

            }

        }

        return view("auth.change", with(['status'=>$status]));

    }

    public function actions ( Request $req ) {

        if ( $req->method() == "POST" ) {

            if ( $req->header("request") == "logout" ) {

                apis($req, "logout");

            }
            if ( $req->header("request") == "wishlist" ) {

                $wishlist = apis($req, "wishlist");

                return response()->json(['wishlist' => $wishlist]);

            }

        }

    }

    public function help ( Request $req ) {

        return view("help");

    }

    public function location ( Request $req, $loc ) {

        if ( !$loc ) return redirect("/");

        $attractions = db_read("tours", "id > 0");

        $data = ['attractions' => $attractions];

        return view("location", with($data));

    }

    public function attraction ( Request $req, $atr ) {

        if ( !$atr ) return redirect("/");

        $attractions = db_read("tours", "id > 0");

        $data = ['attractions' => $attractions];

        return view("attraction", with($data));

    }

    public function error ( Request $req ) {

        return view("error");

    }

}

<?php

use App\Mail\Recovery;

function signup ( $request ) {

    $platform = Agent::platform();
    $platform_version = Agent::version($platform);
    $browser = Agent::browser();
    $browser_version = Agent::version($browser);
    if ( Agent::isDesktop() ) $type = "Desktop";
    else if ( Agent::isTablet() ) $type = "Tablet";
    else if ( Agent::isPhone() ) $type = "Phone";
    $login_device = "$platform ( $platform_version ) - $browser ( $browser_version) - $type";

    $data = [
        "username" => $request['username'],
        "email" => $request['email'],
        "phone" => $request['phone'],
        "password" => $request['password'],
        "image" => $request['image'],
        "register_ip" => $request['ip'],
        "login_ip" => $request['ip'],
        "country" => $request['country'],
        "language" => $request['language'],
        "gender" => $request['gender'],
        "register_date" => $request['register_date'],
        "login_date" => $request['login_date'],
        "register_device" => $login_device,
        "login_device" => $login_device,
        "active" => true,
    ];

    $error = false;

    if ( DB::table("users")->where("email", $request['email'])->exists() ) $error = "email";

    if ( $error ) return $error;

    DB::table("users")->insert($data);
    
    return true;

}
function signin ( $request ) {

    $platform = Agent::platform();
    $platform_version = Agent::version($platform);
    $browser = Agent::browser();
    $browser_version = Agent::version($browser);
    if ( Agent::isDesktop() ) $type = "Desktop";
    else if ( Agent::isTablet() ) $type = "Tablet";
    else if ( Agent::isPhone() ) $type = "Phone";
    $login_device = "$platform ( $platform_version ) - $browser ( $browser_version) - $type";

    $data = [
        "login_date" => $request['login_date'],
        "login_device" => $login_device,
        "login_ip" => $request['ip'],
    ];

    $status = false;

    if ( DB::table("users")->where("email", $request['email'])->exists() ) {
        
        if ( DB::table("users")->where("password", $request['password'])->exists() )  {
            
            DB::table("users")->where("email", $request['email'])->update($data);

            $status = true;

        }

    }
    
    return $status;

}
function password_recovery ( $request ) {

    if ( DB::table("users")->where("email", $request['email'])->exists() ) {

        $user_data = DB::table("users")->where("email", $request['email'])->first();
        $user_id = $user_data->id;
        $username = $user_data->username;
        $email = $request['email'];
        $date = $request['date'];
        $host = url("/");
        $token = Crypt::encrypt("$user_id,$date");
        $data = ["user_id" => $user_id, "date" => $date, "token" => $token ];
        $details = ['home' => $host, 'username' => $username, "reset_link" => "$host/password-recovery?token=$token"];

        if ( DB::table("recoveries")->where("user_id", $user_id)->exists() ) {

            DB::table("recoveries")->where("user_id", $user_id)->update($data);

        }
        else {

            DB::table("recoveries")->insert($data);

        }

        Mail::to($email)->send(new Recovery($details));

        return true;

    }

    return false;

}
function change_password ( $request ) {

    $password = $request['password'];
    $token = $request['token'];

    if ( DB::table("recoveries")->where("token", $token)->exists() ) {

        try{ $token = Crypt::decrypt($token); } catch (DecryptException $e) { return false; }

    }

    $user_id = trim(explode(",", $token)[0]);

    if ( trim($password) != trim(DB::table("users")->where("id", $user_id)->first()->password) ) {

        DB::table("recoveries")->where("user_id", $user_id)->delete();

        DB::table("users")->where("id", $user_id)->update(['password'=>$password]);

        return true;

    }

    else return "exist";

    return false;
    
}
function db_read ( $table, $query ) {

    $data = DB::select("select * from $table where $query");

    return $data;

}
function apis ( $request, $query ) {

    if ( $query == "logout" ) {

        Session::forget("user");

        return true;

    }
    if ( $query == "wishlist" ) {

        $wishlist_ids = $request['wishlist'];
        $tours = [];

        if ( !$wishlist_ids ) return $tours;

        foreach( $wishlist_ids as $id ) {

            $tour = db_read("tours", "id=$id")[0];

            $data = [
                "id" => $tour->id,
                "title" => $tour->title,
                "image" => explode(",", $tour->images)[0],
                "price" => $tour->price,
                "reviews" => $tour->reviews,
            ];

            array_push($tours, $data);

        }

        return $tours;

    }

}

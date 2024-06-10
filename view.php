<?php




function to_account_middleware(){
    if (Session::get("loged_in_by")){
        redirect("/account");
    }
}


function to_home_middleware(){
    if (!Session::get("loged_in_by")){
        redirect("/");
    }
}


function to_login_middleware(){
    if (!Session::get("loged_in_by")){
        redirect("/login");
    }
}







class Home{
    function get(){
        loadTemplate("templates/home.php");
    }


    function post(){
        redirect("/");
    }
}



class Login{
    function get(){
        loadTemplate("templates/login.php");
    }


    function post(){
    }
}




class Register{
    function get(){
        loadTemplate("templates/register.php");
    }


    function post(){
    }
}



class Account{
    function get(){
        loadTemplate("templates/account.php");
    }


    function post(){
    }
}





class Logout{
    function get(){
        Session::delete("loged_in_by");
        redirect("/");
    }


    function post(){
        redirect("/");
    }
}











?>
<?php
class SiteController
{   
    public function home()
    {
//        dd(explode(' ', $_COOKIE['rightList']));
//        dd(RIGHT_STUDENT_BORROW_BOOK);
        viewSite('home');
    }

    public function signup()
    {
        viewSite('signup');
    }

    public function signin()
    {
        viewSite('signin');
    }


}

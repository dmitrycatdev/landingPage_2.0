<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Portfolio;
use App\Service;
use App\Employee;
use DB;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class IndexController extends Controller
{
    public function execute(Request $request) {

        if($request->isMethod('post')) {

            $messages = [
                'required' => ":attribute is required!",
                'email' => "Incorrect email!"
            ];
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ], $messages);
            $data = $request->all();
            $mail_admin = env('MAIL_ADMIN');
            $result = Mail::to($mail_admin, ['data'=>$data], function ($message) use ($data) {
//                $mail_admin = env('MAIL_ADMIN');
                $message->from($data['email']);
                $message->to('f725020a97-81bc96@inbox.mailtrap.io')->subject('Question');
            });
            if($result) {
                return redirect()->route('home')->with('status', 'Email is send');
            }

        }

        $pages = Page::all();
        $portfolios = Portfolio::get(array('name','filter','images'));
        $services = Service::all();
        $employees = Employee::take(3)->get(); 
        
        $tags = DB::table('portfolios')->distinct()->pluck('filter');
        
        //dd($tags);
        
        $menu = array();
        foreach($pages as $page) {
            $item = array('title' => $page->name,'alias'=>$page->alias);
            array_push($menu, $item);
        }
        $item = array('title' => 'Sevices', 'alias' => 'service');
        array_push($menu, $item);
        $item = array('title' => 'Portfolio', 'alias' => 'Portfolio');
        array_push($menu, $item);
//        $item = array('title' => 'Team', 'alias' => 'team');
//        array_push($menu, $item);
        $item = array('title' => 'Contact', 'alias' => 'contact');
        array_push($menu, $item);
        return view('site.index', array(
                                        'menu' => $menu,
                                        'pages' => $pages,
                                        'services' => $services,
                                        'portfolios' => $portfolios,
//                                        'employees' => $employees,
                                        'tags' => $tags
        ));
    }
}

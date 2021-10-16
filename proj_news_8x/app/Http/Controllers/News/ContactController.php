<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest as MainRequest;
use App\Models\SettingModel;
// use Illuminate\Support\Facades\Mail;
use Mail;

class ContactController extends Controller
{
    private $pathViewController = 'news.pages.contact.';  // slider
    private $controllerName     = 'contact';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        view()->share('title', 'Liên Hệ');

        $settingModel = new SettingModel();

        $contact  = $settingModel->getItem(null, ['task' => 'new-in-contact']);

        $contactValue = [
            'address' => [
                'name' => 'Địa chỉ',
                'description' => $contact['address'],
                'icon' => 'fa fa-map-marker',
            ],
            'hotline' => [
                'name' => 'Hotline',
                'description' => $contact['hotline'],
                'icon' => 'fa fa-phone',
            ],
            'email' => [
                'name' => 'Email',
                'description' => $contact['email'],
                'icon' => 'fa fa-envelope-o',
            ],
        ];
        $map = $contact['map'];
        return view($this->pathViewController .  'index', [
            'contactValue' => $contactValue,
            'map'     => $map,
        ]);
    }

    public function sendContact(MainRequest $request)
    {   
        
        $params = $request->all();
        $email['to_email'] = $params['email'];
        $email['to_email_bcc'] = '';
        $titleEmail = 'Thông báo từ ZendVN';

        Mail::send('news.pages.contact.email', $email, function ($message) use ($titleEmail, $email) {
            $message->to($email['to_email'])->subject($titleEmail);
            $message->from($email['to_email'], $titleEmail);
        });
        return redirect()->back()->with('send_success', 'Gửi thông tin liên hệ thành công');
    }
}

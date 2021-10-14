<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Template;
use Illuminate\Http\Request;
use App\Models\SettingModel as MainModel;
use App\Http\Requests\SettingRequest as MainRequest;

class SettingController extends Controller
{
    private $pathViewController = 'admin.pages.setting.';  // slider
    private $controllerName     = 'setting';
    private $params             = [];
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $item = $this->model->getItem(null,['task' => 'setting-general']);
        return view($this->pathViewController .  'index', [
            'item' => $item,
        ]);
    }

    public function general(MainRequest $request)
    {

        if ($request->method() == 'POST') {
            $params = $request->all();
            unset($params['_token']);
            unset($params['id']);
            
            $this->model->saveItem($params, ['task' => 'setting-general']);
            return redirect()->route('setting',['type'=>'general'])->with("zvn_notify", 'Cập nhật thành công');
            
        }
    }
}

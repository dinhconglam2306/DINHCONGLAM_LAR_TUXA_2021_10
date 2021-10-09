<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleModel;
use App\Models\RssModel;
use App\Models\SliderModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $pathViewController = 'admin.pages.dashboard.';  // slider
    private $controllerName     = 'dashboard';
    private $params             = [];
    private $model             = '';

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index()
    {
        $articleModel  = new ArticleModel();
        $categoryModel = new CategoryModel();
        $userModel     = new UserModel();
        $sliderModel   = new SliderModel();
        $rssModel      = new RssModel();

        $totalArticle  = $articleModel->countItems($this->params, ['task' => 'count-item-in-dashboard']);
        $totalCategory = $categoryModel->countItems($this->params, ['task' => 'count-item-in-dashboard']);
        $totalUser     = $userModel->countItems($this->params, ['task' => 'count-item-in-dashboard']);
        $totalSlider   = $sliderModel->countItems($this->params, ['task' => 'count-item-in-dashboard']);
        $totalRss      = $rssModel->countItems($this->params, ['task' => 'count-item-in-dashboard']);

        $totalArticle = array_sum(array_column($totalArticle,'count'));
        $totalCategory = array_sum(array_column($totalCategory,'count'));
        $totalUser = array_sum(array_column($totalUser,'count'));
        $totalSlider = array_sum(array_column($totalSlider,'count'));
        $totalRss = array_sum(array_column($totalRss,'count'));



        $arrMenuValue = [
            ['link' => route('user'),     'name' => 'User', 'icon' => 'fa fa-user', 'total' => $totalUser],
            ['link' => route('category'), 'name' => 'Category', 'icon' => 'fa fa fa-building-o', 'total' => $totalCategory],
            ['link' => route('article'),  'name' => 'Article', 'icon' => 'fa fa-newspaper-o', 'total' => $totalArticle],
            ['link' => route('slider'),   'name' => 'Slider', 'icon' => 'fa fa-sliders', 'total' => $totalSlider],
            ['link' => route('rss'),      'name' => 'Rss', 'icon' => 'fa fa-link', 'total' => $totalRss],
        ];
        
        return view($this->pathViewController .  'index', [
                'arrMenuValue' => $arrMenuValue,
        ]);
    }
}

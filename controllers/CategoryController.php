<?php

namespace UrsacoreLab\Blog\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use UrsacoreLab\Blog\Models\BlogSettings;
use UrsacoreLab\Blog\Models\Category;
use UrsacoreLab\Blog\Resources\CategoryResource;
use UrsacoreLab\StaticVars\Classes\Additional;
use UrsacoreLab\StaticVars\Classes\Statuses;

class CategoryController extends Controller
{
    protected bool $additional_parameter_show_for_list = false;

    protected bool $additional_parameter_show_for_single = false;

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        $this->additional_parameter_show_for_list   = (boolean) BlogSettings::instance()->additional_parameter_show_for_list;
        $this->additional_parameter_show_for_single = (boolean) BlogSettings::instance()->additional_parameter_show_for_single;

        parent::__construct();

        BackendMenu::setContext('UrsacoreLab.Blog', 'blog', 'CategoryController');

        $this->addCss('/plugins/ursacorelab/staticvars/assets/ursacorelab_backend_styles.css');
        $this->bodyClass = 'ursacorelab_body';
    }

    public function category_list(): AnonymousResourceCollection
    {
        $data = Category::query()
            ->where('status', Statuses::ACTIVE)
            ->orderBy('created_at', 'desc')
            ->get();

        return CategoryResource::collection($data)
            ->additional(
                $data->isEmpty()
                    ?
                    Additional::warning($this->additional_parameter_show_for_list)
                    :
                    Additional::success($this->additional_parameter_show_for_list, null, 'statuses.synced')
            );
    }

    public function category_single($slug): CategoryResource|array
    {
        $data = Category::query()
            ->where('slug', $slug)
            ->where('status', Statuses::ACTIVE)
            ->first();

        if (isset($data)) {
            return CategoryResource::make($data)
                ->additional(Additional::success($this->additional_parameter_show_for_single, null, 'statuses.synced'));
        }

        return Additional::error($this->additional_parameter_show_for_single);
    }
}

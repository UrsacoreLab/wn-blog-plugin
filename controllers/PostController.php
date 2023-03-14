<?php

namespace UrsacoreLab\Blog\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use UrsacoreLab\Blog\Models\BlogSettings;
use UrsacoreLab\Blog\Models\Post;
use UrsacoreLab\Blog\Resources\PostResource;
use UrsacoreLab\StaticVars\Classes\Additional;
use UrsacoreLab\StaticVars\Classes\Statuses;

class PostController extends Controller
{
    protected bool $additional_parameter_show_for_list = false;

    protected bool $additional_parameter_show_for_single = false;

    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        $this->additional_parameter_show_for_list   = (boolean) BlogSettings::instance()->additional_parameter_show_for_posts_list;
        $this->additional_parameter_show_for_single = (boolean) BlogSettings::instance()->additional_parameter_show_for_single_post;

        parent::__construct();

        BackendMenu::setContext('UrsacoreLab.Blog', 'blog', 'PostController');

        $this->addCss('/plugins/ursacorelab/staticvars/assets/ursacorelab_backend_styles.css');
        $this->bodyClass = 'ursacorelab_body';
    }

    public function post_list(): AnonymousResourceCollection
    {
        $data = Post::query()
            ->where('status', Statuses::ACTIVE)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return PostResource::collection($data)
            ->additional(
                $data->isEmpty()
                    ?
                    Additional::warning($this->additional_parameter_show_for_list)
                    :
                    Additional::success($this->additional_parameter_show_for_list, null, 'statuses.synced')
            );
    }

    public function post_single($slug): PostResource|array
    {
        $data = Post::query()
            ->where('slug', $slug)
            ->where('status', Statuses::ACTIVE)
            ->first();

        if ($data) {
            return PostResource::make($data)
                ->additional(Additional::success($this->additional_parameter_show_for_single, null, 'statuses.synced'));
        }

        return Additional::error($this->additional_parameter_show_for_single);
    }
}

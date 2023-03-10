<?php

namespace UrsacoreLab\Blog\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;

class CategoryController extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('UrsacoreLab.Blog', 'blog', 'CategoryController');

        $this->addCss('/plugins/ursacorelab/staticvars/assets/ursacorelab_backend_styles.css');
        $this->bodyClass = 'ursacorelab_body';
    }
}

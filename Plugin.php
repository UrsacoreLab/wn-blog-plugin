<?php

namespace UrsacoreLab\Blog;

use Backend\Facades\Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = ['UrsacoreLab.StaticVars'];

    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'ursacorelab.blog::lang.plugin.name',
            'description' => 'ursacorelab.blog::lang.plugin.description',
            'author'      => 'UrsacoreLab',
            'icon'        => 'icon-leaf',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return [
            'ursacorelab.blog.access' => [
                'tab'   => 'ursacorelab.blog::lang.plugin.name',
                'label' => 'ursacorelab.blog::lang.permissions.access',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return [
            'blog' => [
                'label'       => 'ursacorelab.blog::lang.plugin.name',
                'url'         => Backend::url('UrsacoreLab/Blog/PostController'),
                'icon'        => 'icon-leaf',
                'iconSvg'     => 'plugins/ursacorelab/blog/assets/icon_ursacorelab_blog.svg',
                'permissions' => ['ursacorelab.blog.access'],
                'order'       => 500,

                'sideMenu' => [
                    'PostController' => [
                        'label'       => 'ursacorelab.blog::lang.controller.post.label',
                        'url'         => Backend::url('UrsacoreLab/Blog/PostController'),
                        'icon'        => 'icon-list',
                        'permissions' => ['ursacorelab.blog.access'],
                        'order'       => 500,
                    ],

                    'CategoryController' => [
                        'label'       => 'ursacorelab.blog::lang.controller.category.label',
                        'url'         => Backend::url('UrsacoreLab/Blog/CategoryController'),
                        'icon'        => 'icon-list-ol',
                        'permissions' => ['ursacorelab.blog.access'],
                        'order'       => 500,
                    ],
                ],
            ],
        ];
    }
}

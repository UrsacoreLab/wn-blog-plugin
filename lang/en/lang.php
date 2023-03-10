<?php

return [
    'plugin' => [
        'name'        => 'Blog',
        'description' => 'Posts plugin',
    ],

    'permissions' => [
        'access' => 'Blog plugin access',
    ],

    'model' => [
        'id'           => 'ID',
        'category_id'  => 'Category',
        'name'         => 'Name',
        'title'        => 'Title',
        'slug'         => 'URL',
        'keywords'     => 'Keywords',
        'introductory' => 'Description',
        'content'      => 'Content',
        'image'        => 'Image',
        'status'       => 'Status',
        'created_at'   => 'Created At',
        'updated_at'   => 'Updated At',
    ],

    'controller' => [
        'post' => [
            'label' => 'Posts',

            'create'   => 'Create post',
            'creating' => 'Creating',

            'saving' => 'Saving',

            'update'   => 'Update post',
            'updating' => 'Updating',

            'deleting' => 'Deleting',
        ],

        'category' => [
            'label' => 'Categories',

            'create'   => 'Create category',
            'creating' => 'Creating',

            'saving' => 'Saving',

            'update'   => 'Update category',
            'updating' => 'Updating',

            'deleting' => 'Deleting',
        ],
    ],
];

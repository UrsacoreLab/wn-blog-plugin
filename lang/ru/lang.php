<?php

return [
    'plugin' => [
        'name'        => 'Блог',
        'description' => 'Блог-плагин - новости / статьи и др.',
    ],

    'permissions' => [
        'access' => 'Доступ к плагину Блог',
    ],

    'model' => [
        'id'           => 'ID',
        'category_id'  => 'Категория',
        'name'         => 'Название',
        'title'        => 'Заголовок',
        'slug'         => 'URL',
        'keywords'     => 'Ключевые слова',
        'introductory' => 'Краткое описание',
        'content'      => 'Полное описание',
        'image'        => 'Изображение',
        'status'       => 'Статус',
        'created_at'   => 'Создано',
        'updated_at'   => 'Обновлено',
    ],

    'controller' => [
        'post' => [
            'label' => 'Посты',

            'create'   => 'Добавить пост',
            'creating' => 'Добавление',

            'saving' => 'Сохранение',

            'update'   => 'Редактирование поста',
            'updating' => 'Обновление',

            'deleting' => 'Удаление',
        ],

        'category' => [
            'label' => 'Категории',

            'create'   => 'Добавить категорию',
            'creating' => 'Добавление',

            'saving' => 'Сохранение',

            'update'   => 'Редактирование категории',
            'updating' => 'Обновление',

            'deleting' => 'Удаление',
        ],
    ],

    'settings' => [
        'additional_parameter_show_for_list'   => 'Возвращаемый дополнительный параметр "show" для списка',
        'additional_parameter_show_for_single' => 'Возвращаемый дополнительный параметр "show" для указанного',
    ],
];

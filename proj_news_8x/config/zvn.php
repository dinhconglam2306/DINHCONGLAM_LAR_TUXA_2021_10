<?php

return [
    'url'              => [
        'prefix_admin' => 'admin',
        'prefix_news'  => '',
    ],
    'format'           => [
        'long_time'    => 'H:m:s d/m/Y',
        'short_time'   => 'd/m/Y',
    ],
    'template'         => [
        'form_input' => [
            'class' => 'form-control col-md-6 col-xs-12'
        ],
        'form_label' => [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ],
        'form_label_edit' => [
            'class' => 'control-label col-md-4 col-sm-3 col-xs-12'
        ],

        'form_ckeditor' => [
            'class' => 'form-control col-md-6 col-xs-12 ckeditor'
        ],
        'status'       => [
            'all'      => ['name' => 'Tất cả', 'class' => 'btn-success'],
            'active'   => ['name' => 'Kích hoạt', 'class'      => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-info'],
            'block'    => ['name' => 'Bị khóa', 'class' => 'btn-danger'],
            'default'  => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        ],
        'contact'       => [
            'active'      =>  ['name' => 'Đã liên lạc', 'class' => 'btn-primary'],
            'inactive'        => ['name' => 'Chưa liên lạc', 'class' => 'btn-warning']
        ],
        'is_home'       => [
            'yes'      =>  ['name' => 'Hiển thị', 'class' => 'btn-primary'],
            'no'        => ['name' => 'Không hiển thị', 'class' => 'btn-warning']
        ],
        'display'       => [
            'list'      => ['name' => 'Danh sách'],
            'grid'      => ['name' => 'Lưới'],
        ],
        'type' => [
            'featured'   => ['name' => 'Nổi bật'],
            'normal'     => ['name' => 'Bình thường'],
        ],
        'rss_source' => [
            'vnexpress'   => ['name' => 'VNExpress'],
            'tuoitre'     => ['name' => 'Tuổi Trẻ'],
        ],
        'level'       => [
            'admin'      => ['name' => 'Quản trị hệ thống'],
            'member'     => ['name' => 'Người dùng bình thường'],
        ],
        'type_menu'   => [
            'link'                  => ['name' => 'Link'],
            'category_article'      => ['name' => 'Danh mục bài viết'],
        ],
        'type_open'       => [
            '_self'       => ['name' => 'Trang hiện tại'],
            '_blank'       => ['name' => 'Tab mới'],
        ],
        
        'search'       => [
            'all'           => ['name' => 'Search by All'],
            'id'            => ['name' => 'Search by ID'],
            'name'          => ['name' => 'Search by Name'],
            'username'      => ['name' => 'Search by Username'],
            'fullname'      => ['name' => 'Search by Fullname'],
            'email'         => ['name' => 'Search by Email'],
            'description'   => ['name' => 'Search by Description'],
            'link'          => ['name' => 'Search by Link'],
            'content'       => ['name' => 'Search by Content'],
        ],
        'button' => [
            'edit'      => ['class' => 'btn-success', 'title' => 'Edit', 'icon' => 'fa-pencil', 'route-name' => '/form'],
            'delete'    => ['class' => 'btn-danger btn-delete', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name' => '/delete'],
            'info'      => ['class' => 'btn-info', 'title' => 'View', 'icon' => 'fa-pencil', 'route-name' => '/delete'],
        ]

    ],
    'config' => [
        'search' => [
            'default'   => ['all', 'id', 'fullname'],
            'slider'    => ['all', 'id', 'name', 'description', 'link'],
            'category'  => ['all', 'name'],
            'article'   => ['all', 'name', 'content'],
            'rss'       => ['all', 'name', 'link'],
            'user'      => ['all', 'username', 'email', 'fullname'],
            'contact'   => ['all', 'username', 'email'],
            'menu'      => ['all', 'name'],
        ],
        'button' => [
            'default'   => ['edit', 'delete'],
            'slider'    => ['edit', 'delete'],
            'category'  => ['edit', 'delete'],
            'article'   => ['edit', 'delete'],
            'rss'       => ['edit', 'delete'],
            'user'      => ['edit', 'delete'],
            'contact'   => ['delete'],
            'menu'      => ['edit', 'delete'],
        ]
    ],
    'notify' => [
        'success' => [
            'update' => 'Cập nhật thành công!',
        ]
    ]
];

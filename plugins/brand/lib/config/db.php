<?php
return array(
    'shop_brand_brand' => array(
        'id' => array('int', 11, 'unsigned' => 1, 'null' => 0),
        'name' => array('varchar', 255),
        'url' => array('varchar', 255, 'null' => 0),
        'image' => array('varchar', 255),
        'description_short' => array('text'),
        'product_sort' => array('enum', "'MANUAL','NAME','PRICE_ASC','PRICE_DESC','RATING_ASC','RATING_DESC','TOTAL_SALES_ASC','TOTAL_SALES_DESC','COUNT','CREATE_DATETIME','STOCK_WORTH'", 'null' => 0, 'default' => 'MANUAL'),
        'filter' => array('text'),
        'is_shown' => array('tinyint', 3, 'unsigned' => 1, 'null' => 0, 'default' => '1'),
        'enable_client_sorting' => array('tinyint', 3, 'unsigned' => 1, 'null' => 0, 'default' => '1'),
        'empty_page_response_mode' => array('enum', "'DEFAULT','DEFAULT_200','DEFAULT_404','ERROR_404'", 'null' => 0, 'default' => 'DEFAULT'),
        'sort' => array('int', 10, 'unsigned' => 1, 'null' => 0, 'default' => '0'),
        ':keys' => array(
            'PRIMARY' => 'id',
            'url' => array('url', 'unique' => 1),
            'is_shown_sort' => array('is_shown', 'sort'),
        ),
    ),
    'shop_brand_brand_field' => array(
        'id' => array('int', 10, 'unsigned' => 1, 'null' => 0, 'autoincrement' => 1),
        'name' => array('varchar', 255),
        'sort' => array('int', 11, 'null' => 0),
        ':keys' => array(
            'PRIMARY' => 'id',
        ),
    ),
    'shop_brand_brand_field_value' => array(
        'brand_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'field_id' => array('varchar', 64, 'null' => 0),
        'value' => array('text', 'null' => 0),
        ':keys' => array(
            'PRIMARY' => array('brand_id', 'field_id'),
        ),
    ),
    'shop_brand_brand_page' => array(
        'id' => array('int', 10, 'unsigned' => 1, 'null' => 0, 'autoincrement' => 1),
        'page_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'brand_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'meta_title' => array('text', 'null' => 0),
        'meta_description' => array('text', 'null' => 0),
        'meta_keywords' => array('text', 'null' => 0),
        'h1' => array('text', 'null' => 0),
        'description' => array('text', 'null' => 0),
        'additional_description' => array('text', 'null' => 0),
        'content' => array('text', 'null' => 0),
        'create_datetime' => array('datetime', 'null' => 0),
        'update_datetime' => array('datetime', 'null' => 0),
        'create_contact_id' => array('int', 11, 'unsigned' => 1, 'null' => 0),
        ':keys' => array(
            'PRIMARY' => 'id',
            'page_id_brand_id' => array('page_id', 'brand_id', 'unique' => 1),
        ),
    ),
    'shop_brand_brand_param' => array(
        'brand_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'name' => array('varchar', 64, 'null' => 0),
        'value' => array('text', 'null' => 0),
        ':keys' => array(
            'PRIMARY' => array('brand_id', 'name'),
        ),
    ),
    'shop_brand_brand_review' => array(
        'id' => array('int', 10, 'unsigned' => 1, 'null' => 0, 'autoincrement' => 1),
        'left_key' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'right_key' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'depth' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'parent_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'brand_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'datetime' => array('datetime', 'null' => 0),
        'status' => array('enum', "'PUBLISHED','MODERATION','DELETED'", 'null' => 0, 'default' => 'PUBLISHED'),
        'title' => array('varchar', 255, 'null' => 0),
        'pros' => array('text', 'null' => 0),
        'cons' => array('text', 'null' => 0),
        'content' => array('text', 'null' => 0),
        'rate' => array('tinyint', 3, 'unsigned' => 1),
        'contact_id' => array('int', 10, 'unsigned' => 1),
        'contact_name' => array('varchar', 255, 'null' => 0),
        'contact_email' => array('varchar', 255, 'null' => 0),
        'contact_phone' => array('varchar', 50, 'null' => 0),
        'auth_type' => array('enum', "'AUTH','GUEST'", 'null' => 0),
        'ip' => array('int', 11, 'null' => 0),
        ':keys' => array(
            'PRIMARY' => 'id',
            'ns_keys' => array('left_key', 'right_key'),
            'status' => 'status',
            'parent_id' => 'parent_id',
            'brand_id' => 'brand_id',
            'contact_id' => 'contact_id',
        ),
    ),
    'shop_brand_brand_review_param' => array(
        'review_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'name' => array('varchar', 64, 'null' => 0),
        'value' => array('text'),
        ':keys' => array(
            'PRIMARY' => array('review_id', 'name'),
        ),
    ),
    'shop_brand_page' => array(
        'id' => array('int', 10, 'unsigned' => 1, 'null' => 0, 'autoincrement' => 1),
        'name' => array('varchar', 255, 'null' => 0),
        'url' => array('varchar', 255, 'null' => 0),
        'meta_title' => array('text', 'null' => 0),
        'meta_description' => array('text', 'null' => 0),
        'meta_keywords' => array('text', 'null' => 0),
        'h1' => array('text', 'null' => 0),
        'description' => array('text', 'null' => 0),
        'additional_description' => array('text', 'null' => 0),
        'template' => array('text', 'null' => 0),
        'create_datetime' => array('datetime', 'null' => 0),
        'update_datetime' => array('datetime', 'null' => 0),
        'create_contact_id' => array('int', 11, 'unsigned' => 1, 'null' => 0),
        'status' => array('enum', "'PUBLISHED','DRAFT'", 'null' => 0, 'default' => 'PUBLISHED'),
        'type' => array('enum', "'PAGE','CATALOG','REVIEWS'", 'null' => 0, 'default' => 'PAGE'),
        'sort' => array('int', 10, 'unsigned' => 1, 'null' => 0, 'default' => '0'),
        ':keys' => array(
            'PRIMARY' => 'id',
        ),
    ),
    'shop_brand_settings' => array(
        'storefront' => array('varchar', 255, 'null' => 0),
        'name' => array('varchar', 64, 'null' => 0),
        'setting' => array('text'),
        ':keys' => array(
            'PRIMARY' => array('storefront', 'name'),
        ),
    ),
    'shop_brand_storefront_template_layout' => array(
        'storefront' => array('varchar', 255, 'null' => 0),
        'page_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'brand_id' => array('int', 10, 'unsigned' => 1, 'null' => 0),
        'meta_title' => array('text', 'null' => 0),
        'meta_description' => array('text', 'null' => 0),
        'meta_keywords' => array('text', 'null' => 0),
        'h1' => array('text', 'null' => 0),
        'description' => array('text', 'null' => 0),
        'additional_description' => array('text', 'null' => 0),
        'content' => array('text', 'null' => 0),
        ':keys' => array(
            'PRIMARY' => array('storefront', 'page_id', 'brand_id'),
        ),
    ),
);

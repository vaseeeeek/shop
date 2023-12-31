<?php
return array(
    'shop_productsets' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'name' => array('varchar', 255, 'null' => 0),
        'status' => array('int', 1, 'null' => 0, 'default' => '1'),
        'html_before' => array('text'),
        'html_after' => array('text'),
        'title' => array('varchar', 255, 'null' => 0, 'default' => ''),
        'ruble_sign' => array('varchar', 4, 'null' => 0, 'default' => ''),
        'sort' => array('int', 11, 'null' => 0, 'default' => '0'),
        'description' => array('text'),
        ':keys' => array(
            'PRIMARY' => 'id',
        ),
    ),
    'shop_productsets_bundle' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'productsets_id' => array('int', 11),
        'sort_id' => array('int', 11, 'default' => '0'),
        'settings' => array('text'),
        ':keys' => array(
            'PRIMARY' => 'id',
            'productsets_id' => 'productsets_id',
        ),
    ),
    'shop_productsets_bundle_item' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'type' => array('varchar', 15, 'default' => 'product'),
        'bundle_id' => array('int', 11),
        'product_id' => array('int', 11, 'default' => '0'),
        'sku_id' => array('int', 11, 'default' => '0'),
        'parent_id' => array('int', 11, 'default' => '0'),
        'sort_id' => array('int', 11, 'default' => '0'),
        'settings' => array('text'),
        ':keys' => array(
            'PRIMARY' => 'id',
            'bundle_id' => 'bundle_id',
        ),
    ),
    'shop_productsets_cart' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'productsets_id' => array('int', 11, 'null' => 0, 'default' => '0'),
        'bundle_id' => array('int', 11, 'default' => '0'),
        'code' => array('varchar', 32, 'null' => 0),
        'include_product' => array('tinyint', 1),
        ':keys' => array(
            'PRIMARY' => 'id',
            'code' => 'code',
        ),
    ),
    'shop_productsets_cart_items' => array(
        'cart_id' => array('int', 11, 'null' => 0),
        'sku_id' => array('int', 11, 'null' => 0),
        'product_id' => array('int', 11, 'null' => 0),
        'bundle_item_id' => array('varchar', 50, 'null' => 0),
        'quantity' => array('int', 11),
        'is_active' => array('tinyint', 1, 'default' => '0'),
        'sort' => array('int', 11, 'default' => '0'),
        ':keys' => array(
            'PRIMARY' => array('cart_id', 'sku_id', 'product_id', 'bundle_item_id'),
            'cart_id' => 'cart_id',
        ),
    ),
    'shop_productsets_params' => array(
        'productsets_id' => array('int', 11, 'null' => 0),
        'param' => array('varchar', 255, 'null' => 0),
        'value' => array('text'),
        ':keys' => array(
            'PRIMARY' => array('productsets_id', 'param'),
            'productsets_id' => 'productsets_id',
        ),
    ),
    'shop_productsets_settings' => array(
        'productsets_id' => array('int', 11, 'null' => 0, 'default' => '0'),
        'field' => array('varchar', 50, 'null' => 0),
        'ext' => array('varchar', 50, 'null' => 0),
        'value' => array('text'),
        ':keys' => array(
            'PRIMARY' => array('productsets_id', 'field', 'ext'),
            'field' => 'field',
            'productsets_id' => 'productsets_id',
            'ext' => 'ext',
        ),
    ),
    'shop_productsets_storefront' => array(
        'productsets_id' => array('int', 11, 'null' => 0),
        'operator' => array('varchar', 3, 'null' => 0),
        'storefront' => array('varchar', 255, 'null' => 0),
        ':keys' => array(
            'PRIMARY' => array('productsets_id', 'operator', 'storefront'),
            'productsets_id' => 'productsets_id',
            'storefront' => 'storefront',
        ),
    ),
    'shop_productsets_userbundle' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'productsets_id' => array('int', 11),
        'settings' => array('text'),
        ':keys' => array(
            'PRIMARY' => 'id',
            'productsets_id' => array('productsets_id', 'unique' => 1),
        ),
    ),
    'shop_productsets_userbundle_group' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'userbundle_id' => array('int', 11),
        'sort_id' => array('int', 11, 'default' => '0'),
        'settings' => array('text'),
        ':keys' => array(
            'PRIMARY' => 'id',
            'userbundle_id' => 'userbundle_id',
        ),
    ),
    'shop_productsets_userbundle_group_item' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'group_id' => array('int', 11),
        'product_id' => array('int', 11, 'default' => '0'),
        'sku_id' => array('int', 11, 'default' => '0'),
        'type' => array('varchar', 15, 'default' => 'product'),
        'sort_id' => array('int', 11, 'default' => '0'),
        'settings' => array('text'),
        ':keys' => array(
            'PRIMARY' => 'id',
            'group_id' => 'group_id',
            'type' => 'type',
        ),
    ),
    'shop_productsets_userbundle_item' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'bundle_id' => array('int', 11),
        'product_id' => array('int', 11, 'default' => '0'),
        'sku_id' => array('int', 11, 'default' => '0'),
        'type' => array('varchar', 15, 'default' => 'product'),
        'sort_id' => array('int', 11, 'default' => '0'),
        'settings' => array('text'),
        ':keys' => array(
            'PRIMARY' => 'id',
            'userbundle_id' => 'bundle_id',
        ),
    ),
);

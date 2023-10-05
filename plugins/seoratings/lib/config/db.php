<?php

return [
  'shop_seoratings_rating' => [
    'id' => ['int unsigned', 'null' => 0, 'autoincrement' => 1],
    'title' => ['varchar', 255],
    'url' => ['varchar', 255, 'null' => 0],
    'description' => ['text'],
    'published' => ['tinyint', 1, 'default' => 1],
    'price' => ['tinyint', 1],
    'price_old' => ['tinyint', 1],
    'features' => ['tinyint', 1],
    'compare' => ['tinyint', 1],
    'favorites' => ['tinyint', 1],
    'rating' => ['tinyint', 1],
    'summary' => ['tinyint', 1],
    'photo' => ['tinyint', 1],
    'brand' => ['tinyint', 1],
    'category' => ['tinyint', 1],
    'stock' => ['tinyint', 1],
    'code' => ['tinyint', 1],
    'skus' => ['tinyint', 1],
    'advantages' => ['tinyint', 1],
    'primary_color' => ['varchar', 255],
    'advantages_fold' => ['tinyint', 1],
    'description_length' => ['int'],
    'primary_text_color' => ['varchar', 255],
    'price_color' => ['varchar', 255],
    'img_size' => ['varchar', 255],
    'heading_skus' => ['varchar', 255],
    'brand_feature_name' => ['varchar', 255],
    'feature_codes' => ['text'],
    'feature_titles' => ['text'],
    'pros_feature_name' => ['varchar', 255],
    'tags' => ['tinyint', 1],
    'template_id' => ['varchar', 255],
    'cons_feature_name' => ['varchar', 255],
    'meta_title' => ['text'],
    'meta_description' => ['text'],
    'meta_keywords' => ['text'],
    'short_description' => ['text'],
    'reverse' => ['tinyint', 1],
    'has_sidebar' => ['tinyint', 1],
    'squeeze_features' => ['tinyint', 1],
    'filter' => ['tinyint', 1],
    'filter_codes' => ['text'],
    'related_ratings' => ['text'],
    'list_description' => ['text'],
    'type' => ['enum', "'product','set','entity'", 'null' => 0, 'default' => 'product'],
    'set_id' => ['varchar', 255],
    'primary_rating' => ['tinyint', 1],
    'sibling_positions' => ['tinyint', 1],
    'base_rating' => ['int unsigned'],
    'position_shift' => ['tinyint', 1],
    'created_at' => ['date'],
    'updated_at' => ['date'],
    'shop_categories' => ['text'],
    'image' => ['text'],
    'image_thumb' => ['text'],
    ':keys' => [
      'PRIMARY' => 'id',
      'PK' => ['id', 'unique' => 1],
      'fk_base_rating_id' => 'base_rating',
    ],
  ],
  'shop_seoratings_rating_products' => [
    'id' => ['int unsigned', 'null' => 0, 'autoincrement' => 1],
    'rating_id' => ['int unsigned', 'null' => 0],
    'product_id' => ['varchar', 64, 'null' => 0],
    'sort' => ['int', 'null' => 0],
    ':keys' => [
      'PRIMARY' => 'id',
      'id' => ['id', 'unique' => 1],
    ],
  ],
  'shop_seoratings_templates' => [
    'id' => ['int unsigned', 'null' => 0, 'autoincrement' => 1],
    'name' => ['varchar', 255],
    'html' => ['text'],
    'css' => ['text'],
    'default_styles' => ['tinyint', 1, 'null' => 0, 'default' => '0'],
    'developer' => ['tinyint', 1],
    ':keys' => [
      'PRIMARY' => 'id',
      'id' => ['id', 'unique' => 1],
    ],
  ],
];
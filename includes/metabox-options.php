<?php

function gwpg_generate_metabox() {

	$metabox = new GWPG_Metabox_Framework;
	$options      = []; // remove old options

	$options[]    = array(
	'name'          => 'settings',
	'title'         => __( 'Settings', 'global-woo-gallery' ),
	'section_title' => 'Product Settings',
		'fields'			=> [
			[
				'id'		=> 'gwpg_products_from',
				'name'		=> __( 'Products From', 'global-woo-gallery' ),
				'type'		=> 'select',
				'desc'		=> __( 'Select an option to show the product from.', 'global-woo-gallery' ),
				'options'	=> [
					'latest'        => __( 'Latest', 'global-woo-gallery' ),
					'onsale'        => __( 'Onsale', 'global-woo-gallery' ),
					'featured'      => __( 'Featured', 'global-woo-gallery' ),
					'from_category' => __( 'From Category', 'global-woo-gallery' ),
					'from_tag'      => __( 'From Tags', 'global-woo-gallery' )
				]
			],
			[
				'id'		=> 'gwpg_product_from_category',
				'name'		=> __( 'Product Categories', 'global-woo-gallery' ),
				'type'		=> 'select',
				'desc'		=> __( 'Select category for products.', 'global-woo-gallery' ),
				'options'	=> GWPG_Helper::gwpg_get_wc_categories(),
				'multiple'	=> true,
				'dependency' => ['gwpg_products_from', '==', 'from_category' ]
			],
			[
				'id'		=> 'gwpg_product_from_tag',
				'name'		=> __( 'Product Tags', 'global-woo-gallery' ),
				'type'		=> 'select',
				'desc'		=> __( 'Select tags for products.', 'global-woo-gallery' ),
				'options'	=> GWPG_Helper::get_all_tags(),
				'multiple'	=> true,
				'dependency' => ['gwpg_products_from', '==', 'from_tag' ]
			],
			[
				'id'         => 'gwpg_total_products',
				'name'       => __( 'Total Products', 'global-woo-gallery' ),
				'type'       => 'number',
				'desc'       => __( 'Number of Total products to show.', 'global-woo-gallery' ),
				'default'    => '10'
			],
			[
				'id'      => 'gwpg_products_orderby',
				'name'    => __( 'Orderby', 'global-woo-gallery' ),
				'type'    => 'select',
				'options' => [
					'id'       => __( 'ID', 'global-woo-gallery' ),
					'date'     => __( 'Date', 'global-woo-gallery' ),
					'title'    => __( 'Title', 'global-woo-gallery' ),
					'price'    => __( 'Price', 'global-woo-gallery' ),
					'rand'     => __( 'Random', 'global-woo-gallery' ),
					'sales'    => __( 'Sales', 'global-woo-gallery' ),
					'modified' => __( 'Modified', 'global-woo-gallery' ),
				],
				'desc'    => __( 'Select an order by option.', 'global-woo-gallery' ),
				'default' => 'date'
			],
			[
				'id'    => 'gwpg_products_order',
				'name'  => __( 'Order', 'global-woo-gallery' ),
				'type'  => 'select',
				'options' => [
					'asc'       => __( 'Ascending', 'global-woo-gallery' ),
					'dsc'     => __( 'Decending', 'global-woo-gallery' ),
				],
				'desc'  => __( 'Select an order option.', 'global-woo-gallery' ),
				'value' => 'dsc'
			]
		]
	);

	$options[]    = array(
		'name'          => 'gallery',
		'title'         => 'Gallery',
		'section_title' => 'Gallery Settings',
		'fields'        => [
			[
				'id'      => 'gwpg_product_theme',
				'name'   => __( 'Select Theme', 'global-woo-gallery' ),
				'type'    => 'select',
				'desc'    => __( 'Select which theme you want to display.', 'global-woo-gallery' ),
				'options' => [
					'premium_light' => __( 'Premium Light', 'global-woo-gallery' ),
					'advance_card'  => __( 'Advance Card', 'global-woo-gallery' )
				],
				'default' => 'premium_light'
			],
			[
				'id'      => 'gwpg_products_template',
				'name'    => __( 'Choose Template', 'global-woo-gallery' ),
				'type'    => 'select',
				'desc'    => __( 'Select which template you want to display.', 'global-woo-gallery' ),
				'options' => [
					'grid'    => __( 'Grid', 'global-woo-gallery' ),
					'list'    => __( 'List', 'global-woo-gallery' ),
					'masonry' => __( 'Masonry', 'global-woo-gallery' )
				],
				'default' => 'grid'
			],
			[
				'id'    => 'gwpg_products_column',
				'name'  => __( 'Number Of Column', 'global-woo-gallery' ),
				'type' => 'number',
				'atts' => [
					'min'	=> 1,
					'step'	=> 1,
					'max'	=> 6
				],
				'desc'    => __( 'Set number of column on desktop for the screen smaller than 1100px.', 'global-woo-gallery' ),
				'default' => '3'
			],
			[
				'id'    => 'gwpg_products_column_on_tablet',
				'name'  => __( 'Number Of Column On Tablet', 'global-woo-gallery' ),
				'type'  => 'number',
				'desc'  => __( 'Set number of column on tablet for the screen smaller than 990px.', 'global-woo-gallery' ),
				'default' => '2'
			],
			[
				'id'    => 'gwpg_products_column_on_mobile',
				'name'  => __( 'Number Of Column On Mobile', 'global-woo-gallery' ),
				'type'  => 'number',
				'desc'  => __( 'Set number of column on mobile for the screen smaller than 650px.', 'global-woo-gallery' ),
				'default' => '1'
			],
		]
	);

	$options[]    = array(
		'name'          => 'style',
		'title'         => 'Style',
		'section_title' => 'Gallery Stylizations',
		'fields'        => [
			
		]
	);

	$options[]    = array(
		'name'          => 'typography',
		'title'         => 'Typography',
		'section_title' => 'Gallery Typography',
		'fields'    => array(
			array(
				'id'    => 'typography_first_option',
				'type'  => 'text',
				'name' => 'First Option',
			),
			array(
				'id'   => 'typography_second_option',
				'type' => 'text',
				'name' => 'Secondary Option',
				'dependency'	=> [ 'typography_first_option', '!=', '' ]
			),
		)
	);

	$options[]    = array(
		'name'      => 'gopro',
		'title'     => 'GoPro',
		'fields'    => array(
			array(
				'id'   => 'gopro_first_option',
				'type' => 'text',
				'name' => 'First Option',
			),
			array(
				'id'    => 'gopro_second_option',
				'type'  => 'textarea',
				'name'  => 'Secondary Option',
				'value' => 'Default Value'
			),
		)
	);
	$metabox->init($options);
}
add_action( 'admin_init', 'gwpg_generate_metabox' );
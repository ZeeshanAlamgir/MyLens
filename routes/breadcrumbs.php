<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
//     $trail->push(__('lang.leftbar.dashboard'), route('dashboard'));
// });

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Roles Breadcrumbs
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('lang.roles.role_plural'), route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push(__('lang.commons.create') . ' ' . __('lang.roles.role_singular'), route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push(__('lang.commons.edit') . ' ' . __('lang.roles.role_singular'));
});

// Permisisons Breadcrumbs
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('lang.permissions.permission_plural'), route('permissions.index'));
});

Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push(__('lang.permissions.create_permission'), route('permissions.create'));
});

Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push(__('lang.permissions.edit_permission'));
});

// Sites Breadcrumbs
Breadcrumbs::for('sites.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Sites', route('sites.index'));
});

Breadcrumbs::for('sites.create', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.index');
    $trail->push('Create Sites', route('sites.create'));
});

Breadcrumbs::for('sites.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.index');
    $trail->push('Edit Site');
});

//Become Seller
Breadcrumbs::for('become-seller.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Become Seller', route('become-seller.create'));
});

//Types Breadcrumbs
Breadcrumbs::for('types.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Types', route('types.index'));
});

Breadcrumbs::for('types.create', function (BreadcrumbTrail $trail) {
    $trail->parent('types.index');
    $trail->push('Create Type');
});

Breadcrumbs::for('types.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('types.index');
    $trail->push('Edit Type');
});

//Additional Costs Breadcrumbs
Breadcrumbs::for('sites.additional-costs.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Additional Costs', route('sites.additional-costs.index', ['site_id' => encryptParams(1)]));
});

Breadcrumbs::for('sites.additional-costs.create', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.additional-costs.index', ['site_id' => encryptParams(1)]);
    $trail->push('Create Additional Cost');
});

Breadcrumbs::for('sites.additional-costs.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.additional-costs.index', ['site_id' => encryptParams(1)]);
    $trail->push('Edit Additional Cost');
});

//Floor Breadcrumbs
Breadcrumbs::for('sites.floors.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Floors', route('sites.floors.index', ['site_id' => encryptParams(1)]));
});

Breadcrumbs::for('sites.floors.create', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.floors.index', ['site_id' => encryptParams(1)]);
    $trail->push('Create Floor');
});

Breadcrumbs::for('sites.floors.copy', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.floors.index', ['site_id' => encryptParams(1)]);
    $trail->push('Copy Floor');
});

Breadcrumbs::for('sites.floors.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.floors.index', ['site_id' => encryptParams(1)]);
    $trail->push('Edit Floor');
});

Breadcrumbs::for('sites.floors.preview', function (BreadcrumbTrail $trail) {
    $trail->parent('sites.floors.index', ['site_id' => encryptParams(1)]);
    $trail->push('Floors Preview');
});

//Units Breadcrumbs
Breadcrumbs::for('sites.floors.units.index', function (BreadcrumbTrail $trail, $site_id, $floor_id) {
    $trail->parent('sites.floors.index');
    $trail->push('Units', route('sites.floors.units.index', ['site_id' => $site_id, 'floor_id' => $floor_id]));
});

Breadcrumbs::for('sites.floors.units.preview', function (BreadcrumbTrail $trail, $site_id, $floor_id) {
    $trail->parent('sites.floors.index');
    $trail->push('Units Preview', route('sites.floors.units.preview', ['site_id' => $site_id, 'floor_id' => $floor_id]));
});

Breadcrumbs::for('sites.floors.units.create', function (BreadcrumbTrail $trail, $site_id, $floor_id) {
    $trail->parent('sites.floors.units.index', $site_id, $floor_id);
    $trail->push('Create Unit');
});

Breadcrumbs::for('sites.floors.units.edit', function (BreadcrumbTrail $trail, $site_id, $floor_id) {
    $trail->parent('sites.floors.units.index', $site_id, $floor_id);
    $trail->push('Edit Unit');
});

//Banner
Breadcrumbs::for('banner.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Banner', route('banner.index'));
});

Breadcrumbs::for('banner.create', function (BreadcrumbTrail $trail) {
    $trail->parent('banner.index');
    $trail->push('Add Banner Image', route('banner.create'));
});

Breadcrumbs::for('banner.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('banner.index');
    $trail->push('Update Banner Image', route('banner.edit', $id));
});


//Color
Breadcrumbs::for('color.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Colors', route('color.index'));
});

Breadcrumbs::for('color.create', function (BreadcrumbTrail $trail) {
    $trail->parent('color.index');
    $trail->push('Add Color', route('color.create'));
});

Breadcrumbs::for('color.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('color.index');
    $trail->push('Update Color', route('color.edit', $id));
});


//Collection
Breadcrumbs::for('collection.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Collections', route('collection.index'));
});

Breadcrumbs::for('collection.create', function (BreadcrumbTrail $trail) {
    $trail->parent('collection.index');
    $trail->push('Add Collection', route('collection.create'));
});

Breadcrumbs::for('collection.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('collection.index');
    $trail->push('Update Collection', route('collection.edit', $id));
});

//Replacement Cycle
Breadcrumbs::for('replacement-cylce.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Replacement Cycle', route('replacement-cylce.index'));
});

Breadcrumbs::for('replacement-cylce.create', function (BreadcrumbTrail $trail) {
    $trail->parent('replacement-cylce.index');
    $trail->push('Add Replacement Cycle', route('replacement-cylce.create'));
});

Breadcrumbs::for('replacement-cylce.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('replacement-cylce.index');
    $trail->push('Update Replacement Cycle', route('replacement-cylce.edit', $id));
});

//Tone
Breadcrumbs::for('tone.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tones', route('tone.index'));
});

Breadcrumbs::for('tone.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tone.index');
    $trail->push('Add Tone', route('tone.create'));
});

Breadcrumbs::for('tone.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('tone.index');
    $trail->push('Update Tone', route('tone.edit', $id));
});

//Styles
Breadcrumbs::for('style.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Styles', route('style.index'));
});

Breadcrumbs::for('style.create', function (BreadcrumbTrail $trail) {
    $trail->parent('style.index');
    $trail->push('Add Style', route('style.create'));
});

Breadcrumbs::for('style.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('style.index');
    $trail->push('Update Style', route('style.edit', $id));
});


//Types
Breadcrumbs::for('type.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Types', route('type.index'));
});

Breadcrumbs::for('type.create', function (BreadcrumbTrail $trail) {
    $trail->parent('type.index');
    $trail->push('Add Type', route('type.create'));
});

Breadcrumbs::for('type.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('type.index');
    $trail->push('Update Type', route('type.edit', $id));
});

//Product
Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Products', route('product.index'));
});

Breadcrumbs::for('product.create', function (BreadcrumbTrail $trail) {
    $trail->parent('product.index');
    $trail->push('Add Product', route('product.create'));
});

Breadcrumbs::for('product.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('product.index');
    $trail->push('Update Product', route('product.create', $id));
});
//Distributor
Breadcrumbs::for('distributor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Distributors', route('distributor.index'));
});

Breadcrumbs::for('distributor.create', function (BreadcrumbTrail $trail) {
    $trail->parent('distributor.index');
    $trail->push('Add Distributor', route('distributor.create'));
});

Breadcrumbs::for('distributor.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('distributor.index');
    $trail->push('Update Distributor', route('distributor.edit', $id));
});

//Store City
Breadcrumbs::for('city.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Cities', route('city.index'));
});

Breadcrumbs::for('city.create', function (BreadcrumbTrail $trail) {
    $trail->parent('city.index');
    $trail->push('Add City', route('city.create'));
});

Breadcrumbs::for('city.edit', function (BreadcrumbTrail $trail,$id) {
    $trail->parent('city.index');
    $trail->push('Update City', route('city.edit', $id));
});

//Store
Breadcrumbs::for('store.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Store', route('store.index'));
});

Breadcrumbs::for('store.create', function (BreadcrumbTrail $trail) {
    $trail->parent('store.index');
    $trail->push('Add Store', route('store.create'));
});

Breadcrumbs::for('store.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('store.index');
    $trail->push('Update Store', route('store.edit', $id));
});

//Actor Product
Breadcrumbs::for('actor-product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Actor Products', route('actor-product.index'));
});

Breadcrumbs::for('actor-product.create', function (BreadcrumbTrail $trail) {
    $trail->parent('actor-product.index');
    $trail->push('Add Actor Product', route('actor-product.create'));
});

Breadcrumbs::for('actor-product.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('actor-product.index');
    $trail->push('Update Actor Product', route('actor-product.edit', $id));
});

//Certifications
Breadcrumbs::for('certificate.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Certifications', route('certificate.index'));
});

Breadcrumbs::for('certificate.create', function (BreadcrumbTrail $trail) {
    $trail->parent('certificate.index');
    $trail->push('Add New Certificate', route('certificate.create'));
});

Breadcrumbs::for('certificate.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('certificate.index');
    $trail->push('Update New Certificate', route('certificate.edit', $id));
});


//Contact Us
Breadcrumbs::for('contact-us.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Contact Us', route('contact-us.index'));
});

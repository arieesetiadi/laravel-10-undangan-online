<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('cms.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('cms.dashboard'));
});

// Dashboard > Admin
Breadcrumbs::for('cms.administrators.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.dashboard');
    $trail->push('Admin', route('cms.administrators.index'));
});

// Dashboard > Admin > [Action]
Breadcrumbs::for('cms.administrators.action', function (BreadcrumbTrail $trail, $action) {
    $trail->parent('cms.administrators.index');
    $trail->push($action);
});

// Dashboard > Pelanggan
Breadcrumbs::for('cms.customers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.dashboard');
    $trail->push('Pelanggan', route('cms.customers.index'));
});

// Dashboard > Pelanggan > [Action]
Breadcrumbs::for('cms.customers.action', function (BreadcrumbTrail $trail, $action) {
    $trail->parent('cms.customers.index');
    $trail->push($action);
});

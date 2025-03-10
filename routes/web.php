<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // General Assumption
    Route::delete('general-assumptions/destroy', 'GeneralAssumptionController@massDestroy')->name('general-assumptions.massDestroy');
    Route::post('general-assumptions/parse-csv-import', 'GeneralAssumptionController@parseCsvImport')->name('general-assumptions.parseCsvImport');
    Route::post('general-assumptions/process-csv-import', 'GeneralAssumptionController@processCsvImport')->name('general-assumptions.processCsvImport');
    Route::resource('general-assumptions', 'GeneralAssumptionController');

    // Yield Curve
    Route::delete('yield-curves/destroy', 'YieldCurveController@massDestroy')->name('yield-curves.massDestroy');
    Route::post('yield-curves/media', 'YieldCurveController@storeMedia')->name('yield-curves.storeMedia');
    Route::post('yield-curves/ckmedia', 'YieldCurveController@storeCKEditorImages')->name('yield-curves.storeCKEditorImages');
    Route::resource('yield-curves', 'YieldCurveController');

    // Yield Curve Detail
    Route::delete('yield-curve-details/destroy', 'YieldCurveDetailController@massDestroy')->name('yield-curve-details.massDestroy');
    Route::post('yield-curve-details/parse-csv-import', 'YieldCurveDetailController@parseCsvImport')->name('yield-curve-details.parseCsvImport');
    Route::post('yield-curve-details/process-csv-import', 'YieldCurveDetailController@processCsvImport')->name('yield-curve-details.processCsvImport');
    Route::resource('yield-curve-details', 'YieldCurveDetailController');

    // Biaya
    Route::delete('biayas/destroy', 'BiayaController@massDestroy')->name('biayas.massDestroy');
    Route::post('biayas/media', 'BiayaController@storeMedia')->name('biayas.storeMedia');
    Route::post('biayas/ckmedia', 'BiayaController@storeCKEditorImages')->name('biayas.storeCKEditorImages');
    Route::resource('biayas', 'BiayaController');

    // Biaya Detail
    Route::delete('biaya-details/destroy', 'BiayaDetailController@massDestroy')->name('biaya-details.massDestroy');
    Route::post('biaya-details/parse-csv-import', 'BiayaDetailController@parseCsvImport')->name('biaya-details.parseCsvImport');
    Route::post('biaya-details/process-csv-import', 'BiayaDetailController@processCsvImport')->name('biaya-details.processCsvImport');
    Route::resource('biaya-details', 'BiayaDetailController');

    // Price Historical
    Route::delete('price-historicals/destroy', 'PriceHistoricalController@massDestroy')->name('price-historicals.massDestroy');
    Route::post('price-historicals/parse-csv-import', 'PriceHistoricalController@parseCsvImport')->name('price-historicals.parseCsvImport');
    Route::post('price-historicals/process-csv-import', 'PriceHistoricalController@processCsvImport')->name('price-historicals.processCsvImport');
    Route::resource('price-historicals', 'PriceHistoricalController');

    // Asset Adjustment
    Route::delete('asset-adjustments/destroy', 'AssetAdjustmentController@massDestroy')->name('asset-adjustments.massDestroy');
    Route::post('asset-adjustments/parse-csv-import', 'AssetAdjustmentController@parseCsvImport')->name('asset-adjustments.parseCsvImport');
    Route::post('asset-adjustments/process-csv-import', 'AssetAdjustmentController@processCsvImport')->name('asset-adjustments.processCsvImport');
    Route::resource('asset-adjustments', 'AssetAdjustmentController');

    // Asset Migration
    Route::delete('asset-migrations/destroy', 'AssetMigrationController@massDestroy')->name('asset-migrations.massDestroy');
    Route::resource('asset-migrations', 'AssetMigrationController');

    // Bop
    Route::delete('bops/destroy', 'BopController@massDestroy')->name('bops.massDestroy');
    Route::post('bops/media', 'BopController@storeMedia')->name('bops.storeMedia');
    Route::post('bops/ckmedia', 'BopController@storeCKEditorImages')->name('bops.storeCKEditorImages');
    Route::resource('bops', 'BopController');

    // Bop Detail
    Route::delete('bop-details/destroy', 'BopDetailController@massDestroy')->name('bop-details.massDestroy');
    Route::post('bop-details/parse-csv-import', 'BopDetailController@parseCsvImport')->name('bop-details.parseCsvImport');
    Route::post('bop-details/process-csv-import', 'BopDetailController@processCsvImport')->name('bop-details.processCsvImport');
    Route::resource('bop-details', 'BopDetailController');

    // Obligasi
    Route::delete('obligasis/destroy', 'ObligasiController@massDestroy')->name('obligasis.massDestroy');
    Route::resource('obligasis', 'ObligasiController');

    // Saham
    Route::delete('sahams/destroy', 'SahamController@massDestroy')->name('sahams.massDestroy');
    Route::resource('sahams', 'SahamController');

    // Deposito
    Route::delete('depositos/destroy', 'DepositoController@massDestroy')->name('depositos.massDestroy');
    Route::resource('depositos', 'DepositoController');

    // Reksadana
    Route::delete('reksadanas/destroy', 'ReksadanaController@massDestroy')->name('reksadanas.massDestroy');
    Route::resource('reksadanas', 'ReksadanaController');

    // Rdpt
    Route::delete('rdpts/destroy', 'RdptController@massDestroy')->name('rdpts.massDestroy');
    Route::resource('rdpts', 'RdptController');

    // Investasi Langsung
    Route::delete('investasi-langsungs/destroy', 'InvestasiLangsungController@massDestroy')->name('investasi-langsungs.massDestroy');
    Route::resource('investasi-langsungs', 'InvestasiLangsungController');

    // Liability Portofolio
    Route::delete('liability-portofolios/destroy', 'LiabilityPortofolioController@massDestroy')->name('liability-portofolios.massDestroy');
    Route::post('liability-portofolios/parse-csv-import', 'LiabilityPortofolioController@parseCsvImport')->name('liability-portofolios.parseCsvImport');
    Route::post('liability-portofolios/process-csv-import', 'LiabilityPortofolioController@processCsvImport')->name('liability-portofolios.processCsvImport');
    Route::resource('liability-portofolios', 'LiabilityPortofolioController');

    // Liability Jkk
    Route::delete('liability-jkks/destroy', 'LiabilityJkkController@massDestroy')->name('liability-jkks.massDestroy');
    Route::resource('liability-jkks', 'LiabilityJkkController');

    // Liability Jkm
    Route::delete('liability-jkms/destroy', 'LiabilityJkmController@massDestroy')->name('liability-jkms.massDestroy');
    Route::resource('liability-jkms', 'LiabilityJkmController');

    // Liability Pensiun
    Route::delete('liability-pensiuns/destroy', 'LiabilityPensiunController@massDestroy')->name('liability-pensiuns.massDestroy');
    Route::resource('liability-pensiuns', 'LiabilityPensiunController');

    // Liability Tht
    Route::delete('liability-thts/destroy', 'LiabilityThtController@massDestroy')->name('liability-thts.massDestroy');
    Route::post('liability-thts/parse-csv-import', 'LiabilityThtController@parseCsvImport')->name('liability-thts.parseCsvImport');
    Route::post('liability-thts/process-csv-import', 'LiabilityThtController@processCsvImport')->name('liability-thts.processCsvImport');
    Route::resource('liability-thts', 'LiabilityThtController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Data Sap
    Route::delete('data-saps/destroy', 'DataSapController@massDestroy')->name('data-saps.massDestroy');
    Route::post('data-saps/media', 'DataSapController@storeMedia')->name('data-saps.storeMedia');
    Route::post('data-saps/ckmedia', 'DataSapController@storeCKEditorImages')->name('data-saps.storeCKEditorImages');
    Route::resource('data-saps', 'DataSapController');

    // Data Sap Detail
    Route::delete('data-sap-details/destroy', 'DataSapDetailController@massDestroy')->name('data-sap-details.massDestroy');
    Route::post('data-sap-details/parse-csv-import', 'DataSapDetailController@parseCsvImport')->name('data-sap-details.parseCsvImport');
    Route::post('data-sap-details/process-csv-import', 'DataSapDetailController@processCsvImport')->name('data-sap-details.processCsvImport');
    Route::resource('data-sap-details', 'DataSapDetailController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

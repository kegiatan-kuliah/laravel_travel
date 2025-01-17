<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings('car', 'cars');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text' 
        ]);

        CRUD::column([
            'name' => 'license_number',
            'label' => 'License Number',
            'type' => 'text' 
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'type',
            'label'       => 'Type',
            'type'        => 'select_from_array',
            'options'     => ['sedan' => 'Sedan', 'suv' => 'SUV','bus' => 'Bus'],
            'allows_null' => false,
            'default'     => 'one',
        ]);

        CRUD::column([
            'name' => 'capacity',
            'label' => 'Capacity',
            'type' => 'number' 
        ]);

        CRUD::column([
            'name' => 'price_per_day',
            'label' => 'Price Per Day',
            'type' => 'number' 
        ]);

        

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['available' => 'Available', 'booked' => 'Booked','maintenance' => 'Maintenance'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text' 
        ]);

        CRUD::column([
            'name' => 'license_number',
            'label' => 'License Number',
            'type' => 'text' 
        ]);
        
        CRUD::column([   // select_from_array
            'name'        => 'type',
            'label'       => 'Type',
            'type'        => 'select_from_array',
            'options'     => ['sedan' => 'Sedan', 'suv' => 'SUV','bus' => 'Bus'],
            'allows_null' => false,
            'default'     => 'one',
        ]);

        CRUD::column([
            'name' => 'capacity',
            'label' => 'Capacity',
            'type' => 'number' 
        ]);

        CRUD::column([
            'name' => 'price_per_day',
            'label' => 'Price Per Day',
            'type' => 'number' 
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['available' => 'Available', 'booked' => 'Booked','maintenance' => 'Maintenance'],
            'allows_null' => false,
            'default'     => 'one',
        ]);

        CRUD::column([
            'label' => 'Created',
            'name' => 'created_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
        CRUD::column([
            'label' => 'Updated',
            'name' => 'updated_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CarRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name' => 'capacity',
            'label' => 'Capacity',
            'type' => 'number' 
        ]);

        CRUD::field([
            'name' => 'price_per_day',
            'label' => 'Price Per Day',
            'type' => 'number' 
        ]);

        CRUD::field([   // select_from_array
            'name'        => 'type',
            'label'       => 'Type',
            'type'        => 'select_from_array',
            'options'     => ['sedan' => 'Sedan', 'suv' => 'SUV','bus' => 'Bus'],
            'allows_null' => false,
            'default'     => 'one',
        ]);

        CRUD::field([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['available' => 'Available', 'booked' => 'Booked','maintenance' => 'Maintenance'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

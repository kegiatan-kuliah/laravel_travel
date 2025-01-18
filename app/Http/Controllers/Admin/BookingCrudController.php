<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Barryvdh\DomPDF\Facade\Pdf;
/**
 * Class BookingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BookingCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Booking::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/booking');
        CRUD::setEntityNameStrings('booking', 'bookings');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addButtonFromModelFunction('top', 'export_button', 'export', 'end');
        CRUD::column([ 
            'name'        => 'booking_date',
            'label'       => 'Booking Date',
            'type'        => 'date',
        ]);

        CRUD::column([ 
            'name'        => 'start_date',
            'label'       => 'Start Date',
            'type'        => 'date',
        ]);

        CRUD::column([ 
            'name'        => 'end_date',
            'label'       => 'End Date',
            'type'        => 'date',
        ]);

        CRUD::column([ 
            'name'        => 'total_price',
            'label'       => 'Total Price',
            'type'        => 'number',
        ]);

        CRUD::column([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Car",
            'type'      => 'select',
            'name'      => 'car_id', // the db column for the foreign key
            'entity'    => 'Car',
            'model'     => "App\Models\Car", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Driver",
            'type'      => 'select',
            'name'      => 'driver_id', // the db column for the foreign key
            'entity'    => 'Driver',
            'model'     => "App\Models\Driver", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['reserved' => 'Reserved', 'ongoing' => 'On Going','completed' => 'Completed','cancelled' => 'Cancelled'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([ 
            'name'        => 'booking_date',
            'label'       => 'Booking Date',
            'type'        => 'date',
        ]);

        CRUD::column([ 
            'name'        => 'start_date',
            'label'       => 'Start Date',
            'type'        => 'date',
        ]);

        CRUD::column([ 
            'name'        => 'end_date',
            'label'       => 'End Date',
            'type'        => 'date',
        ]);

        CRUD::column([ 
            'name'        => 'total_price',
            'label'       => 'Total Price',
            'type'        => 'number',
        ]);

        CRUD::column([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Car",
            'type'      => 'select',
            'name'      => 'car_id', // the db column for the foreign key
            'entity'    => 'Car',
            'model'     => "App\Models\Car", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Driver",
            'type'      => 'select',
            'name'      => 'driver_id', // the db column for the foreign key
            'entity'    => 'Driver',
            'model'     => "App\Models\Driver", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['reserved' => 'Reserved', 'ongoing' => 'On Going','completed' => 'Completed','cancelled' => 'Cancelled'],
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
        CRUD::setValidation(BookingRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([  // Select
            'label'     => "Car",
            'type'      => 'select',
            'name'      => 'car_id', // the db column for the foreign key
            'entity'    => 'Car',
            'model'     => "App\Models\Car", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([  // Select
            'label'     => "Driver",
            'type'      => 'select',
            'name'      => 'driver_id', // the db column for the foreign key
            'entity'    => 'Driver',
            'model'     => "App\Models\Driver", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['reserved' => 'Reserved', 'ongoing' => 'On Going','completed' => 'Completed','cancelled' => 'Cancelled'],
            'allows_null' => false,
            'default'     => 'one',
        ]);

        CRUD::field([ 
            'name'        => 'total_price',
            'label'       => 'Total Price',
            'type'        => 'number',
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

    public function export()
    {
        $bookings = \App\Models\Booking::orderBy('id','desc')->get();   
        $pdf = Pdf::loadView('export.booking',['bookings' => $bookings]);
        return $pdf->stream();
    }
}

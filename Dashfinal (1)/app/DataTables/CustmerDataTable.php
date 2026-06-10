<?php

namespace App\DataTables;

use App\Models\Custmer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class   CustomerDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn() // Automatically adds S.No column
            ->setRowId('id')
            ->addColumn('user_id', function ($row) {
                return e($row->user_id); // Use e() for escaping output
            })  ->addColumn('name', function ($row) {
                return e($row->name); // Use e() for escaping output
            })->addColumn('email', function ($row) {
                return e($row->email); // Use e() for escaping output
            })->addColumn('phone_number', function ($row) {
                return e($row->phone_number); // Use e() for escaping output
            })->addColumn('phone_number', function ($row) {
                return e($row->phone_number); // Use e() for escaping output
            })->addColumn('address', function ($row) {
                return e($row->address); // Use e() for escaping output
            })->addColumn('state', function ($row) {
                return e($row->state); // Use e() for escaping output
            })->addColumn('city', function ($row) {
                return e($row->city); // Use e() for escaping output
            })->addColumn('pincode', function ($row) {
                return e($row->pincode); // Use e() for escaping output
            });

    }

    public function query(Custmer $model): QueryBuilder
    {
        return $model->newQuery()->select('id', 'user_id','name','email','phone_number','address','state','city','pincode');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0) // Order by first column (S.No)
            ->selectStyleSingle()
            ->addTableClass('table table-bordered table-hover')
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('S.No')->searchable(false)->orderable(false),
            Column::make('user_id')->title('UserID'),
            Column::make('name')->title('Name'),
             Column::make('email')->title('Email'),
              Column::make('phone_number')->title('Phone Number'),
               Column::make('address')->title('Address'),
                Column::make('state')->title('State'),
                 Column::make('city')->title('City'),
                  Column::make('pincode')->title('Pincode'),
        ];
    }

    protected function filename(): string
    {
        return 'Customer_' . date('YmdHis');
    }
}

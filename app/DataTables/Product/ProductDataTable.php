<?php

namespace App\DataTables\Product;

use App\Models\Product;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class ProductDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query)
    {
        $columns = array_column($this->getColumns(), 'data');
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function ($row) {
                return editDateColumn($row->created_at);
            })
            ->editColumn('check', function ($row) {
                return $row;
            })
            ->editColumn('actions', function ($row) {
                return view('app.admin-panel.product.action', ['id' => $row->id]);
            })
            ->editColumn('details', function ($row) {
                return view('app.admin-panel.product.detail', ['id' => $row->id]);
            })
            ->editColumn('image', function ($row) {
                return view('app.admin-panel.product.image', ['id' => $row->id]);
            })
            ->editColumn('before_image', function ($row) {
                return view('app.admin-panel.product.before-image', ['id' => $row->id]);
            })
            ->editColumn('after_image', function ($row) {
                return view('app.admin-panel.product.after-image', ['id' => $row->id]);
            })
            ->editColumn('gallery', function ($row) {
                return view('app.admin-panel.product.gallery', ['id' => $row->id]);
            })
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['actions', 'check','image','gallery']));
    }


    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId("product-table")
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->serverSide()
            ->processing()
            ->deferRender()
            ->dom('BlfrtipC')
            ->lengthMenu([5,10,15,20,25,30])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->buttons(
                // Button::make('export')->addClass('btn btn-relief-outline-secondary dropdown-toggle')->buttons([
                //     Button::make('print')->addClass('dropdown-item'),
                //     // Button::make('copy')->addClass('dropdown-item'),
                //     // Button::make('csv')->addClass('dropdown-item'),
                //     // Button::make('excel')->addClass('dropdown-item'),
                //     Button::make('pdf')->addClass('dropdown-item'),
                // ]),

                // Button::make('reload')->addClass('btn btn-relief-outline-primary'),

                Button::raw('delete-selected')
                    ->addClass('btn btn-relief-outline-danger')
                    ->text('<i class="bi bi-trash3-fill"></i> Delete Selected')->attr([
                        'onclick' => 'deleteSelected()',
                    ]),

                Button::raw('create-new')
                    ->addClass('btn btn-relief-outline-primary')
                    ->text('<i class="bi bi-plus"></i> Create New Product')->attr([
                        'onclick' => 'createNewProduct()',
                    ]),
            )

            ->scrollX()
            ->columnDefs([
                [
                    'targets' => 0,
                    'className' => 'text-center text-primary',
                    'width' => '10%',
                    'orderable' => false,
                    'searchable' => false,
                    'responsivePriority' => 3,
                    'render' => "function (data, type, full, setting) {
                        var dataValue = JSON.parse(data);
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this)\" type=\"checkbox\" value=\"' + dataValue.id + '\" name=\"chkData[]\" id=\"chkData_' + dataValue.id + '\" /><label class=\"form-check-label\" for=\"chkData_' + dataValue.id + '\"></label></div>';
                    }",
                    'checkboxes' => [
                        'selectAllRender' =>  '<div class="form-check"> <input class="form-check-input" onchange="changeAllTableRowColor()" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
                    ]
                ],
            ])

            ->orders([
                [2, 'desc'],
            ]);
    }


    protected function getColumns(): array
    {
        $colArray = [
            Column::computed('check')->exportable(false)->printable(false)->width(60),
            Column::make('name')->searchable(true)->title('Product'),
            Column::make('image')->title('Prod Image')->orderable(false)->searchable(false),
            Column::make('before_image')->title('Before Image')->orderable(false)->searchable(false),
            Column::make('after_image')->title('After Image')->orderable(false)->searchable(false),
            Column::make('gallery')->title('Gallery')->orderable(false)->searchable(false),
            Column::make('details')->title('Details')->orderable(false)->searchable(false),
            Column::make('created_at')->title('Created AT'),
        ];
        $colArray[] = Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-center');
        return $colArray;
    }
}

<?php

namespace App\DataTables\ActorProduct;

use App\Models\ActorProduct;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class ActorProductDataTable extends DataTable
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
            ->editColumn('product_id', function ($row) {
                return (!is_null($row->product) ? $row->product->name : '');
            })
            ->editColumn('actions', function ($row) {
                return view('app.admin-panel.actor-product.action', ['id' => $row->id]);
            })
            ->editColumn('image', function ($row) {
                return view('app.admin-panel.actor-product.image', ['id' => $row->id]);
            })
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['actions', 'check','image','product']));
    }


    public function query(ActorProduct $model): QueryBuilder
    {
        return $model->newQuery()->with('product');
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId("actor-product-table")
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
                    ->text('<i class="bi bi-plus"></i> Create New Actor Product')->attr([
                        'onclick' => 'createNewActorProduct()',
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
            Column::make('name')->searchable(true)->title('Actor'),
            Column::make('product_id')->searchable(false)->orderable(false)->title('Product'),
            Column::make('image')->title('Image'),
            Column::make('created_at')->title('Created AT'),
        ];
        $colArray[] = Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-center');
        return $colArray;
    }
}

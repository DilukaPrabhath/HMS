<?php

namespace App\DataTables;

use App\DataTables\ExportDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use App\customer;

class ExportDataTable extends DataTable
{
    
    
    // public function dataTable($query)
    // {
    //     return datatables()
    //         ->eloquent($query);
    // }

   
    // public function query(ExportDataTable $model)
    // {
       
    //     $data = customer::select();
    //     return $this->applyScopes($data);
    // }

   
    // public function html()
    // {
    //     return $this->builder()

    //                 ->columns($this->getColumns())
    //                 ->minifiedAjax()
    //                 ->dom('Bfrtip')
    //                 ->orderBy(1)
    //                 ->buttons(
    //                     Button::make('csv'),
    //                     Button::make('excel')
    //                 );
    // }

   
    // protected function getColumns()
    // {
    //     return [
    //         Column::make('id'),
    //         Column::make('fname'),
    //         Column::make('lname'),
    //         Column::make('created_at'),
        
    //     ];
    // }

   
    // protected function filename()
    // {
    //     return 'Export_' . date('YmdHis');
    // }
}

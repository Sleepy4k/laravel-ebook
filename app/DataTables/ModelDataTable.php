<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ModelDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('subject', function($query){
                $data = null;
                if (empty($query->subject_id)) {
                    $data = '-';
                } else {
                    $data = $query->subject_id;
                }
                if (empty($query->subject_type)) {
                    $data .= ' | -';
                } else {
                    $data .= ' | '.$query->subject_type;
                }

                return $data;
            })
            ->editColumn('causer', function($query){
                $data = null;
                if (empty($query->causer_id)) {
                    $data = '-';
                } else {
                    $data = $query->causer_id;
                }
                if (empty($query->causer_type)) {
                    $data .= ' | -';
                } else {
                    $data .= ' | '.$query->causer_type;
                }

                return $data;
            })
            ->editColumn('properties', function($query){
                return json_encode($query->properties);
            })
            ->editColumn('created_at', function($query){
                return $query->created_at->format('d-m-Y');
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Activity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $model): QueryBuilder
    {
        return $model->where('log_name', '!=', 'login')->where('log_name', '!=', 'logout')->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('modeldatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->lengthChange(true)
                    ->lengthMenu()
                    ->pageLength(10)
                    ->responsive(true)
                    ->autoWidth(true)
                    ->buttons(
                        Button::make('export'),
                        Button::make('reload'),
                        Button::make('copy')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('log_name')
                    ->title('Nama')
                    ->addClass('text-center'),
            Column::make('description')
                    ->title('Deskripsi')
                    ->addClass('text-center'),
            Column::make('event')
                    ->title('Kategori')
                    ->addClass('text-center'),
            Column::computed('subject')
                    ->title('Subject')
                    ->addClass('text-center'),
            Column::computed('causer')
                    ->title('Penyebab')
                    ->addClass('text-center'),
            Column::make('properties')
                    ->title('Properti')
                    ->addClass('text-center'),
            Column::computed('created_at')
                    ->title('Terjadi Pada')
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Model_' . date('YmdHis');
    }
}

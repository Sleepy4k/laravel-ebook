<?php

namespace App\DataTables;

use App\Traits\LogReader;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class SystemDataTable extends DataTable
{
    use LogReader;

    /**
     * Init log file.
     *
     * @return Collection
     */
    public function customData()
    {
        return collect(
            (object) $this->getFileContent('daily')
        );
    }

    /**
     * Build DataTable class.
     *
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable()
    {
        return datatables()
            ->of($this->customData()['logs'])
            ->setRowId('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->serverSide(false)
                    ->setTableId('systemdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'desc')
                    ->lengthChange(true)
                    ->lengthMenu()
                    ->pageLength(10)
                    ->responsive(true)
                    ->autoWidth(true)
                    ->buttons(
                        Button::make('export'),
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
            Column::make('timestamp')
                    ->title('Terjadi Pada')
                    ->addClass('text-center'),
            Column::make('env')
                    ->title('Environment')
                    ->addClass('text-center'),
            Column::make('type')
                    ->title('Tipe')
                    ->addClass('text-center'),
            Column::make('message')
                    ->title('Pesan')
                    ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'System_' . date('YmdHis');
    }
}

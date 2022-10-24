<?php

namespace App\DataTables;

use App\Models\Author;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class AuthorDataTable extends DataTable
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
            ->addColumn('action', function($query){
                return '<a href="'.route("table.author.show", $query->id).'"><i class="fa-solid fa-eye"></i></a> | <a href="'.route('table.author.edit', $query->id).'"><i class="fa-solid fa-pen-to-square"></i></a> | <form action="'.route("table.author.destroy", $query->id).'" method="post" style="display: inline-block">'.csrf_field().method_field("DELETE").'<a href="" class="confirm-delete"><i class="fa-solid fa-trash"></i></a></form>';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Author $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Author $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('authordatatable-table')
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
                        Button::make('create'),
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
            Column::make('nama')
                    ->title('Nama')
                    ->addClass('text-center'),
            Column::computed('action')
                    ->title('Tindakan')
                    ->exportable(false)
                    ->printable(false)
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
        return 'Author_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Models\Book;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BookDataTable extends DataTable
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
                return '<a href="'.route("book.show", $query->id).'"><i class="fa-solid fa-eye"></i></a> | <a href="'.route('book.edit', $query->id).'"><i class="fa-solid fa-pen-to-square"></i></a> | <form action="'.route("book.destroy", $query->id).'" method="post" style="display: inline-block">'.csrf_field().method_field("DELETE").'<a href="" class="confirm-delete"><i class="fa-solid fa-trash"></i></a></form>';
            })
            ->editColumn('author_id', function($query){
                return $query->author->nama;
            })
            ->editColumn('publisher_id', function($query){
                return $query->publisher->nama;
            })
            ->editColumn('category_id', function($query){
                return $query->category->nama;
            })
            ->editColumn('tanggal_terbit', function($query){
                return $query->tanggal_terbit->format('d-m-Y');
            })
            ->editColumn('tersedia', function($query){
                return ($query->tersedia == 'Y') ? 'Tersedia' : 'Tidak Tersedia';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Book $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Book $model): QueryBuilder
    {
        return $model->with(['author', 'category', 'publisher']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bookdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(6, 'desc')
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
            Column::make('judul')
                    ->title('Judul')
                    ->addClass('text-center'),
            Column::make('deskripsi')
                    ->hidden(),
            Column::make('author_id')
                    ->title('Penulis')
                    ->addClass('text-center'),
            Column::make('publisher_id')
                    ->title('Penerbit')
                    ->addClass('text-center'),
            Column::make('category_id')
                    ->title('Kategori')
                    ->addClass('text-center'),
            Column::make('tanggal_terbit')
                    ->title('Tanggal Terbit')
                    ->addClass('text-center'),
            Column::make('tersedia')
                    ->title('Status')
                    ->addClass('text-center'),
            Column::make('action')
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
        return 'Book_' . date('YmdHis');
    }
}

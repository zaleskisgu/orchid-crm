<?php

namespace App\Orchid\Layouts\Customer;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CustomerListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'customers';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Ф.И.О.')->sort()->filter(TD::FILTER_TEXT),
            TD::make('phone', 'Телефон'),
            TD::make('place', 'Должность'),
            TD::make('company', 'Компания'),
            TD::make('comment', 'Комментарий'),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
        ];
    }
}

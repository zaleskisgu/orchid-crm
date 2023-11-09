<?php

namespace App\Orchid\Screens\Customer;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Models\Customer;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Group;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Orchid\Layouts\Customer\CustomerListTable;
class CustomerListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'customers' => Customer::filters()->paginate(50)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Клиенты';
    }

    /**
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Список клиентов';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать клиента')->modal('createCustomer')->method('create')
        ];
    }

    public function layout(): iterable
    {
        return [
            CustomerListTable::class,
            Layout::modal('createCustomer', Layout::rows([
                Input::make('name')->required()->title('Ф.И.О.'),
                Input::make('phone')->required()->title('Телефон')->mask('+7 (999) 999-99-99'),
                Group::make([
                    Input::make('place')->title('Должность'),
                    Input::make('company')->title('Компания')
                ]),
                TextArea::make('comment')->title('Комментарий'),
            ]))->title('Создать клиента')->applyButton('Создать')
        ];
    }

    public function create(CustomerRequest $request): void {
        Customer::create($request->validated());
        Toast::info('Клиент успешно создан');
    }
}


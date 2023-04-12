@props([
    'theme' => '',
    'column' => null,
    'class' => '',
    'inline' => null,
    'filter' => null,
])
@php
    unset($filter['className']);
    extract($filter);

    $defaultAttributes = \PowerComponents\LivewirePowerGrid\Filters\FilterBoolean::getWireAttributes($field, $title);

    $selectClasses = Arr::toCssClasses([
        $theme->selectClass, $class, data_get($column, 'headerClass'), 'power_grid'
    ]);

    $params = array_merge([
         ...data_get($filter, 'attributes'),
         ...$defaultAttributes
    ], $filter);
@endphp

@if($params['component'])
    @unset($params['attributes'])

    <x-dynamic-component
            :component="$params['component']" :attributes="new \Illuminate\View\ComponentAttributeBag($params)"/>
@else
    <div @class([$theme->baseClass]) style="{{ $theme->baseStyle }}">
        @if(!$inline)
            <label class="block text-sm font-medium text-pg-primary-700">
                {{ $title }}
            </label>
        @endif
        <div class="relative">
            <select class="{{ $selectClasses }}"
                    style="{{ data_get($column, 'headerStyle') }}"
                    {{ $defaultAttributes['selectAttributes'] }}>
                <option value="all">{{ trans('livewire-powergrid::datatable.boolean_filter.all') }}</option>
                <option value="true">{{ $trueLabel }}</option>
                <option value="false">{{ $falseLabel }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-pg-primary-700">
                <x-livewire-powergrid::icons.down class="w-4 h-4"/>
            </div>
        </div>
    </div>
@endif

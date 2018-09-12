@include('admin.layouts.header')
@extends('admin.layouts.main')
@section('title')
    Каталог товаров
@endsection
@section('content')
    <h1>Список товаров</h1>

    @if (session('message-success'))
        <div class="alert alert-success">
            {{ session('message-success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('message-error'))
        <div class="alert alert-danger">
            {{ session('message-error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="products" method="post" id="settings-form">
        {!! csrf_field() !!}
        <div class="settings row">
            <div class="col-sm-4">
                <div class="row">
                    <label for="sort-by" class="col-sm-5">Сортировать по:</label>
                    <div class="form-element col-sm-7">
                        <select name="sort" id="sort-by" class="form-control">
                            @foreach($array_sort as $sort => $value)
                                @if($current_sort['value'] == $sort)
                                    <option value="{!! $sort !!}" selected>{!! $value['name'] !!}</option>
                                @else
                                    <option value="{!! $sort !!}">{!! $value['name'] !!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <label for="search" class="col-sm-2">Поиск:</label>
                    <div class="form-element col-sm-10">
                        <input type="text" id="search" name="search" placeholder="Введите текст..." class="form-control" value="{{ $current_search or '' }}" />
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <label for="show" class="col-sm-4">Отображать:</label>
                    <div class="form-element col-sm-8">
                        <select name="show" id="show" class="form-control">
                            @foreach($array_show as $show)
                                @if($current_show == $show)
                                    <option value="{!! $show !!}" selected>{!! $show !!}</option>
                                @else
                                    <option value="{!! $show !!}">{!! $show !!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="btn-group col-sm-10">
                        <a href="/admin/products" class="btn product-sort-button">
                            Все товары
                        </a>
                        <button type="button" data-sort="stock" data-value="1" class="sort-buttons btn product-sort-button" onclick="filterProducts($(this))">В наличии</button>
                        <button type="button" data-sort="stock" data-value="0" class="sort-buttons btn product-sort-button" onclick="filterProducts($(this))">Нет в наличии</button>
                        <div class="btn-group">
                            <button type="button" id="current-cat" class="btn dropdown-toggle product-sort-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="dropdown-selected-name">Категория</span><span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                @forelse($categories as $category)
                                    <li>
                                        <a type="button" data-sort="category" data-value="{!! $category->id !!}" class="sort-buttons" onclick="filterProducts($(this))">{!! $category->name !!}</a>
                                    </li>
                                @empty
                                    <li><a href="javascript:void()">Нет добавленных линеек товара!</a></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="/admin/products/create" class="btn">Добавить новый</a>
                    </div>
                </div>
            </div>
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="success">
                            <td>Название</td>
                            <td align="center">Изображение товара</td>
                            <td align="center">Категория</td>
                            <td align="center">Наличие</td>
                            <td align="center">Действия</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{!! $product->name !!}</td>
                                @if(!empty($product->image))
                                    <td align="center">
                                        <img src="{!! $product->image->url('product_list')!!}"
                                             alt="{!! $product->image->title !!}"
                                             class="img-thumbnail">
                                    </td>
                                @else
                                    <td align="center">
                                        <img src="/uploads/no_image.jpg"
                                             alt="no_image"
                                             class="img-thumbnail">
                                    </td>
                                @endif
                                <td align="center">
                                    @foreach($product->categories as $category)
                                        {!! $category->name !!}<br>
                                    @endforeach
                                    {{--{!! $product->category ? $product->category->name : '' !!}--}}
                                </td>
                                <td class="status" align="center">
                                    <span class="{!! $product->stock ? 'on' : 'off' !!}" data-id="{{ $product->id }}" style="cursor: pointer;">
                                        <span class="runner"></span>
                                    </span>
                                </td>
                                <td class="actions" align="center">
                                    <a class="btn btn-primary" href="/admin/products/edit/{!! $product->id !!}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="confirmProductsDelete('{!! $product->id !!}', '{{ $product->name }}')">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" align="center">Нет добавленных товаров!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-right">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <div id="product-delete-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Подтверждение удаления</h4>
                </div>
                <div class="modal-body">
                    <p>Удалить товар <span id="product-name"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <a type="button" class="btn btn-primary" id="confirm">Удалить</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            navigateProductFilter();
            $('#current-cat').click(function () {
                $('.btn-group').toggleClass('open');
            });
            $('#sort-by, #show').change(function(){
                $('form#settings-form').submit();
            });
        });
    </script>
@endsection

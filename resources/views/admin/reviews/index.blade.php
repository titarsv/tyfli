@include('admin.layouts.header')
@extends('admin.layouts.main')
@section('title')
    Отзывы
@endsection
@section('content')

    <h1>Список отзывов</h1>

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

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr class="success">
                        <td>Пользователь</td>
                        <td>Товар</td>
                        <td>Оценка</td>
                        <td align="center">Опубликован</td>
                        <td align="center">Дата и время добавления</td>
                        <td align="center">Действия</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($new as $review)
                        <tr class="info">
                            <td>
                                @if(!empty($review->user))
                                    {{ $review->user->first_name }} {{ $review->user->last_name }}
                                @else
                                    {{ $review->author }}
                                @endif
                            </td>
                            <td>{!! $review->product->name or '' !!}</td>
                            <td>
                                {!! $review->grade !!}
                            </td>
                            <td class="status" align="center">
                                <span class="{!! $review->published ? 'on' : 'off' !!}">
                                    <span class="runner"></span>
                                </span>
                            </td>
                            <td align="center">
                                {!! $review->created_at !!}
                            </td>
                            <td class="actions" align="center">
                                <a class="btn btn-primary" href="/admin/reviews/show/{!! $review->id !!}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" onclick="confirmReviewDelete('{!! $review->id !!}')">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    @if(!empty($reviews))
                        @foreach($reviews as $review)
                            <tr>
                                <td>
                                    @if(!empty($review->user))
                                        {{ $review->user->first_name }} {{ $review->user->last_name }}
                                    @else
                                        {{ $review->author }}
                                    @endif
                                </td>
                                <td>{!! $review->product->name !!}</td>
                                <td>
                                    {!! $review->grade !!}
                                </td>
                                <td class="status" align="center">
                                <span class="{!! $review->published ? 'on' : 'off' !!}">
                                    <span class="runner"></span>
                                </span>
                                </td>
                                <td align="center">
                                    {!! $review->created_at !!}
                                </td>
                                <td class="actions" align="center">
                                    <a class="btn btn-primary" href="/admin/reviews/show/{!! $review->id !!}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="confirmReviewDelete('{!! $review->id !!}')">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @elseif(empty($reviews) && empty($new))
                        <tr>
                            <td colspan="6">Еще не добавлено ни одного отзыва!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="panel-footer text-right">
            {!! $all_reviews->links() !!}
            </div>
        </div>
    </div>

    <div id="reviews-delete-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Подтверждение удаления</h4>
                </div>
                <div class="modal-body">
                    <p>Удалить отзыв?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <a type="button" class="btn btn-primary" id="confirm">Удалить</a>
                </div>
            </div>
        </div>
    </div>

@endsection

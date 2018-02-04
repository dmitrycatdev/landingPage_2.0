<div style="margin: 0px;">
    @if($pages)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th>Текст</th>
                <th>Дата создания</th>
                <th>Удолить</th>
            </tr>
            </thead>
            <tbody>
                @foreach($pages as $k => $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{!! HTML::link(route('pagesEdit', ['page'=>$page->id]), $page->name, ['alt'=>$page->name]) !!}</td>
                        <td>{{ $page->alias }}</td>
                        <td>{{ $page->text }}</td>
                        <td>{{ $page->created_at }}</td>
                        <td>
                            {!! Form::open(['url' => route('pagesEdit', ['page'=>$page->id]), 'class'=>'form-horizontal', 'method'=>'post']) !!}
                                {{--{!! Form::hidden('_method', 'delete') !!}--}}

                                {{ method_field('DELETE') }}
                                {!! Form::button('Удолить', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
        {!! HTML::link(route('pagesAdd'), 'Создать запись') !!}
</div>
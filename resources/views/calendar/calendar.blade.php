@extends('layouts.app')
@section('content')
    <div class="content calendar">
        @include('calendar.modules.info')
        <div class="content-block">
            <div class="control">
                <div>
                    <a href="{{route("calendar.lessons",['page'=>$page-1])}}"><i class="fas fa-angle-left"></i></a>
                    <a href="{{route("calendar.lessons",['page'=>$page+1])}}"><i class="fas fa-angle-right"></i></a>
                    <a href="{{route("calendar.lessons",['page'=>0])}}">Сегодня</a>
                </div>
                <em>{{$date->format('d M Y')}} г.</em>
                <div class="count_day">
                    <a href=""><i class="far fa-calendar-times"></i> Месяц</a>
                    <a href=""><i class="far fa-calendar-minus"></i> Неделя</a>
                    <a href=""><i class="far fa-calendar"></i> День</a>
                </div>
            </div>
            <div class="table calendar_bd" data-calendar_bd="{{\Psy\Util\Json::encode($data[0]??null)}}">
                <div class="th">№</div>
                <div class="th">{{$date->format('l')}}</div>
                @for($i = 0; $i<17;$i++)
                    <div class="tr">{{$i+7}}:00</div>
                    <div class="tr card_element"></div>
                @endfor

                {{--                <div class="tr">7:00</div>--}}
                {{--                                <div class="tr">@component('calendar.modules.card_calendar', ['xxs' => '23'])@endcomponent</div>--}}
                {{--                <div class="tr">8:00</div>--}}
                {{--                <div class="tr">@component('calendar.modules.card_calendar', ['xxs' => '23'])@endcomponent</div>--}}
            </div>
        </div>
    </div>
@endsection


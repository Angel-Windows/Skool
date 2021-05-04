@extends('layouts.app')
@section('content')
{{--    <div class="comment">--}}
        <div class="content">
            @include('calendar.modules.info')
            <div class="lesson">
                <div class="schedule_block">
                    <div class="user_info">
                        <div class="img avatar">
                            @if($user['avatar'])
                                <img src="{{$user['avatar']}}" alt="">
                            @endif
                        </div>
                        <div class="text">
                            <h2>{{$user['display_name']}}</h2>
                            <em>{{$user['company_name']}}</em>
                        </div>
                        <p>{{$user['sex']}}</p>
                    </div>
                    <div class="schedule">
                        <p>Расписание на ближайшие 7 дней</p>
                        <div class="list">
                            @php
                                $temp = null;
                            @endphp
                            @foreach($data as $item_card)
                                @php
                                    $carbon =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item_card[0]->date);
                                @endphp
                                <div class="card">
                                    <div class="day">
                                        <p>{{$carbon->format('l')}}</p>
                                        <p>{{$carbon->format('Y-m-d')}}</p>
                                    </div>
                                    <div>
                                        @foreach($item_card as $item)
                                            @php
                                                $carbon_temp =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->date);
                                            @endphp
                                            <div class="day_info">
                                                <p>{{$carbon_temp->format("H:i")}} — {{$carbon_temp->format("H")+1}}:{{$carbon_temp->format("i")}}</p>
                                                <a href="{{$item['user_id']}}">{{$item['user_id']}}</a>
                                                <p>{{$item['range_lesson']}}</p>
                                                <p>{{$item['duration']}} минут</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p>{{$item_card[0]['status']}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="right_menu">
                    <div class="schedule_block">
                        <ul>
                            <li>ID</li>
                            <li>#{{\Illuminate\Support\Facades\Auth::id()}}</li>
                        </ul>
                        <ul>
                            <li>Уроки</li>
                            <li>742</li>
                        </ul>
                        <div class="hr"></div>
                        <ul>
                            <li>Мобильный</li>
                            <li>+380(95)668-61-91</li>
                        </ul>
                        <ul>
                            <li>E-mail</li>
                            <li>eliphas.sn@gmail.com</li>
                        </ul>
                        <ul>
                            <li>Skype</li>
                            <li>eliphas.sn@gmail.com</li>
                        </ul>
                    </div>
                    <div class="schedule_block statistic">
                        <h3>Статистика за Март</h3>
                        <ul>
                            <li>Уроков</li>
                            <li>58 шт</li>
                        </ul>
                        <div class="hr"></div>
                        <ul>
                            <li>Время</li>
                            <li>
                                <p>3660 минут</p>
                                <p>61 часов</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}
@endsection


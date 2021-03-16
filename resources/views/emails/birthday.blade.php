@component('mail::message')
#Hello {{ $user->fullName }},

<p>
    {{ __('You have ') }} {{ $celebrated->count() }} {{ Str::plural('birthday', $celebrated->count()) . __(' today') }}
</p>

<ul class="list-group" style="list-style: none">
    @foreach($celebrated as $user)
        <li class="list-group-item">
            <img src="https://picsum.photos/200" alt="" width="50" height="50" class="rounded-circle"/>
            <strong>{{ $user->fullName }}</strong>
            {{ $user->age }} {{ Str::plural('year', $user->age) }} old
        </li>
    @endforeach
</ul>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

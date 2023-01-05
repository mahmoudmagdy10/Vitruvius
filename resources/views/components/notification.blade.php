<ul class="notification_dropdown_2">
    <li class="notify_icon_2">
        {{-- @if($notification_count > 0)
        <span class="count_notify_2" data-count="{{$notification_count}}">{{$notification_count}}</span>
        @endif --}}

        <i class="fas fa-bell"></i>
    </li>
    <li>
        <h2>Notifications</h2>
        <div class ="pop_up_notify_2">
            <!-- <a class="read_all">Mark All As Read <i class="fa fa-check" aria-hidden="true"></i></a> -->
            <form class="read_all" action="{{-- {{route('contractor.read_all')}} --}}" method="post">
                @csrf
                <input class="btn btn-primary" type="submit" value="Mark All Read">
            </form>

        </div>

    </li>
</ul>

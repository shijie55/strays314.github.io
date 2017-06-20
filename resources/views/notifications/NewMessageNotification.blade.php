<li class="notifications {{ $notification->unread() ? 'unread' : '' }}">
    <a href="{{ url('/user/notification/'. $notification->id .'?redirect_url=/user/box/list/' . $notification->data['dialog']) }}">
        {{ $notification->data['name'] }}发送了私信给你！
    </a>
</li>
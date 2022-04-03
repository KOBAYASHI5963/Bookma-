@if (Auth::user()->is_favoriting($user->id))
    <form method="post" action="{{ route('unfavorite', $user->id) }}">
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-danger btn-block">お気に入り解除</button>
    </form>
@else
    <form method="post" action="{{ route('favorite', $user->id) }}">
      @csrf
      <button type="submit" class="btn btn-primary btn-block">お気に入り</button>
    </form>
@endif
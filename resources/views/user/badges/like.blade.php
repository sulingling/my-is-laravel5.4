 @if($target_user->user_id != \Auth::id())
 <div>
 	@if(\Auth::user()->hasStar($target_user->user_id))
 	<button class="btn btn-default like-button" like-value="1" like-user="{{$target_user->user_id}}" type="button">取消关注</button>
 	@else
 	<button class="btn btn-default like-button" like-value="0" like-user="{{$target_user->user_id}}" type="button">关注</button>
 	@endif
 </div>
 @endif
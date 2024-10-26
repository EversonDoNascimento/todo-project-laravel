<div class="input-area">
    <label for="{{$name ?? ''}}">{{$label ?? ""}}</label>
    <textarea name="{{$name ?? ''}}" {{!empty($required) ? 'required': ''}} placeholder="{{$placeholder ?? ''}}">{{$value ?? ''}} </textarea>
</div>


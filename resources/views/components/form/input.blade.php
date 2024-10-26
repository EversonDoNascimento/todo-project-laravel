<div class="input-area">
    <label for="{{$name ?? ''}}">{{$label ?? ""}}</label>
    <input value="{{$value ?? ''}}" type="{{$type ?? ''}}" name="{{$name ?? ''}}" {{!empty($required) ? 'required': ''}} placeholder="{{$placeholder ?? ''}}"></input>
</div>


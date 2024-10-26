<div class="input-area">
    <label for="{{$name ?? ''}}">{{$label ?? ''}}</label>
    <select value="{{$value ?? ''}}" name="{{$name ?? ''}}" {{!empty($required) ? 'required': ''}} placeholder="{{$placeholder ?? ''}}">
        <option value="" selected disabled>Selecione uma opção</option>
            @foreach($data as $category)
                <option @if($value && $category->id == $value)selected @endif value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
      
   
    </select>
</div>
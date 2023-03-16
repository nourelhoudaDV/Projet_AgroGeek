
<div class=" edit-consult-group {{ $col }}">
    <label class=" @if($required || $attributes->has('required')) required @endif form-label"
           for="{{$id()}}">{{ $label }}</label>
    <select

        @if($disabled) disabled @endif
    @if($required || $attributes->has('required')) required @endif
    @if($readonly || $attributes->has('readonly')) readonly @endif
    id="{{ $name }}"
    name="{{ $name }}"
        class="form-select" data-control="select2" data-placeholder="Select an option">




        @if(isset($options))
            @foreach($options as $key => $option)
                @if($isModelExists() &&  old($name))
                    <option
                        {{ old($name) === $key ? 'selected' : '' }}  value={{$key}}>{{ $option }}</option>
                @else
                    @if($isModelExists())
                        <option
                            {{ $column() === $key ? 'selected' : '' }}  value={{$key}}>{{ $option }}</option>
                    @elseif( old($name)  )
                        <option
                            {{ old($name) === $key ? 'selected' : '' }}  value={{$key}}>{{ $option }}</option>
                    @else
                        <option value={{$key}} >{{ $option }}</option>
                    @endif
                @endif

            @endforeach
        @elseif(isset($table))
            @php($columns = $table[1])
            @if( $table[0] instanceof \Illuminate\Support\Collection || is_array($table[0])  && count($table[0]))
                @foreach($table[0] as $record)
                    @if($isModelExists() && old($name))
                        <option
                            {{ old($name) == $record[$columns[0]] ? 'selected' : '' }}
                            value="{{$record[$columns[0]]}}">{{$record[$columns[1]]}} </option>
                    @else
                        @if($isModelExists())
                            <option
                                {{ $column() == $record[$columns[0]] ? 'selected' : '' }}
                                value="{{$record[$columns[0]]}}">{{ $record[$columns[1]]}} </option>
                        @elseif( old($name) !== null )
                            <option
                                {{ old($name) == $record[$columns[0]]  ? 'selected' : '' }}
                                value="{{$record[$columns[0]]}}">{{ $record[$columns[1]]}} </option>
                        @else
                            <option
                                value="{{$record[$columns[0]]}}">{{ $record[$columns[1]] }} </option>
                        @endif
                    @endif
                @endforeach
            @endif

        @endif
    </select>
</div>

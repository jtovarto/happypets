<label for="{{ $inputName  ?? '' }}">{{ $label ?? '' }}</label>
<div class="input-group">

	@isset($prepend)
	<div class="input-group-prepend">
		<span class="input-group-text">{{ $prepend }}</span>
	</div>
	@endif
	<input
	id	="{{ $inputName ?? '' }}" name ="{{ $inputName ?? '' 	   }}"
	type="{{ $type ?? 'text' 	  }}" value="{{ old($inputName) ??  '' }}"
	class="form-control @if ($errors->has($inputName)) is-invalid @endif"
	@isset ($min) 		  min ="{{ $min }}" @endif
	@isset ($max) 		  max ="{{ $max }}" @endif
	@isset ($disabled)    disabled @endif
	@isset ($required)    required @endif
	@isset ($pattern) 	  pattern     ="{{ $pattern     }}" @endif
	@isset ($minlength)   minlength   ="{{ $minlength   }}" @endif
	@isset ($maxlength)   maxlength   ="{{ $maxlength   }}" @endif
	@isset ($placeholder) placeholder ="{{ $placeholder }}" @endif
	>
	@isset($append)
	<div class="input-group-append">
		<span class="input-group-text">{{ $append }}</span>
	</div>
	@endif
	<div class="invalid-feedback">
	@if($errors->has($inputName))
		@foreach ($errors->get($inputName) as $message)
			{{ $message }}
	    @endforeach
	@endif
	</div>
</div>
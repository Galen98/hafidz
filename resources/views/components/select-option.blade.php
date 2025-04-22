@props(['disabled' => false, 'options' => [], 'placeholder' => 'Pilih salah satu'])

<select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full']) }} @disabled($disabled)>
    <option value="">{{ $placeholder }}</option>
    @foreach ($options as $key => $label)
        <option value="{{ $key }}" @selected(old($attributes->get('name')) == $key)>
            {{ $label }}
        </option>
    @endforeach
</select>

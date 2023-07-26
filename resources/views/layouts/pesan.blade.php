{{-- pake bawaane laravel dan bootstarp --}}
{{-- variabel dah ditentukan oleh sistem --}}
{{-- pesan default pake bahasa inggris --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>

@endif

{{-- dengan menampilkan pesan jika berhasil menambah kan item --}}
@if (Session::get('success'))
    <div class="alert alert-danger" >
        {{ Session::get('success') }}
    </div>
@endif

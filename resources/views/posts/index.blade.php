<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crud Rafli</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3 float-right"><i class="bi bi-r-circle-fill"></i>New
                            Post</a>

                        <h3><i class="bi bi-globe-asia-australia"></i>Data Post</h3>
                        <table class="table table-bordered mt-1 text-center">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="bi bi-emoji-dizzy-fill"></i>Nama</th>
                                    <th scope="col"><i class="bi bi-bar-chart-fill"></i>Status</th>
                                    <th scope="col"><i class="bi bi-android2"></i>Tanggal Masuk</th>
                                    <th scope="col"><i class="bi bi-yin-yang"></i>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->status == 0 ? 'Draft':'Publish' }}</td>
                                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pen-fill"></i>EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i>HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-door-closed-fill"></i>
                        Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-airplane-engines"></i>Apakah Anda Ingin Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                <a class="btn btn-primary" href="/logout" role="button">Y</a>
            </div>
        </div>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
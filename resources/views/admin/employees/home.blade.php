<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Funcionários:
                        <div class="text-end">
                            <a href="{{ route('admin/employees/create') }}" class="btn btn-info">Novo</a>
                        </div>
                    </h1>

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <hr>

                    <div class="p-4">
                        <table class="table table-hover rounded">
                            <thead class="table-light table-striped table-hover table-bordered border-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Nascimento</th>
                                    <th>Função</th>
                                    <th>Operação</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $product->name }}</td>
                                    <td class="align-middle">{{ $product->year }}</td>
                                    <td class="align-middle">{{ $product->function }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin/employees/edit', ['id'=>$employee->id]) }}" type="button" class="btn btn-warning">Editar</a>
                                            <a href="{{ route('admin/employees/delete', ['id'=>$employee->id]) }}" type="button" class="btn btn-danger">Deletar</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-danger" colspan="6">Não há funcionários cadastrados</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

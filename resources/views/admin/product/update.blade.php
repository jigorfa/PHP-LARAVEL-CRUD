<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Editar produto:</h1>

                    <p>
                        <a href="{{ route('admin/products') }}" class="btn btn-secondary">Voltar</a>
                    </p>

                    <form action="{{ route('admin/products/update', $products->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nome: (*)</label>
                                <input type="text" name="title" class="form-control" placeholder="Nome:" value="{{$products->title}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Ano/Lote: (*)</label>
                                <input type="number" name="year" class="form-control" placeholder="Ano/Lote:" value="{{$products->year}}">
                                @error('year')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Categoria: (*)</label>
                                <input type="text" name="category" class="form-control" placeholder="Categoria:" value="{{$products->category}}">
                                @error('category')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Preço: (*)</label>
                                <input type="number" name="price" class="form-control" placeholder="Preço:" value="{{$products->price}}">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-success">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

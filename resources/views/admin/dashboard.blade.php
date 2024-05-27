<x-app-layout>
    <div class="body py-6 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-sm-6 col-lg-6 py-3">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <div class="fs-4 fw-semibold">Produtos</div>

                            <div class="small text-start mt-2 align-items-center">Clique no botão "detalhes" para acessar as informações sobre os produtos</div>

                            <div class="text-end">
                                <a href="{{ route('admin/products') }}" class="btn btn-secondary">Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 py-3">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <div class="fs-4 fw-semibold">Funcionários</div>

                            <div class="small text-start mt-2 align-items-center">Clique no botão "detalhes" para acessar as informações sobre os funcionários</div>

                            <div class="text-end">
                                <a href="{{ route('admin/employees') }}" class="btn btn-secondary">Detalhes</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12 py-3">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <div class="fs-4 fw-semibold">Departamentos</div>

                            <div class="small text-start mt-2 align-items-center">Clique no botão "detalhes" para acessar as informações sobre os departamentos</div>

                            <div class="text-end">
                                <a href="{{ route('admin/departments') }}" class="btn btn-secondary">Detalhes</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

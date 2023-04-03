@props(['user'])

<div class="col-md-8 offset-md-2 my-2">
    <div class="card relative">
        <div class="card-body">
            <p class="fs-5 lh-0 fw-bold d-flex">
                UID:&nbsp;<span class="fw-normal"> {{ $user->id }}</span>
                </span>
            </p>

            <p class="fs-5 fw-bold">
                Name: <span class="fw-normal">{{ $user->name }}</span>

            </p>
            <p class="fs-5 fw-bold">
                Email: &nbsp;<span class="fw-normal">{{ $user->email }}</span>
            </p>
            <div class="d-flex gap-1">

                {{-- <form class="absolute left-50" action="{{ route('admin.user.destroy') }}" method="POST">
                    @csrf
                    @method('Delete')
                    <button class="btn btn-dark text-light"
                        onclick="return confirm('Are you sure you want to delete this user? This action is irreversable!')"><i
                            class="bi bi-trash-fill"></i></button>
                </form> --}}
                {{-- <a href="{{ route('orders.edit', $order) }}">
                    <button class="btn btn-primary text-dark"><i class="bi bi-pen-fill"></i></button>
                </a> --}}

            </div>


        </div>
    </div>
</div>

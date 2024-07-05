<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-20">
    <h1 class="mb-[20px] font-bold">Edit New User</h1>

    @if (Session::has('fail'))
        <span class="text-red-500">{{Session::get('fail')}}</span>
    @endif

    <form action="{{ route('EditUser') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
       <div class="flex flex-row gap-6">
            <div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="">Full name</label>
                    <input class="block w-60 px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$user->name}}" type="text" name="name">
                    @error('name')
                        <span class="text-red-500" >{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-[20px]">
                    <label class="block text-sm font-medium text-gray-700" for="">Email</label>
                    <input class="block w-60 px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$user->email}}" type="text" name="email">
                    @error('email')
                        <span class="text-red-500" >{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div>

                <div class="">
                    <label class="block text-sm font-medium text-gray-700" for="">Phone Number</label>
                    <input class="block w-60 px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$user->phone_number}}" type="number" name="phone_number">
                    @error('phone_number')
                        <span class="text-red-500" >{{$message}}</span>
                    @enderror
                </div>
            </div>
       </div>

       <button class="mt-[30px] inline-flex text-white font-normal disabled:opacity-50 items-center justify-center px-3 py-2 rounded-md bg-[green] mb-3" type="submit">Change</button>
       <a class="mt-[30px] inline-flex text-white font-normal disabled:opacity-50 items-center justify-center px-3 py-2 rounded-md bg-[green] mb-3" href="/users">Quay lại</a>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-20">
    <h1 class="mb-[20px] font-bold">Thêm sản phẩm</h1>

    @if (Session::has('fail'))
        <span class="text-red-500">{{Session::get('fail')}}</span>
    @endif

    <form action="{{ route('addproduct') }}" method="POST">
        @csrf
       <div class="flex flex-row gap-6">
            <div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="">Tên sản phẩm</label>
                    <input class="block w-60 px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{old('name')}}" type="text" name="name">
                    @error('name')
                        <span class="text-red-500" >{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-[20px]">
                    <label class="block text-sm font-medium text-gray-700" for="">Mô tả</label>
                    <textarea class="block w-60 px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{old('description')}}" type="text" name="description"></textarea>
                    @error('description')
                        <span class="text-red-500" >{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-[20px]">
                    <label class="block text-sm font-medium text-gray-700" for="">Giá</label>
                    <input class="block w-60 px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{old('phone_number')}}" type="number" name="price">
                    @error('price')
                        <span class="text-red-500" >{{$message}}</span>
                    @enderror
                </div>
            </div>
       </div>

       <button class="mt-[30px] inline-flex text-white font-normal disabled:opacity-50 items-center justify-center px-3 py-2 rounded-md bg-[green] mb-3" type="submit">Add</button>
       <a class="mt-[30px] inline-flex text-white font-normal disabled:opacity-50 items-center justify-center px-3 py-2 rounded-md bg-[green] mb-3" href="/products">Quay lại</a>
    </form>
</body>
</html>

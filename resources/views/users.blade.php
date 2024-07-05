<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="p-10">
            @if (Session::has('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: "Success!",
                                text: "{{ Session::get('success') }}",
                                icon: "success"
                            });
                        });
                    </script>
            @endif
            <div class="card-body mx-14">
                <a href="/user/add" class="inline-flex text-white font-normal disabled:opacity-50 items-center justify-center px-3 py-2 rounded-md bg-[green] mb-3">+ Add New</a>
                <table class="min-w-full divide-y shadow overflow-hidden border rounded-md">
                    <thead class="bg-gray-300">
                        <th>STT</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Register date</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if (count($all_user) > 0)
                            @foreach ($all_user as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{$loop->iteration}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{$item->name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{$item->email}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{$item->phone_number}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{$item->created_at}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{$item->updated_at}}</td>
                                    <td class="text-center">
                                        <a class="px-2 py-1 bg-blue-300 rounded-md text-white" href="user/edit/{{$item->id}}">Edit</a>
                                        <button onclick="deleteResource({{$item->id}})" class="px-2 py-1 bg-red-400 rounded-md text-white" >Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td class="text-center" colspan="7">No User Found!</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteResource(id) {
            Swal.fire({
                title: "Bạn chắc chắn ?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/user/delete/${id}`, {
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    }).then(response => {
                        if (response.ok) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Người dùng đã được xóa",
                                icon: "success"
                            }).then(() => {
                                location.reload(); // Reload the page to reflect changes
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Đã xảy ra lỗi.",
                                icon: "error"
                            });
                        }
                    }).catch(error => {
                        Swal.fire({
                            title: "Error!",
                            text: "Đã xảy ra lỗi.",
                            icon: "error"
                        });
                    });
                }
            });
        }
     </script>

</body>
</html>
